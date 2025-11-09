<?php
namespace App\Services;

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\Settings;

class SuratGeneratorService
{

    public function generateFromTemplate(PengajuanSurat $pengajuan)
{
    $jenis = $pengajuan->jenis;
    $templateFile = $jenis->file_template;
    $templatePath = storage_path("app/public/{$templateFile}");

    if (!file_exists($templatePath)) {
        throw new \Exception("Template {$templateFile} tidak ditemukan.");
    }


    $tpl = new TemplateProcessor($templatePath);
    $data = $this->buildTemplateData($pengajuan);

    foreach ($data as $key => $val) {
        $tpl->setValue($key, is_array($val) ? implode(', ', $val) : $val);
    }

    // Simpan DOCX hasil generate
    $generateDir = storage_path('app/private/generate');
    if (!is_dir($generateDir)) mkdir($generateDir, 0755, true);

    $outDocName = 'surat_' . $pengajuan->id . '_' . time() . '.docx';
    $outDocFullPath = $generateDir . '/' . $outDocName;
    $tpl->saveAs($outDocFullPath);

    return [
        'path' => 'private/generate/' . $outDocName,
        'url'  => url('private/generate/' . $outDocName)  // Path ke file DOCX hasil generate
    ];
}
    
    private function buildTemplateData(PengajuanSurat $pengajuan): array
    {
        // Ambil hanya form_structure_data
        $dataform = $pengajuan->data_isian['form_structure_data'] ?? [];

        $now = Carbon::now('Asia/Jakarta');
        $now->locale('id');

        $tanggalTerbit = $now->translatedFormat('d F Y');

        return array_merge($dataform, [
            'year' => $now->format('Y'),
            'Date_Terbit' => $tanggalTerbit,
        ]);
    }
}
