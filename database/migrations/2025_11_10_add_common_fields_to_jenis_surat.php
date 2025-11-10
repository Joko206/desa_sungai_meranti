<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update existing jenis_surat records to include common fields
        $commonFields = [
            // Religion field
            [
                'name' => 'agama',
                'type' => 'select',
                'label' => 'Agama',
                'required' => true,
                'options' => [
                    ['value' => 'Islam', 'label' => 'Islam'],
                    ['value' => 'Kristen Protestan', 'label' => 'Kristen Protestan'],
                    ['value' => 'Hindu', 'label' => 'Hindu'],
                    ['value' => 'Budha', 'label' => 'Budha'],
                    ['value' => 'Katolik', 'label' => 'Katolik']
                ],
                'placeholder' => 'Pilih agama'
            ],
            
            // Marital status
            [
                'name' => 'status_kawin',
                'type' => 'select',
                'label' => 'Status Perkawinan',
                'required' => true,
                'options' => [
                    ['value' => 'Belum Kawin', 'label' => 'Belum Kawin'],
                    ['value' => 'Kawin', 'label' => 'Kawin'],
                    ['value' => 'Janda/Duda', 'label' => 'Janda/Duda']
                ],
                'placeholder' => 'Pilih status perkawinan'
            ],
            
            // RT number (3 digits)
            [
                'name' => 'no_rt',
                'type' => 'number',
                'label' => 'Nomor RT',
                'required' => true,
                'placeholder' => '001',
                'pattern' => '[0-9]{3}',
                'maxLength' => 3,
                'minLength' => 3,
                'min' => 001,
                'max' => 999
            ],
            
            // RW number (3 digits)
            [
                'name' => 'no_rw',
                'type' => 'number',
                'label' => 'Nomor RW',
                'required' => true,
                'placeholder' => '001',
                'pattern' => '[0-9]{3}',
                'maxLength' => 3,
                'minLength' => 3,
                'min' => 001,
                'max' => 999
            ],
            
            // Village/Dusun
            [
                'name' => 'dusun',
                'type' => 'select',
                'label' => 'Dusun',
                'required' => true,
                'options' => [
                    ['value' => 'Dusun Suka Maju', 'label' => 'Dusun Suka Maju'],
                    ['value' => 'Dusun Kulin Jaya', 'label' => 'Dusun Kulin Jaya'],
                    ['value' => 'Dusun Suka Sari', 'label' => 'Dusun Suka Sari']
                ],
                'placeholder' => 'Pilih dusun'
            ],
            
            // Birth place
            [
                'name' => 'tempat_lahir',
                'type' => 'text',
                'label' => 'Tempat Lahir',
                'required' => true,
                'placeholder' => 'Masukkan tempat lahir'
            ],
            
            // Birth date with calendar
            [
                'name' => 'tanggal_lahir',
                'type' => 'date',
                'label' => 'Tanggal Lahir',
                'required' => true,
                'placeholder' => 'Pilih tanggal lahir'
            ],
            
            // Gender
            [
                'name' => 'jenis_kelamin',
                'type' => 'select',
                'label' => 'Jenis Kelamin',
                'required' => true,
                'options' => [
                    ['value' => 'Laki-Laki', 'label' => 'Laki-Laki'],
                    ['value' => 'Perempuan', 'label' => 'Perempuan']
                ],
                'placeholder' => 'Pilih jenis kelamin'
            ]
        ];
        
        // Get all jenis_surat records and update with common fields
        $jenisSuratRecords = \App\Models\JenisSurat::all();
        
        foreach ($jenisSuratRecords as $record) {
            $currentFields = $record->form_structure ?? [];
            
            // Only add common fields if they don't exist
            $existingFieldNames = collect($currentFields)->pluck('name')->toArray();
            $newFields = [];
            
            foreach ($commonFields as $commonField) {
                if (!in_array($commonField['name'], $existingFieldNames)) {
                    $newFields[] = $commonField;
                }
            }
            
            // Merge existing fields with new common fields
            $updatedFields = array_merge($currentFields, $newFields);
            $record->update(['form_structure' => $updatedFields]);
        }
    }

    public function down(): void
    {
        // This migration adds common fields to existing form structures
        // No rollback needed as we're not removing any existing functionality
    }
};