<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update existing jenis_surat records to convert existing fields to proper types
        $jenisSuratRecords = \App\Models\JenisSurat::all();
        
        foreach ($jenisSuratRecords as $record) {
            $currentFields = $record->form_structure ?? [];
            $updatedFields = [];
            
            foreach ($currentFields as $field) {
                $name = $field['name'] ?? '';
                $fieldNameLower = strtolower($name);
                
                // Skip the common fields we added (lowercase ones)
                if (in_array($name, ['agama', 'status_kawin', 'no_rt', 'no_rw', 'dusun', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin'])) {
                    continue;
                }
                
                // Convert existing fields to proper types
                switch ($fieldNameLower) {
                    case 'dusun':
                        $field['type'] = 'select';
                        $field['options'] = [
                            ['value' => 'Dusun Suka Maju', 'label' => 'Dusun Suka Maju'],
                            ['value' => 'Dusun Kulin Jaya', 'label' => 'Dusun Kulin Jaya'],
                            ['value' => 'Dusun Suka Sari', 'label' => 'Dusun Suka Sari']
                        ];
                        $field['placeholder'] = 'Pilih dusun';
                        break;
                        
                    case 'religion':
                    case 'agama':
                        $field['type'] = 'select';
                        $field['options'] = [
                            ['value' => 'Islam', 'label' => 'Islam'],
                            ['value' => 'Kristen Protestan', 'label' => 'Kristen Protestan'],
                            ['value' => 'Hindu', 'label' => 'Hindu'],
                            ['value' => 'Budha', 'label' => 'Budha'],
                            ['value' => 'Katolik', 'label' => 'Katolik']
                        ];
                        $field['placeholder'] = 'Pilih agama';
                        break;
                        
                    case 'status_kawin':
                        $field['type'] = 'select';
                        $field['options'] = [
                            ['value' => 'Belum Kawin', 'label' => 'Belum Kawin'],
                            ['value' => 'Kawin', 'label' => 'Kawin'],
                            ['value' => 'Janda/Duda', 'label' => 'Janda/Duda']
                        ];
                        $field['placeholder'] = 'Pilih status perkawinan';
                        break;
                        
                    case 'gender':
                    case 'jenis_kelamin':
                        $field['type'] = 'select';
                        $field['options'] = [
                            ['value' => 'Laki-Laki', 'label' => 'Laki-Laki'],
                            ['value' => 'Perempuan', 'label' => 'Perempuan']
                        ];
                        $field['placeholder'] = 'Pilih jenis kelamin';
                        break;
                        
                    case 'no_rt':
                    case 'rt':
                        $field['type'] = 'number';
                        $field['placeholder'] = '001';
                        $field['maxLength'] = 3;
                        $field['minLength'] = 3;
                        $field['min'] = '001';
                        $field['max'] = '999';
                        break;
                        
                    case 'no_rw':
                    case 'rw':
                        $field['type'] = 'number';
                        $field['placeholder'] = '001';
                        $field['maxLength'] = 3;
                        $field['minLength'] = 3;
                        $field['min'] = '001';
                        $field['max'] = '999';
                        break;
                        
                    case 'ttl':
                        // Convert TTL to separate fields
                        $tempatLahir = [
                            'name' => 'tempat_lahir',
                            'label' => 'Tempat Lahir',
                            'type' => 'text',
                            'placeholder' => 'Masukkan tempat lahir',
                            'required' => true
                        ];
                        $tanggalLahir = [
                            'name' => 'tanggal_lahir',
                            'label' => 'Tanggal Lahir',
                            'type' => 'date',
                            'placeholder' => 'Pilih tanggal lahir',
                            'required' => true
                        ];
                        $updatedFields[] = $tempatLahir;
                        $updatedFields[] = $tanggalLahir;
                        continue 2; // Skip adding the original TTL field
                }
                
                $updatedFields[] = $field;
            }
            
            $record->update(['form_structure' => $updatedFields]);
        }
    }

    public function down(): void
    {
        // This migration converts existing text fields to proper types
        // No rollback needed as we're improving existing functionality
    }
};