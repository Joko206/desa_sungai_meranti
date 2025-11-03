<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}