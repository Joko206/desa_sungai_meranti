<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WargaDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $pengajuanList = PengajuanSurat::with('jenis')
            ->where('nik_pemohon', $user->nik)
            ->orderByDesc('tanggal_pengajuan')
            ->get();

        $summary = [
            'total' => $pengajuanList->count(),
            'menunggu' => $pengajuanList->where('status', 'menunggu')->count(),
            'disetujui' => $pengajuanList->where('status', 'disetujui')->count(),
            'ditolak' => $pengajuanList->where('status', 'ditolak')->count(),
        ];

        return view('warga.dashboard', [
            'user' => $user,
            'pengajuanList' => $pengajuanList,
            'summary' => $summary,
        ]);
    }

    public function show(Request $request, PengajuanSurat $pengajuan)
    {
        if ($pengajuan->nik_pemohon !== $request->user()->nik) {
            abort(403, 'Anda tidak berhak melihat pengajuan ini.');
        }

        $pengajuan->load(['jenis', 'suratTerbit']);

        return view('warga.pengajuan.detail', [
            'user' => $request->user(),
            'pengajuan' => $pengajuan,
        ]);
    }

    public function cancel(Request $request, PengajuanSurat $pengajuan)
    {
        if ($pengajuan->nik_pemohon !== $request->user()->nik) {
            abort(403, 'Anda tidak berhak membatalkan pengajuan ini.');
        }

        if ($pengajuan->status !== 'menunggu') {
            return redirect()
                ->route('warga.dashboard')
                ->with('error', 'Pengajuan hanya dapat dibatalkan ketika status masih menunggu.');
        }

        DB::transaction(function () use ($pengajuan) {
            $pengajuan->status = 'dibatalkan';
            $pengajuan->save();
        });

        return redirect()
            ->route('warga.dashboard')
            ->with('success', 'Pengajuan berhasil dibatalkan.');
    }

    // Method untuk menampilkan jenis surat (existing method)
    public function jenisSurat()
    {
        $jenisSuratList = JenisSurat::active()
            ->orderBy('nama_surat')
            ->get();

        return view('warga.jenis-surat', [
            'jenisSuratList' => $jenisSuratList
        ]);
    }

    // Method untuk menampilkan syarat jenis surat
    public function syarat(JenisSurat $jenisSurat)
    {
        // Pastikan jenis surat masih aktif
        if (!$jenisSurat->is_active) {
            abort(404, 'Jenis surat tidak tersedia.');
        }

        return view('warga.syarat', [
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function serveFile($pengajuanId, $fileIndex, Request $request)
    {
        try {
            $user = Auth::user();
            
            // Find the pengajuan and ensure it belongs to this user
            $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
            
            if ($pengajuan->nik_pemohon !== $user->nik) {
                abort(403, 'Anda tidak berhak mengakses file ini.');
            }
            
            // Get file_syarat array
            $fileSyarat = $pengajuan->file_syarat;
            
            if (!$fileSyarat || !isset($fileSyarat[$fileIndex])) {
                abort(404, 'File tidak ditemukan');
            }

            $file = $fileSyarat[$fileIndex];
            $filePath = $file['path'] ?? null;

            if (!$filePath) {
                abort(404, 'Path file tidak ditemukan');
            }

            // Remove 'public/' prefix if present to get the storage path
            $storagePath = str_replace('public/', '', $filePath);
            
            // Check if file exists in private storage
            if (!Storage::exists($storagePath)) {
                abort(404, 'File tidak ada');
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
            Log::error('Error serving warga file: ' . $e->getMessage());
            abort(500, 'Error serving file');
        }
    }
}