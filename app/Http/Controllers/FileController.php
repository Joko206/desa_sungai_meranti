<?php
namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    // Preview file
    public function previewFile($pengajuanId, $label)
    {
        // Security: Validate parameters
        if (!is_numeric($pengajuanId) || $pengajuanId <= 0) {
            abort(400, 'Invalid pengajuan ID');
        }

        $label = urldecode($label);
        // Security: Sanitize label to prevent path traversal
        $label = preg_replace('/[^a-zA-Z0-9_\-\s]/', '', $label);

        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);

        // Security: Check if user has permission to access this pengajuan
        if (Auth::check()) {
            $user = Auth::user();
            // Admin can access all, warga can only access their own
            if ($user->roleModel->nama_role !== 'admin' && $pengajuan->nik_pemohon !== $user->nik) {
                abort(403, 'Access denied');
            }
        } else {
            abort(401, 'Authentication required');
        }

        $file = collect($pengajuan->file_syarat)->firstWhere('label', $label);
        if (!$file) abort(404, 'File tidak ditemukan');

        // Check if file has a valid path
        if (empty($file['path']) || $file['path'] === false) {
            abort(404, 'File tidak ditemukan atau belum diupload');
        }

        // Security: Prevent directory traversal in stored path
        $storedPath = $file['path'];
        if (str_contains($storedPath, '..') || str_contains($storedPath, '/..')) {
            abort(403, 'Invalid file path');
        }

        // Build absolute path with /private/ folder
        $absolutePath = base_path() . '/storage/app/private/' . $storedPath;

        if (!file_exists($absolutePath)) abort(404, 'File tidak ada di server');

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
        // Security: Validate parameters
        if (!is_numeric($pengajuanId) || $pengajuanId <= 0) {
            abort(400, 'Invalid pengajuan ID');
        }

        $label = urldecode($label);
        // Security: Sanitize label to prevent path traversal
        $label = preg_replace('/[^a-zA-Z0-9_\-\s]/', '', $label);

        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);

        // Security: Check if user has permission to access this pengajuan
        if (Auth::check()) {
            $user = Auth::user();
            // Admin can access all, warga can only access their own
            if ($user->roleModel->nama_role !== 'admin' && $pengajuan->nik_pemohon !== $user->nik) {
                abort(403, 'Access denied');
            }
        } else {
            abort(401, 'Authentication required');
        }

        $file = collect($pengajuan->file_syarat)->firstWhere('label', $label);

        if (!$file) abort(404, 'File not found');

        // Check if file has a valid path
        if (empty($file['path']) || $file['path'] === false) {
            abort(404, 'File tidak ditemukan atau belum diupload');
        }

        // Security: Prevent directory traversal in stored path
        $storedPath = $file['path'];
        if (str_contains($storedPath, '..') || str_contains($storedPath, '/..')) {
            abort(403, 'Invalid file path');
        }

        // Build absolute path with /private/ folder
        $absolutePath = base_path() . '/storage/app/private/' . $storedPath;

        if (!file_exists($absolutePath)) abort(404, 'File does not exist');

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
        // Security: Validate filename to prevent directory traversal
        if (!preg_match('/^[a-zA-Z0-9_\-\.]+$/', $filename) || str_contains($filename, '..')) {
            abort(403, 'Invalid filename');
        }

        // Build absolute path manually
        $basePath = base_path();
        $absolutePath = $basePath . '/storage/app/private/generate/' . $filename;

        if (!file_exists($absolutePath)) {
            Log::error('FileController::viewSurat - File not found: ' . $absolutePath);
            abort(404, 'File surat tidak ditemukan');
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
