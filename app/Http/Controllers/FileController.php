<?php
namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    // Preview file
    public function previewFile($pengajuanId, $label)
    {
        $label = urldecode($label);
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);

        $file = collect($pengajuan->file_syarat)->firstWhere('label', $label);
        if (!$file) abort(404, 'File tidak ditemukan');

        $filePath = Storage::path($file['path']);
        Log::info($filePath);
        if (!file_exists($filePath)) abort(404, 'File tidak ada');

        return response()->file($filePath, [
            'Content-Type' => $file['mime'],
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }


    // Download file
    public function downloadFile($pengajuanId, $label)
    {
        $label = urldecode($label);
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $file = collect($pengajuan->file_syarat)->firstWhere('label', $label);

        if (!$file) abort(404, 'File not found');

        $filePath = $file['path'];
        $disk = Storage::disk('local');

        if (!$disk->exists($filePath)) abort(404, 'File does not exist');

        $mimeType = $disk->mimeType($filePath);
        $fileName = $file['original_name'] ?? $file['label'] ?? 'document';

        return response()->streamDownload(function() use ($disk, $filePath) {
            echo $disk->get($filePath);
        }, $fileName, ['Content-Type' => $mimeType]);
    }
}
