<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PengajuanSurat;
use App\Models\SuratTerbit;
use App\Services\SuratGeneratorService;

class AdminPengajuanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = PengajuanSurat::with('pemohon', 'jenis', 'suratTerbit')
                ->orderBy('created_at', 'desc');

            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->whereHas('pemohon', function ($q) use ($searchTerm) {
                    $q->where('nama', 'like', "%{$searchTerm}%")
                    ->orWhere('nik', 'like', "%{$searchTerm}%");
                });
            }

            $list = $query->paginate(15)->withQueryString();

            // Check if this is an API request (JSON) or web request (HTML)
            if ($request->expectsJson() || $request->header('Accept') === 'application/json') {
                // Format response for API/JSON requests
                $transformed = $list->getCollection()->map(function($item){
                    return [
                        "id" => $item->id,
                        "status" => $item->status,
                        "tanggal_pengajuan" => $item->created_at,
                        "nik_pemohon" => $item->pemohon->nik ?? null,
                        
                        "pemohon" => [
                            "nik" => $item->pemohon->nik ?? null,
                            "nama" => $item->pemohon->nama ?? null
                        ],

                        "jenis" => [
                            "nama_surat" => $item->jenis->nama_urat ?? null
                        ],

                        "data_isian" => $item->data_isian ?? null,

                        "surat_terbit" => $item->suratTerbit ? [
                            "tanggal_terbit" => $item->suratTerbit->tanggal_terbit,
                            "status_cetak" => $item->suratTerbit->status_cetak,
                            "file_surat" => $item->suratTerbit->file_surat,
                        ] : null
                    ];
                });

                $list->setCollection($transformed);

                return response()->json([
                    'success' => true,
                    'message' => 'Data pengajuan berhasil dimuat',
                    'data' => $list
                ]);
            }

            // For web requests, return the view
            return view('admin.pengajuan.index', compact('list'));
        } catch (\Exception $e) {
            if ($request->expectsJson() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memuat data pengajuan',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            // For web requests, show error page
            abort(500, 'Gagal memuat data pengajuan: ' . $e->getMessage());
        }
    }


    public function show($id, Request $request)
    {
        try {
            $pengajuan = PengajuanSurat::with('pemohon','jenis','suratTerbit')->findOrFail($id);

            $fileSyarat = collect($pengajuan->file_syarat, true ?? [])
            ->map(function($file) {
                return [
                    "label" => $file['label'] ?? 'Tidak Ada',
                    "path" => $file['path'] ?? '',
                    "original_name" => $file['original_name'] ?? '',
                    "mime" => $file['mime'] ?? '',
                    "size_kb" => isset($file['size']) ? round($file['size'] / 1024, 2) : null,
                    "uploaded_at" => $file['uploaded_at'] ?? null,
                ];
            })->toArray();

            $data = [
                "id" => $pengajuan->id,
                "status" => $pengajuan->status,
                "tanggal_pengajuan" => $pengajuan->created_at,

                "pemohon" => [
                    "nik" => $pengajuan->pemohon->nik ?? null,
                    "nama" => $pengajuan->pemohon->nama ?? null,
                    "alamat" => $pengajuan->pemohon->alamat ?? null,
                    "no_hp" => $pengajuan->pemohon->no_hp ?? null
                ],

                "jenis" => [
                    "nama_surat" => $pengajuan->jenis->nama_surat ?? null
                ],

                "data_isian" => $pengajuan->data_isian ?? null,

                "file_syarat" => $fileSyarat ?? null,

                "surat_terbit" => $pengajuan->suratTerbit ? [
                    "tanggal_terbit" => $pengajuan->suratTerbit->tanggal_terbit,
                    "status_cetak"   => $pengajuan->suratTerbit->status_cetak,
                    "file_surat"     => $pengajuan->suratTerbit->file_surat,
                ] : null
            ];

            // ✅ If JSON request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data pengajuan berhasil dimuat',
                    'data' => $data
                ]);
            }

            // ✅ Otherwise → return blade UI
            return view('admin.pengajuan.detail', compact('pengajuan'));

        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengajuan tidak ditemukan',
                    'error' => $e->getMessage()
                ], 404);
            }

            abort(404);
        }
    }

    public function reject(Request $request, $id)
    {
        try {
            $p = PengajuanSurat::findOrFail($id);
            $request->validate(['alasan' => 'required|string']);
            $p->status = 'ditolak';
            $p->alasan_penolakan = $request->alasan;
            $p->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Pengajuan ditolak',
                'data' => $p->load('pemohon', 'jenis', 'suratTerbit')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menolak pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function approve($id)
    {
        try {
            $p = PengajuanSurat::findOrFail($id);
            $p->status = 'disetujui_verifikasi';
            $p->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Pengajuan disetujui, siap digenerate',
                'data' => $p->load('pemohon', 'jenis', 'suratTerbit')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyetujui pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function generateSurat(Request $request, $id)
    {
        try {
            $generator = app(SuratGeneratorService::class);
            $p = PengajuanSurat::with('jenis','pemohon')->findOrFail($id);
    
            if ($p->status !== 'disetujui_verifikasi') {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengajuan belum disetujui atau tidak dalam status yang benar'
                ], 422);
            }
    
            $output = $generator->generateFromTemplate($p);
            Log::info('Debug generate surat output:', $output);
    
            $surat = SuratTerbit::create([
                'pengajuan_id' => $p->id,
                'file_surat' => $output['path'],
                'tanggal_terbit' => now(),
                'status_cetak' => 'menunggu_tanda_tangan'
            ]);
    
            $p->status = 'menunggu_tanda_tangan';
            $p->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil dibuat',
                'file' => $output['url']
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat dokumen',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function dashboardSummary()
    {
        try {
            $jumlahPengajuanBaru = PengajuanSurat::where('status', 'menunggu')->count();
            $jumlahSuratDisetujui = PengajuanSurat::where('status', 'disetujui_verifikasi')->count();
            $jumlahSuratDitolak = PengajuanSurat::where('status', 'ditolak')->count();
            $jumlahSuratTerbitHariIni = SuratTerbit::whereDate('tanggal_terbit', now()->toDateString())->count();

            return response()->json([
                'success' => true,
                'message' => 'Summary dashboard berhasil dimuat',
                'data' => [
                    'jumlah_pengajuan_baru' => $jumlahPengajuanBaru,
                    'jumlah_surat_disetujui' => $jumlahSuratDisetujui,
                    'jumlah_surat_ditolak' => $jumlahSuratDitolak,
                    'jumlah_surat_terbit_hari_ini' => $jumlahSuratTerbitHariIni,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat summary dashboard',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function serveFile($pengajuanId, $fileIndex, Request $request)
    {
        try {
            // Validate user is admin
            if (Auth::user()->role->nama_role !== 'admin') {
                abort(403, 'Unauthorized access');
            }

            // Find the pengajuan
            $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
            
            // Get file_syarat array
            $fileSyarat = $pengajuan->file_syarat;
            
            if (!$fileSyarat || !isset($fileSyarat[$fileIndex])) {
                abort(404, 'File not found');
            }

            $file = $fileSyarat[$fileIndex];
            $filePath = $file['path'] ?? null;

            if (!$filePath) {
                abort(404, 'File path not found');
            }

            // Remove 'public/' prefix if present to get the storage path
            $storagePath = str_replace('public/', '', $filePath);
            
            // Check if file exists in private storage
            if (!Storage::exists($storagePath)) {
                abort(404, 'File does not exist');
            }

            // Get file contents and metadata
            $fileContent = Storage::get($storagePath);
            $mimeType = Storage::mimeType($storagePath);
            $fileName = $file['original_name'] ?? $file['label'] ?? 'document';

            // Determine response type based on request parameters
            if ($request->has('download')) {
                // Force download
                return response($fileContent, 200, [
                    'Content-Type' => $mimeType,
                    'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                    'Content-Length' => strlen($fileContent),
                ]);
            } else {
                // Preview/view the file
                return response($fileContent, 200, [
                    'Content-Type' => $mimeType,
                    'Content-Disposition' => 'inline; filename="' . $fileName . '"',
                    'Content-Length' => strlen($fileContent),
                    'Cache-Control' => 'no-cache, no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0',
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Error serving file: ' . $e->getMessage());
            abort(500, 'Error serving file');
        }
    }
}
