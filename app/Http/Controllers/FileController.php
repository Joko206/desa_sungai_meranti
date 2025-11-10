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

        // Check if file has a valid path
        if (empty($file['path']) || $file['path'] === false) {
            abort(404, 'File tidak ditemukan atau belum diupload');
        }

        // Build absolute path with /private/ folder
        $storedPath = $file['path'];
        $absolutePath = base_path() . '/storage/app/private/' . $storedPath;
        
        if (!file_exists($absolutePath)) abort(404, 'File tidak ada di server: ' . $absolutePath);

        // Get mime type
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($absolutePath);
        
        if (empty($mimeType)) {
            $mimeType = $file['mime'] ?? 'application/octet-stream';
        }

        return response()->file($absolutePath, [
            'Content-Type' => $mimeType,
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

        // Check if file has a valid path
        if (empty($file['path']) || $file['path'] === false) {
            abort(404, 'File tidak ditemukan atau belum diupload');
        }

        // Build absolute path with /private/ folder
        $storedPath = $file['path'];
        $absolutePath = base_path() . '/storage/app/private/' . $storedPath;

        if (!file_exists($absolutePath)) abort(404, 'File does not exist: ' . $absolutePath);

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($absolutePath);
        
        if (empty($mimeType)) {
            $mimeType = $file['mime'] ?? 'application/octet-stream';
        }
        
        $fileName = $file['original_name'] ?? $file['label'] ?? 'document';

        return response()->streamDownload(function() use ($absolutePath) {
            echo file_get_contents($absolutePath);
        }, $fileName, ['Content-Type' => $mimeType]);
    }

    // View generated surat files
    public function viewSurat($filename)
    {
        // Build absolute path manually
        $basePath = base_path();
        $absolutePath = $basePath . '/storage/app/private/generate/' . $filename;
        
        if (!file_exists($absolutePath)) {
            Log::error('FileController::viewSurat - File not found: ' . $absolutePath);
            abort(404, 'File surat tidak ditemukan: ' . $absolutePath);
        }
        
        // Get mime type using finfo
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($absolutePath);
        
        if (empty($mimeType)) {
            $mimeType = 'application/octet-stream';
        }

        return response()->file($absolutePath, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
