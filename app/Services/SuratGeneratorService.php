<?php
namespace App\Services;

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Log;

class SuratGeneratorService
{

    public function generateFromTemplate(PengajuanSurat $pengajuan)
{
    $jenis = $pengajuan->jenis;
    $templateFile = $jenis->file_template;
    $templatePath = storage_path("app/public/{$templateFile}");

    Log::info("Generate Surat: templatePath={$templatePath}");

    if (!file_exists($templatePath)) {
        throw new \Exception("Template {$templateFile} tidak ditemukan.");
    }

    $tempDir = storage_path('app/temp');
    if (!is_dir($tempDir)) mkdir($tempDir, 0755, true);

    $tempDocPath = storage_path('app/temp/' . uniqid('doc_') . '.docx');
    copy($templatePath, $tempDocPath);

    Log::info("Temp DOCX path: {$tempDocPath}");

    $tpl = new TemplateProcessor($tempDocPath);
    $data = $this->buildTemplateData($pengajuan);

    Log::info("Template Data: " . json_encode($data));

    foreach ($data as $key => $val) {
        $tpl->setValue($key, is_array($val) ? implode(', ', $val) : $val);
    }

    // Simpan DOCX hasil generate
    $generateDir = storage_path('app/private/generate');
    if (!is_dir($generateDir)) mkdir($generateDir, 0755, true);

    $outDocName = 'surat_' . $pengajuan->id . '_' . time() . '.docx';
    $outDocFullPath = $generateDir . '/' . $outDocName;
    $tpl->saveAs($outDocFullPath);

    Log::info("Saved DOCX: {$outDocFullPath}");

    // Simpan PDF langsung dari DOCX
    $pdfName = 'surat_' . $pengajuan->id . '_' . time() . '.pdf';
    $pdfPath = $generateDir . '/' . $pdfName;

    $phpWord = \PhpOffice\PhpWord\IOFactory::load($outDocFullPath);
    $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
    $pdfWriter->save($pdfPath);

    return [
        'docx' => "generate/{$outDocName}",
        'pdf'  => "generate/{$pdfName}",
        'url'  => Storage::url("generate/{$pdfName}")
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
