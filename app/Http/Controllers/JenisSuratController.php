<?php
namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory as SpreadsheetIOFactory;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
class JenisSuratController extends Controller
{
    // Menampilkan semua jenis surat
    public function jenisSuratList()
    {
        try {
            $jenisSurat = JenisSurat::all()->map(function ($item) {
                $item->file_template = $item->file_template ? Storage::url($item->file_template) : null;
                return $item;
            });

            return response()->json([
                'success' => true,
                'message' => 'Data jenis surat berhasil dimuat',
                'data' => $jenisSurat,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data jenis surat',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Menambahkan jenis surat baru
    public function AddLetter(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_surat' => 'required|string|max:150',
                'file_template' => 'nullable|file|mimes:pdf,docx,doc,xlsx|max:10240',
                'deskripsi' => 'nullable|string',
                'nama_syarat' => 'nullable|array',
                'nama_syarat.*' => 'string|max:200',
                'is_active' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $filePath = null;
            $formStructure = [];

            if ($request->hasFile('file_template')) {
                $file = $request->file('file_template');
                $filePath = $file->store('templates', 'public');
                $ext = strtolower($file->getClientOriginalExtension());
                $absolutePath = Storage::disk('public')->path($filePath);
                $formStructure = $this->extractFormStructure($absolutePath, $ext);
            }

            // Proses array nama syarat
            $namaSyarat = $request->input('nama_syarat', []);
            // Filter yang kosong dan bersihkan
            $namaSyarat = array_filter(array_map('trim', $namaSyarat), function($value) {
                return !empty($value);
            });

            $jenisSurat = JenisSurat::create([
                'nama_surat' => $request->input('nama_surat'),
                'file_template' => $filePath,
                'form_structure' => $formStructure,
                'deskripsi' => $request->input('deskripsi'),
                'syarat' => $namaSyarat,
                'is_active' => $request->boolean('is_active', true),
            ]);

            // Konversi ke URL publik sebelum dikirim ke frontend
            $jenisSurat->file_template = $jenisSurat->file_template ? Storage::url($jenisSurat->file_template) : null;

            return response()->json([
                'success' => true,
                'message' => 'Jenis Surat berhasil disimpan!',
                'data' => $jenisSurat,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan jenis surat',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Update jenis surat
    public function updateJenisSurat(Request $request, JenisSurat $jenisSuratId)
    {
        try {
            // ✅ Validasi hanya 3 field yang dibolehkan
            $validator = Validator::make($request->all(), [
                'nama_surat' => 'required|string|max:150',
                'deskripsi' => 'nullable|string',
                'nama_syarat' => 'nullable|array',
                'nama_syarat.*' => 'string|max:200',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $payload = $validator->validated();
            $updates = [];

            // Update field dasar
            if (isset($payload['nama_surat'])) $updates['nama_surat'] = $payload['nama_surat'];
            if (isset($payload['deskripsi'])) $updates['deskripsi'] = $payload['deskripsi'];

            // ✅ Proses syarat surat
            if (array_key_exists('nama_syarat', $payload)) {
                $namaSyarat = $payload['nama_syarat'] ?? [];
                // Bersihkan elemen kosong & trim
                $namaSyarat = array_filter(array_map('trim', $namaSyarat), fn($v) => !empty($v));
                $updates['syarat'] = $namaSyarat;
            }

            // Jalankan update jika ada data
            if (!empty($updates)) {
                $jenisSuratId->update($updates);
            }

            $jenisSuratId->refresh();

            return response()->json([
                'success' => true,
                'message' => 'Jenis surat berhasil diperbarui!',
                'data' => $jenisSuratId,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui jenis surat.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Ambil placeholder dari database
    public function getPlaceholders(Request $request, $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        // Return form_structure from database
        $formStructure = $jenisSurat->form_structure ?? [];

        // If no form_structure in database, try to extract from file if exists
        if (empty($formStructure) && $jenisSurat->file_template && Storage::disk('public')->exists($jenisSurat->file_template)) {
            $templateFile = Storage::disk('public')->path($jenisSurat->file_template);
            $ext = strtolower(pathinfo($templateFile, PATHINFO_EXTENSION));
            $formStructure = $this->extractFormStructure($templateFile, $ext);
        }

        return response()->json(['success' => true, 'data' => $formStructure]);
    }

    // Extract form structure dari file template
    private function extractFormStructure(string $filePath, string $extension): array
    {
        if (!file_exists($filePath)) return [];
        if (in_array($extension, ['doc', 'docx'])) return $this->extractDocxPlaceholders($filePath);
        if ($extension === 'xlsx') return $this->extractXlsxPlaceholders($filePath);
        return [];
    }

    private function extractDocxPlaceholders(string $filePath): array
    {
        if (!file_exists($filePath)) return [];

        try {
            $template = new TemplateProcessor($filePath);

            // Ambil semua placeholder dari template
            $variables = $template->getVariables(); // array string

            $placeholders = [];

            foreach ($variables as $key) {
                $placeholders[] = [
                    'name'  => $key,
                    'label' => ucwords(str_replace(['_', '-'], ' ', $key)),
                    'type'  => 'text',
                ];
            }

            return $placeholders;

        } catch (\Throwable $e) {
            return [];
        }
    }

    private function extractTextFromElement($element): string
    {
        $text = '';

        // ✅ Text inside table rows & cells
        if ($element instanceof \PhpOffice\PhpWord\Element\Table) {
            foreach ($element->getRows() as $row) {
                foreach ($row->getCells() as $cell) {
                    foreach ($cell->getElements() as $child) {
                        $text .= $this->extractTextFromElement($child);
                    }
                }
            }
        }

        // ✅ Handle TextRun (runs inside paragraphs/cells)
        if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
            foreach ($element->getElements() as $child) {
                $text .= $this->extractTextFromElement($child);
            }
            return $text;
        }

        // ✅ Normal text
        if (method_exists($element, 'getText')) {
            $value = $element->getText();
            if (is_string($value)) {
                $text .= $value . ' ';
            }
        }

        // ✅ Recurse elements (paragraph etc.)
        if (method_exists($element, 'getElements')) {
            foreach ($element->getElements() as $child) {
                $text .= $this->extractTextFromElement($child);
            }
        }

        return $text;
    }


    // Admin Methods
    public function adminIndex(Request $request)
    {
        try {
            $jenisSurat = JenisSurat::withCount('pengajuanSurat')
                ->orderByDesc('created_at')
                ->get();
            
            // Check if this is a web request or API request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'data' => $jenisSurat
                ]);
            }

            // For web requests, return the view with data
            return view('admin.jenis-surat.index', [
                'jenisSuratList' => $jenisSurat
            ]);
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memuat data jenis surat',
                    'error' => $e->getMessage()
                ], 500);
            }
            throw $e;
        }
    }

    public function adminShow(JenisSurat $jenisSurat)
    {
        try {
            $jenisSurat->load('pengajuanSurat');
            
            return response()->json([
                'success' => true,
                'data' => $jenisSurat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data jenis surat',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function adminDestroy($jenisSuratId)
    {
        $jenisSurat = JenisSurat::find($jenisSuratId);

        if (!$jenisSurat) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis surat tidak ditemukan'
            ], 404);
        }

        // Cek relasi pengajuan
        if ($jenisSurat->pengajuanSurat()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis surat tidak dapat dihapus karena masih memiliki pengajuan'
            ], 400);
        }

        // Hapus file template jika ada
        if ($jenisSurat->file_template) {
            Storage::disk('public')->delete($jenisSurat->file_template);
        }

        $jenisSurat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jenis surat berhasil dihapus'
        ]);
    }


    public function adminToggleStatus(JenisSurat $jenisSurat)
    {
        try {
            $jenisSurat->update([
                'is_active' => !$jenisSurat->is_active
            ]);

            $status = $jenisSurat->is_active ? 'diaktifkan' : 'dinonaktifkan';

            return response()->json([
                'success' => true,
                'message' => "Jenis surat berhasil {$status}",
                'data' => $jenisSurat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status jenis surat',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Index method alias for API compatibility
    public function index()
    {
        return $this->jenisSuratList();
    }

    // Bulk toggle status for multiple jenis surat
    public function bulkToggleStatus(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ids' => 'required|array',
                'ids.*' => 'exists:jenis_surat,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $ids = $request->input('ids');
            $jenisSuratList = JenisSurat::whereIn('id', $ids)->get();

            if ($jenisSuratList->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada data jenis surat yang ditemukan'
                ], 404);
            }

            // Toggle status for all selected items
            foreach ($jenisSuratList as $jenisSurat) {
                $jenisSurat->update([
                    'is_active' => !$jenisSurat->is_active
                ]);
            }

            $activeCount = $jenisSuratList->where('is_active', true)->count();
            $inactiveCount = $jenisSuratList->where('is_active', false)->count();

            return response()->json([
                'success' => true,
                'message' => "Berhasil mengubah status {$jenisSuratList->count()} jenis surat ({$activeCount} aktif, {$inactiveCount} nonaktif)",
                'data' => [
                    'updated_count' => $jenisSuratList->count(),
                    'active_count' => $activeCount,
                    'inactive_count' => $inactiveCount
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status jenis surat',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Bulk delete multiple jenis surat
    public function bulkDelete(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ids' => 'required|array',
                'ids.*' => 'exists:jenis_surat,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $ids = $request->input('ids');
            $jenisSuratList = JenisSurat::whereIn('id', $ids)->get();

            if ($jenisSuratList->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada data jenis surat yang ditemukan'
                ], 404);
            }

            // Check if any jenis surat has pengajuan
            $withPengajuan = $jenisSuratList->filter(function($item) {
                return $item->pengajuanSurat()->count() > 0;
            });

            if ($withPengajuan->isNotEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Beberapa jenis surat tidak dapat dihapus karena masih memiliki pengajuan'
                ], 400);
            }

            // Delete file templates and records
            foreach ($jenisSuratList as $jenisSurat) {
                if ($jenisSurat->file_template) {
                    Storage::disk('public')->delete($jenisSurat->file_template);
                }
            }

            $deletedCount = $jenisSuratList->count();
            JenisSurat::whereIn('id', $ids)->delete();

            return response()->json([
                'success' => true,
                'message' => "Berhasil menghapus {$deletedCount} jenis surat",
                'data' => [
                    'deleted_count' => $deletedCount
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus jenis surat',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}