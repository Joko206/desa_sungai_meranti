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

            if (!in_array($pengajuan->status, ['menunggu', 'menunggu_berkas'])) {
                return $this->fail('Hanya bisa dibatalkan jika status menunggu atau menunggu berkas', 400);
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
    public function addPengajuan(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'jenis_surat_id' => 'required|exists:jenis_surat,id',
                'data_pemohon'   => 'required|array',
                'keterangan'     => 'required|string',
                'agree_terms'    => 'required|accepted',
            ]);

            $jenisSuratId = (int) $validated['jenis_surat_id'];
            $dataPemohon  = $validated['data_pemohon'];

            // Format RT/RW fields to 3 digits with leading zeros
            $dataPemohon = $this->formatRtRwFields($dataPemohon);

            [$nik, $nama] = $this->parseNikNama($dataPemohon, $request);

            $this->validateNikNama($nik, $nama);

            $pengajuan = $this->createPengajuan(
            $nik,
            $jenisSuratId,
            $dataPemohon,
            [], // kosong dulu
            $validated['keterangan']
        );

            $files = $this->uploadFiles($request, $pengajuan->id);
            $pengajuan->update(['file_syarat' => $files]);

            DB::commit();

           return redirect()->route('warga.dashboard')
                         ->with('success', 'Pengajuan berhasil dikirim');

        } catch (\Throwable $e) {

            DB::rollBack();

            $message = $e instanceof \Illuminate\Validation\ValidationException
                ? 'Validasi gagal: ' . $e->getMessage()
                : 'Gagal mengajukan surat: ' . $e->getMessage();

            return redirect()->back()->withInput()->withErrors(['general' => $message]);
        }
    }


    /* =============================
     |  HELPERS
     ============================= */

    private function parseNikNama(array $data, Request $request = null): array
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

        // Fallback to authenticated user data if not found in form
        if (!$nik && $request && $request->user()) {
            $nik = $request->user()->nik;
        }

        if (!$nama && $request && $request->user()) {
            $nama = $request->user()->nama;
        }

        return [$nik, $nama];
    }

    private function formatRtRwFields(array $data): array
    {
        foreach ($data as $key => $value) {
            $keyLower = strtolower($key);
            
            // Check if this is an RT/RW related field
            if (strpos($keyLower, 'rt') !== false || strpos($keyLower, 'rw') !== false) {
                // Remove any non-digit characters and format to 3 digits
                $digits = preg_replace('/[^0-9]/', '', $value);
                
                if (!empty($digits) && $digits > 0 && $digits <= 999) {
                    // Format to 3 digits with leading zeros
                    $data[$key] = str_pad($digits, 3, '0', STR_PAD_LEFT);
                }
            }
        }
        
        return $data;
    }

    private function validateNikNama(?string $nik, ?string $nama)
    {
        if (!$nik || strlen($nik) !== 16 || !ctype_digit($nik)) {
            throw new \Exception('NIK harus 16 digit angka');
        }

        if (!$nama || strlen($nama) < 2) {
            throw new \Exception('Nama minimal 2 karakter');
        }
    }

    private function uploadFiles(Request $request, $pengajuanId)
    {
        $jenisSurat = JenisSurat::findOrFail($request->jenis_surat_id);
        $syaratList = $jenisSurat->syarat ?? [];
        $uploadedFiles = [];
        $files = $request->file('file_syarat') ?? [];

        foreach ($syaratList as $label) {
            $safeLabel = str_replace(' ', '_', $label);

            // Kalau file tidak di-upload, langsung throw exception
            if (!isset($files[$safeLabel])) {
                throw new \Exception("File persyaratan '{$label}' belum di-upload");
            }

            $file = $files[$safeLabel];
            $filename = $safeLabel . '-' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs("persyaratan/{$pengajuanId}", $filename);

            $uploadedFiles[] = [
                "label" => $label,
                "path" => $path,
                "mime" => $file->getClientMimeType(),
                "size" => $file->getSize(),
                "uploaded_at" => now(),
                "original_name" => $file->getClientOriginalName()
            ];
        }

        return $uploadedFiles;
    }

    private function createPengajuan(string $nik, int $jenisId, array $data, array $files, string $ket)
    {
        $jenisSurat = JenisSurat::findOrFail($jenisId);
        $initialStatus = 'menunggu'; // Semua pengajuan mulai dari status menunggu

        $pengajuan = PengajuanSurat::create([
            'nik_pemohon'      => $nik,
            'jenis_surat_id'   => $jenisId,
            'tanggal_pengajuan'=> now(),
            'status'           => $initialStatus,
            'data_isian'       => [
                'form_structure_data'       => $data,
                'keterangan'                => $ket
            ],
            'file_syarat'      => $files,
        ]);


        return $pengajuan;
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
        return view('warga.pengajuan.form-pengajuan', compact('jenisSuratList', 'selectedJenisId', 'user'));
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
                
                $mappedField = [
                    'key'         => $name,
                    'name'        => $name,
                    'label'       => $field['label'] ?? $name,
                    'type'        => $field['type'] ?? 'text',
                    'placeholder' => $field['placeholder'] ?? '',
                    'required'    => $field['required'] ?? true
                ];
                
                // Add options for select fields
                if (($field['type'] ?? 'text') === 'select' && isset($field['options'])) {
                    $mappedField['options'] = $field['options'];
                }
                
                return $mappedField;
            }, $formStructure ?? []);

            $hiddenFields = ['year', 'date_terbit', 'Date_Terbit']; // tambahkan variasi jika beda kapital
            $mappedFields = array_values(array_filter($mappedFields, function ($field) use ($hiddenFields) 
            {
                return !in_array(strtolower($field['name']), array_map('strtolower', $hiddenFields));
            }));

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
