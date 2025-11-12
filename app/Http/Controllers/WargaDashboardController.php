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
            ->orderByRaw("
                CASE
                    WHEN status IN ('menunggu', 'disetujui_verifikasi', 'menunggu_tanda_tangan') THEN 1
                    ELSE 2
                END
            ")
            ->orderByDesc('tanggal_pengajuan')
            ->get();

        $summary = [
            'total' => $pengajuanList->count(),
            'menunggu' => $pengajuanList->whereIn('status', ['menunggu', 'menunggu_verifikasi', 'menunggu_berkas'])->count(),
            'disetujui' => $pengajuanList->whereIn('status', ['disetujui', 'disetujui_verifikasi', 'menunggu_tanda_tangan'])->count(),
            'selesai' => $pengajuanList->where('status', 'selesai')->count(),
            'ditolak' => $pengajuanList->where('status', 'ditolak')->count(),
        ];

        return view('warga.dashboard', [
            'user' => $user,
            'pengajuanList' => $pengajuanList,
            'summary' => $summary,
        ]);
    }

    public function show(Request $request, $pengajuanId)
    {
        // Security: Validate parameter
        if (!is_numeric($pengajuanId) || $pengajuanId <= 0) {
            abort(400, 'ID pengajuan tidak valid');
        }

        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);

        if ($pengajuan->nik_pemohon !== $request->user()->nik) {
            abort(403, 'Anda tidak berhak melihat pengajuan ini.');
        }

        $pengajuan->load(['jenis', 'suratTerbit']);

        return view('warga.pengajuan.detail', [
            'user' => $request->user(),
            'pengajuan' => $pengajuan,
        ]);
    }

    public function cancel(Request $request, $pengajuanId)
    {
        // Security: Validate parameter
        if (!is_numeric($pengajuanId) || $pengajuanId <= 0) {
            abort(400, 'ID pengajuan tidak valid');
        }

        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);

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
    // Method untuk menampilkan form edit profil
    public function editProfil()
    {
        $user = Auth::user();
        return view('warga.edit-profil', compact('user'));
    }

    // Method untuk update profil
    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user_desa,email,' . $user->id,
            'nik' => 'required|string|size:16|unique:user_desa,nik,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'required|string|max:500',
            'dusun' => 'nullable|string|max:100',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
        ]);

        try {
            $user->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui profil',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}