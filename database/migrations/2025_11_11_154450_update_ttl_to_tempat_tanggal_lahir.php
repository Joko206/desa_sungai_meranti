<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update existing jenis_surat records to change TTL field name to Tempat_Tanggal_Lahir
        $jenisSuratRecords = \App\Models\JenisSurat::all();
        
        foreach ($jenisSuratRecords as $record) {
            $currentFields = $record->form_structure ?? [];
            $updatedFields = [];
            
            foreach ($currentFields as $field) {
                $name = $field['name'] ?? '';
                
                // Change TTL to Tempat_Tanggal_Lahir
                if ($name === 'TTL') {
                    $field['name'] = 'Tempat_Tanggal_Lahir';
                }
                
                $updatedFields[] = $field;
            }
            
            $record->update(['form_structure' => $updatedFields]);
        }
    }

    public function down(): void
    {
        // Revert changes if needed
        $jenisSuratRecords = \App\Models\JenisSurat::all();
        
        foreach ($jenisSuratRecords as $record) {
            $currentFields = $record->form_structure ?? [];
            $updatedFields = [];
            
            foreach ($currentFields as $field) {
                $name = $field['name'] ?? '';
                
                // Change back to TTL
                if ($name === 'Tempat_Tanggal_Lahir') {
                    $field['name'] = 'TTL';
                }
                
                $updatedFields[] = $field;
            }
            
            $record->update(['form_structure' => $updatedFields]);
        }
    }
};
