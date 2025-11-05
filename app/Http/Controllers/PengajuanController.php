<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{

    public function index(Request $request)
    {
        try {
            $userNik = $request->user()->nik;
            $pengajuanList = PengajuanSurat::with('jenis')
                ->where('nik_pemohon', $userNik)
                ->orderByDesc('tanggal_pengajuan')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Daftar pengajuan berhasil dimuat',
                'data' => $pengajuanList
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat daftar pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function cancel(Request $request, $id)
    {
        try {
            $pengajuan = PengajuanSurat::findOrFail($id);

            if ($pengajuan->nik_pemohon !== $request->user()->nik) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak berhak membatalkan pengajuan ini'
                ], 403);
            }

            if ($pengajuan->status !== 'menunggu') {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengajuan hanya bisa dibatalkan jika status menunggu'
                ], 400);
            }

            $pengajuan->status = 'dibatalkan';
            $pengajuan->save();

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan berhasil dibatalkan',
                'data' => $pengajuan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membatalkan pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function AddPengajuan(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'jenis_surat_id' => 'required|integer|exists:jenis_surat,id',
                'data_pemohon' => 'required|array',
                'keterangan' => 'required|string',
                'data_pemohon.*' => 'nullable|string',
            ]);

            $jenisSuratId = $validated['jenis_surat_id'];
            $dataPemohon = $validated['data_pemohon'];
            $keterangan = $validated['keterangan'];

            $nik = null;
            $nama = null;

            foreach ($dataPemohon as $key => $value) {
                $keyLower = strtolower($key);
                if (in_array($keyLower, ['nik', 'nik_pemohon', 'no_ktp', 'ktp'])) {
                    $nik = trim($value);
                    break;
                }
            }

            foreach ($dataPemohon as $key => $value) {
                $keyLower = strtolower($key);
                if (in_array($keyLower, ['nama', 'nama_lengkap', 'nama_pemohon'])) {
                    $nama = trim($value);
                    break;
                }
            }

            if (!$nik || strlen($nik) != 16 || !is_numeric($nik)) {
                return response()->json([
                    'success' => false,
                    'message' => 'NIK harus 16 digit angka dan wajib diisi'
                ], 422);
            }

            if (!$nama || strlen(trim($nama)) < 2) {
                return response()->json([
                    'success' => false,
                    'message' => 'Nama lengkap wajib diisi dan minimal 2 karakter'
                ], 422);
            }

            $files = $this->uploadFiles($request, $jenisSuratId);

            $pengajuan = $this->createPengajuan($nik, $jenisSuratId, $dataPemohon, $files, $keterangan);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan berhasil dikirim',
                'data' => [
                    'id' => $pengajuan->id ?? $pengajuan->nik_pemohon,
                    'nik_pemohon' => $pengajuan->nik_pemohon,
                    'jenis_surat_id' => $pengajuan->jenis_surat_id,
                    'tanggal_pengajuan' => $pengajuan->tanggal_pengajuan,
                    'status' => $pengajuan->status,
                    'data_isian' => $pengajuan->data_isian,
                    'file_syarat' => $pengajuan->file_syarat
                ]
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Data validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengajukan surat',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function uploadFiles(Request $request, $jenisSuratId)
    {
        $files = [];

        $uploadedFiles = $request->allFiles();

        foreach ($uploadedFiles as $fieldName => $file) {
            if (str_starts_with($fieldName, 'dokumen_') && $file instanceof \Illuminate\Http\UploadedFile) {
                $ext = strtolower($file->getClientOriginalExtension());
                $allowedExt = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'xlsx'];

                if (!in_array($ext, $allowedExt)) {
                    continue;
                }

                $folder = 'public/persyaratan/' . $jenisSuratId;
                $filename = Str::uuid() . '.' . $ext;
                $path = $file->storeAs($folder, $filename);

                $files[] = [
                    'field_name' => $fieldName,
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'mime' => $file->getMimeType(),
                    'size_kb' => round($file->getSize() / 1024, 2),
                    'uploaded_at' => now()->toISOString()
                ];
            }
        }

        return $files;
    }

    private function createPengajuan($nik, $jenisSuratId, $dataPemohon, $files, $keterangan)
    {
        return PengajuanSurat::create([
            'nik_pemohon' => $nik,
            'jenis_surat_id' => $jenisSuratId,
            'tanggal_pengajuan' => now()->toDateString(),
            'status' => 'menunggu',
            'data_isian' => [
                'form_structure_data' => $dataPemohon,
                'keterangan' => $keterangan,
                'submission_timestamp' => now()->toISOString()
            ],
            'file_syarat' => $files,
        ]);
    }

    public function show($id)
    {
        try {
            $pengajuan = PengajuanSurat::with('jenis', 'suratTerbit', 'pemohon')->findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Data pengajuan berhasil dimuat',
                'data' => $pengajuan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pengajuan tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $jenisSuratList = JenisSurat::where('is_active', true)->get();
        $selectedJenisId = $request->query('jenis');
        $user = $request->user();
        return view('warga/pengajuan/form-pengajuan', compact('jenisSuratList', 'selectedJenisId', 'user'));
    }

    public function jenis()
    {
        $jenisSuratList = JenisSurat::where('is_active', true)->get();
        return view('warga.jenis-surat', compact('jenisSuratList'));
    }

    public function getFormStructure($jenisSuratId)
    {
        try {
            $jenisSurat = JenisSurat::findOrFail($jenisSuratId);

            $formStructure = [];

            if ($jenisSurat->form_structure) {
                $formStructure = is_array($jenisSurat->form_structure)
                    ? $jenisSurat->form_structure
                    : json_decode($jenisSurat->form_structure, true) ?? [];
            }

            if (empty($formStructure)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Form structure berhasil dimuat',
                    'data' => []
                ]);
            }

            $mappedFields = array_map(function ($field) {
                return [
                    'key' => $field['name'] ?? $field['field_name'] ?? '',
                    'name' => $field['name'] ?? $field['field_name'] ?? '',
                    'label' => $field['label'] ?? $field['name'] ?? $field['field_name'] ?? '',
                    'type' => $field['type'] ?? 'text',
                    'placeholder' => $field['placeholder'] ?? '',
                    'required' => $field['required'] ?? true
                ];
            }, $formStructure);

            return response()->json([
                'success' => true,
                'message' => 'Form structure berhasil dimuat',
                'data' => $mappedFields
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat struktur form',
                'error' => $e->getMessage()
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

            return response()->json([
                'success' => true,
                'message' => 'Data jenis surat berhasil dimuat',
                'data' => $jenisSurat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis surat tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'jenis_surat_id' => 'required|exists:jenis_surat,id',
                'keterangan' => 'required|string|min:10',
                'agree_terms' => 'required|accepted',
            ];

            $fileRules = [];
            foreach ($request->allFiles() as $key => $file) {
                if (str_starts_with($key, 'dokumen_')) {
                    $fileRules[$key] = 'file|mimes:jpg,jpeg,png,pdf,docx,xlsx|max:2048';
                }
            }

            $validated = $request->validate(array_merge($rules, $fileRules));

            $dataPemohon = $request->input('data_pemohon', []);
            if (empty($dataPemohon)) {
                $nestedData = [];
                foreach ($request->all() as $key => $value) {
                    if (str_starts_with($key, 'data_pemohon[') && str_ends_with($key, ']')) {
                        $fieldName = substr($key, 14, -1);
                        $nestedData[$fieldName] = $value;
                    }
                }
                if (!empty($nestedData)) {
                    $dataPemohon = $nestedData;
                }
            }

            if (empty($dataPemohon)) {
                $user = $request->user();
                $dataPemohon = [
                    'nama' => $user->nama ?? '',
                    'nik' => $user->nik ?? '',
                    'alamat' => $user->alamat ?? '',
                    'no_hp' => $user->no_hp ?? '',
                ];
            }

            $nik = null;
            foreach ($dataPemohon as $key => $value) {
                if (in_array(strtolower($key), ['nik', 'nik_pemohon', 'no_ktp', 'ktp'])) {
                    $nik = trim($value);
                    break;
                }
            }

            if (!$nik && $request->user()) {
                $nik = $request->user()->nik;
            }

            if (!$nik || strlen($nik) !== 16 || !ctype_digit($nik)) {
                return redirect()->back()
                    ->withErrors(['data_pemohon_nik' => 'NIK harus 16 digit angka dan wajib diisi'])
                    ->withInput();
            }

            $nama = null;
            foreach ($dataPemohon as $key => $value) {
                if (in_array(strtolower($key), ['nama', 'nama_lengkap', 'nama_pemohon'])) {
                    $nama = trim($value);
                    break;
                }
            }

            if (!$nama && $request->user()) {
                $nama = $request->user()->nama;
            }

            if (!$nama || strlen($nama) < 2) {
                return redirect()->back()
                    ->withErrors(['data_pemohon_nama' => 'Nama lengkap wajib diisi dan minimal 2 karakter'])
                    ->withInput();
            }

            $normalizedData = $dataPemohon;
            $normalizedData['nik_pemohon'] = $nik;
            if (!isset($normalizedData['nama']) || empty(trim($normalizedData['nama']))) {
                $normalizedData['nama'] = $nama;
            }

            $pengajuan = DB::transaction(function () use ($request, $validated, $normalizedData, $nik) {
                $files = $this->uploadFiles($request, $validated['jenis_surat_id']);

                return $this->createPengajuan(
                    $nik,
                    $validated['jenis_surat_id'],
                    $normalizedData,
                    $files,
                    $validated['keterangan']
                );
            });

            return redirect()->route('warga.dashboard')
                ->with('success', 'Pengajuan berhasil dikirim! Nomor pengajuan: #' . ($pengajuan->id ?? 'NEW'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();
            $errorMessages = [];

            foreach ($errors as $field => $messages) {
                if ($field === 'data_pemohon' || str_starts_with($field, 'data_pemohon.')) {
                    $errorMessages['data_pemohon'] = 'Data pemohon tidak lengkap';
                } else {
                    $errorMessages[$field] = implode(' ', $messages);
                }
            }

            return redirect()->back()
                ->withErrors($errorMessages)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Gagal mengirim pengajuan: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
