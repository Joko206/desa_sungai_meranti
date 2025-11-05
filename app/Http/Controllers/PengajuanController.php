<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengajuanController extends Controller
{
    /* =============================
     |  GET LIST
     ============================= */
    public function index(Request $request)
    {
        try {
            $pengajuanList = PengajuanSurat::with('jenis')
                ->where('nik_pemohon', $request->user()->nik)
                ->latest('tanggal_pengajuan')
                ->get();

            return $this->ok('Daftar pengajuan berhasil dimuat', $pengajuanList);
        } catch (\Throwable $e) {
            return $this->fail('Gagal memuat daftar pengajuan', 500, $e);
        }
    }


    /* =============================
     |  CANCEL PENGAJUAN
     ============================= */
    public function cancel(Request $request, $id)
    {
        try {
            $pengajuan = PengajuanSurat::findOrFail($id);

            if ($pengajuan->nik_pemohon !== $request->user()->nik) {
                return $this->fail('Tidak berhak membatalkan');
            }

            if ($pengajuan->status !== 'menunggu') {
                return $this->fail('Hanya bisa dibatalkan jika status menunggu', 400);
            }

            $pengajuan->update(['status' => 'dibatalkan']);

            return $this->ok('Pengajuan berhasil dibatalkan', $pengajuan);
        } catch (\Throwable $e) {
            return $this->fail('Gagal membatalkan pengajuan', 500, $e);
        }
    }


    /* =============================
     |  API — CREATE PENGAJUAN
     ============================= */
    public function AddPengajuan(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'jenis_surat_id' => 'required|exists:jenis_surat,id',
                'data_pemohon'   => 'required|array',
                'keterangan'     => 'required|string',
            ]);

            $jenisSuratId = (int) $validated['jenis_surat_id'];
            $dataPemohon  = $validated['data_pemohon'];

            [$nik, $nama] = $this->parseNikNama($dataPemohon);

            $this->validateNikNama($nik, $nama);

            $formDefinition = $this->resolveFormStructureDefinition(
                $jenisSuratId,
                $request->input('form_structure_definition')
            );

            $files = $this->uploadFiles($request, $jenisSuratId);

            $pengajuan = $this->createPengajuan(
                $nik,
                $jenisSuratId,
                $dataPemohon,
                $files,
                $validated['keterangan'],
                $formDefinition
            );

            DB::commit();

            return $this->ok('Pengajuan berhasil dikirim', [
                'id'               => $pengajuan->id,
                'nik_pemohon'      => $pengajuan->nik_pemohon,
                'jenis_surat_id'   => $pengajuan->jenis_surat_id,
                'tanggal_pengajuan'=> $pengajuan->tanggal_pengajuan,
                'status'           => $pengajuan->status,
                'data_isian'       => $pengajuan->data_isian,
                'file_syarat'      => $pengajuan->file_syarat
            ], 201);

        } catch (\Throwable $e) {

            DB::rollBack();

            return $this->fail(
                $e instanceof \Illuminate\Validation\ValidationException
                    ? 'Validasi gagal'
                    : 'Gagal mengajukan surat',
                $e instanceof \Illuminate\Validation\ValidationException ? 422 : 500,
                $e
            );
        }
    }


    /* =============================
     |  HELPERS
     ============================= */

    private function parseNikNama(array $data): array
    {
        $nik = null;
        $nama = null;

        foreach ($data as $k => $val) {
            $key = strtolower($k);

            if (!$nik && in_array($key, ['nik', 'nik_pemohon', 'no_ktp', 'ktp'])) {
                $nik = trim($val);
            }

            if (!$nama && in_array($key, ['nama', 'nama_lengkap', 'nama_pemohon'])) {
                $nama = trim($val);
            }
        }

        return [$nik, $nama];
    }

    private function validateNikNama(?string $nik, ?string $nama)
    {
        if (!$nik || strlen($nik) !== 16 || !ctype_digit($nik)) {
            abort(response()->json([
                'success' => false,
                'message' => 'NIK harus 16 digit angka',
            ], 422));
        }

        if (!$nama || strlen($nama) < 2) {
            abort(response()->json([
                'success' => false,
                'message' => 'Nama minimal 2 karakter',
            ], 422));
        }
    }


    private function uploadFiles(Request $request, int $jenisId): array
    {
        $files = [];

        foreach ($request->allFiles() as $name => $file) {
            if (!str_starts_with($name, 'dokumen_')) {
                continue;
            }

            if (!$file instanceof \Illuminate\Http\UploadedFile) {
                continue;
            }

            $ext = strtolower($file->getClientOriginalExtension());
            $allowed = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'xlsx'];

            if (!in_array($ext, $allowed)) {
                continue;
            }

            $stored = $file->storeAs(
                "public/persyaratan/$jenisId",
                Str::uuid() . '.' . $ext
            );

            $files[] = [
                'field_name' => $name,
                'name'       => $file->getClientOriginalName(),
                'path'       => $stored,
                'mime'       => $file->getMimeType(),
                'size_kb'    => round($file->getSize() / 1024, 2),
                'uploaded_at'=> now()
            ];
        }

        return $files;
    }


    private function createPengajuan(string $nik, int $jenisId, array $data, array $files, string $ket, array $form)
    {
        return PengajuanSurat::create([
            'nik_pemohon'      => $nik,
            'jenis_surat_id'   => $jenisId,
            'tanggal_pengajuan'=> now(),
            'status'           => 'menunggu',
            'data_isian'       => [
                'form_structure_definition' => $form,
                'form_structure_data'       => $data,
                'keterangan'                => $ket,
                'submission_timestamp'      => now(),
            ],
            'file_syarat'      => $files,
        ]);
    }


    private function resolveFormStructureDefinition(int $jenisId, $input): array
    {
        // PRIORITY: input frontend
        if (is_array($input) && !empty($input)) {
            return $input;
        }

        if (is_string($input) && ($decoded = json_decode($input, true))) {
            return $decoded;
        }

        // fallback DB
        $model = JenisSurat::find($jenisId);
        if (!$model) return [];

        return is_array($model->form_structure)
            ? $model->form_structure
            : json_decode($model->form_structure ?? '[]', true) ?? [];
    }


    /* =============================
     |  Quick JSON Response Helper
     ============================= */
    private function ok(string $msg, $data = null, int $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $msg,
            'data'    => $data
        ], $code);
    }

    private function fail(string $msg, int $code = 400, $e = null)
    {
        return response()->json([
            'success' => false,
            'message' => $msg,
            'error'   => $e ? $e->getMessage() : null
        ], $code);
    }

    public function listjenis()
    {
        $jenisSuratList = JenisSurat::where('is_active', true)->get();
        return view('warga.jenis-surat', compact('jenisSuratList'));
    }

    public function showcreate(Request $request)
    {
        $jenisSuratList = JenisSurat::where('is_active', true)->get();
        $selectedJenisId = $request->query('jenis');
        $user = $request->user();
        return view('warga/pengajuan/form-pengajuan', compact('jenisSuratList', 'selectedJenisId', 'user'));
    }

    public function getFormStructure($jenisSuratId)
    {
        try {
            $jenisSurat = JenisSurat::findOrFail($jenisSuratId);

            // ✅ parse form_structure
            $formStructure = is_array($jenisSurat->form_structure)
                ? $jenisSurat->form_structure
                : json_decode($jenisSurat->form_structure ?? '[]', true);

            // ✅ parse syarat
            $syarat = is_array($jenisSurat->syarat)
                ? $jenisSurat->syarat
                : json_decode($jenisSurat->syarat ?? '[]', true);

            // Format fields
            $mappedFields = array_map(function ($field) {
                $name = $field['name'] ?? $field['field_name'] ?? '';

                return [
                    'key'         => $name,
                    'name'        => $name,
                    'label'       => $field['label'] ?? $name,
                    'type'        => $field['type'] ?? 'text',
                    'placeholder' => $field['placeholder'] ?? '',
                    'required'    => $field['required'] ?? true
                ];
            }, $formStructure ?? []);

            return response()->json([
                'success' => true,
                'message' => 'Form structure berhasil dimuat',
                'data' => [
                    'form_structure' => $mappedFields,
                    'syarat'         => $syarat ?? []
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat struktur form',
                'error'   => $e->getMessage()
            ], 404);
        }
    }

    public function getPlaceholders($jenisSuratId) 
    { 
        return $this->getFormStructure($jenisSuratId); 
    
    }


    public function getJenisSurat($jenisSuratId)
    {
        try {
            $cacheKey = "jenis_surat_{$jenisSuratId}";

            $jenisSurat = cache()->remember($cacheKey, 3600, function () use ($jenisSuratId) {
                return JenisSurat::findOrFail($jenisSuratId);
            });

            return $this->ok('Data jenis surat berhasil dimuat', [
                'id'           => $jenisSurat->id,
                'nama_surat'   => $jenisSurat->nama_surat,
                'deskripsi'    => $jenisSurat->deskripsi,
                'syarat'       => $jenisSurat->syarat,    // ✅
                'file_template'=> $jenisSurat->file_template
                    ? Storage::url($jenisSurat->file_template)
                    : null,
            ]);

        } catch (\Throwable $e) {
            return $this->fail('Jenis surat tidak ditemukan', 404, $e);
        }
    }


}
