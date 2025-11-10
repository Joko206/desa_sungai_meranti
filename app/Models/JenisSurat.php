<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $table = 'jenis_surat';
    protected $fillable = [
        'nama_surat',
        'file_template',
        'form_structure',
        'deskripsi',
        'syarat',
        'is_active'
    ];
    
    protected $casts = [
        'form_structure' => 'array',
        'syarat' => 'array',
        'is_active' => 'boolean'
    ];

    // Scope untuk jenis surat yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Relasi ke pengajuan surat
    public function pengajuanSurat()
    {
        return $this->hasMany(\App\Models\PengajuanSurat::class, 'jenis_surat_id');
    }

    /**
     * Get predefined field configurations (without adding new fields)
     */
    public static function getFieldEnhancements()
    {
        return [
            // Gender fields
            'gender' => [
                'name' => 'Gender',
                'type' => 'select',
                'label' => 'Gender',
                'options' => [
                    ['value' => 'Laki-Laki', 'label' => 'Laki-Laki'],
                    ['value' => 'Perempuan', 'label' => 'Perempuan']
                ],
                'placeholder' => 'Pilih jenis kelamin'
            ],
            'jenis_kelamin' => [
                'name' => 'Jenis Kelamin',
                'type' => 'select',
                'label' => 'Jenis Kelamin',
                'options' => [
                    ['value' => 'Laki-Laki', 'label' => 'Laki-Laki'],
                    ['value' => 'Perempuan', 'label' => 'Perempuan']
                ],
                'placeholder' => 'Pilih jenis kelamin'
            ],

            // Marital status
            'status_kawin' => [
                'name' => 'Status Perkawinan',
                'type' => 'select',
                'label' => 'Status Perkawinan',
                'options' => [
                    ['value' => 'Belum Menikah', 'label' => 'Belum Menikah'],
                    ['value' => 'Menikah', 'label' => 'Menikah'],
                    ['value' => 'Cerai', 'label' => 'Cerai']
                ],
                'placeholder' => 'Pilih status perkawinan'
            ],
            'status_perkawinan' => [
                'name' => 'Status Perkawinan',
                'type' => 'select',
                'label' => 'Status Perkawinan',
                'options' => [
                    ['value' => 'Belum Menikah', 'label' => 'Belum Menikah'],
                    ['value' => 'Menikah', 'label' => 'Menikah'],
                    ['value' => 'Cerai', 'label' => 'Cerai']
                ],
                'placeholder' => 'Pilih status perkawinan'
            ],

            // Date fields
            'tempat_tanggal_lahir' => [
                'name' => 'TTL',
                'type' => 'ttl_combined',
                'label' => 'Tempat Tanggal Lahir',
                'subfields' => [
                    'tempat_lahir' => [
                        'name' => 'Tempat Lahir',
                        'type' => 'text',
                        'label' => 'Tempat Lahir',
                        'placeholder' => 'Masukkan tempat lahir'
                    ],
                    'tanggal_lahir' => [
                        'name' => 'Tanggal Lahir',
                        'type' => 'date',
                        'label' => 'Tanggal Lahir',
                        'placeholder' => 'Pilih tanggal lahir'
                    ]
                ]
            ],
            'ttl' => [
                'name' => 'TTL',
                'type' => 'ttl_combined',
                'label' => 'Tempat Tanggal Lahir',
                'subfields' => [
                    'tempat_lahir' => [
                        'name' => 'Tempat Lahir',
                        'type' => 'text',
                        'label' => 'Tempat Lahir',
                        'placeholder' => 'Masukkan tempat lahir'
                    ],
                    'tanggal_lahir' => [
                        'name' => 'Tanggal Lahir',
                        'type' => 'date',
                        'label' => 'Tanggal Lahir',
                        'placeholder' => 'Pilih tanggal lahir'
                    ]
                ]
            ],
            'tanggal_lahir' => [
                'name' => 'Tanggal Lahir',
                'type' => 'date',
                'label' => 'Tanggal Lahir',
                'placeholder' => 'Pilih tanggal lahir'
            ],
            'tanggal_surat' => [
                'name' => 'Tanggal Surat',
                'type' => 'date',
                'label' => 'Tanggal Surat',
                'placeholder' => 'Pilih tanggal surat'
            ],

            // Religion
            'agama' => [
                'name' => 'Agama',
                'type' => 'select',
                'label' => 'Agama',
                'options' => [
                    ['value' => 'Islam', 'label' => 'Islam'],
                    ['value' => 'Kristen', 'label' => 'Kristen'],
                    ['value' => 'Katolik', 'label' => 'Katolik'],
                    ['value' => 'Hindu', 'label' => 'Hindu'],
                    ['value' => 'Budha', 'label' => 'Budha']
                ],
                'placeholder' => 'Pilih agama'
            ],
            'religion' => [
                'name' => 'Agama',
                'type' => 'select',
                'label' => 'Agama',
                'options' => [
                    ['value' => 'Islam', 'label' => 'Islam'],
                    ['value' => 'Kristen', 'label' => 'Kristen'],
                    ['value' => 'Katolik', 'label' => 'Katolik'],
                    ['value' => 'Hindu', 'label' => 'Hindu'],
                    ['value' => 'Budha', 'label' => 'Budha']
                ],
                'placeholder' => 'Pilih agama'
            ],

            // Address-related
            'alamat' => [
                'name' => 'Alamat',
                'type' => 'textarea',
                'label' => 'Alamat',
                'placeholder' => 'Masukkan alamat lengkap',
                'rows' => 3
            ],
            'kecamatan' => [
                'name' => 'Kecamatan',
                'type' => 'text',
                'label' => 'Kecamatan',
                'placeholder' => 'Masukkan kecamatan'
            ],
            'kelurahan' => [
                'name' => 'Kelurahan',
                'type' => 'text',
                'label' => 'Kelurahan',
                'placeholder' => 'Masukkan kelurahan'
            ],
            'kode_pos' => [
                'name' => 'Kode Pos',
                'type' => 'number',
                'label' => 'Kode Pos',
                'placeholder' => 'Masukkan kode pos',
                'maxLength' => 5,
                'minLength' => 5
            ],

            // Citizenship
            'kewarganegaraan' => [
                'name' => 'Kewarganegaraan',
                'type' => 'select',
                'label' => 'Kewarganegaraan',
                'options' => [
                    ['value' => 'WNI', 'label' => 'WNI'],
                    ['value' => 'WNA', 'label' => 'WNA']
                ],
                'placeholder' => 'Pilih kewarganegaraan'
            ],

            // Work/Job fields
            'pekerjaan' => [
                'name' => 'Pekerjaan',
                'type' => 'select',
                'label' => 'Pekerjaan',
                'options' => [
                    ['value' => 'Petani', 'label' => 'Petani'],
                    ['value' => 'Pedagang', 'label' => 'Pedagang'],
                    ['value' => 'PNS', 'label' => 'PNS'],
                    ['value' => 'Karyawan Swasta', 'label' => 'Karyawan Swasta'],
                    ['value' => 'Wiraswasta', 'label' => 'Wiraswasta'],
                    ['value' => 'Guru', 'label' => 'Guru'],
                    ['value' => 'Dokter', 'label' => 'Dokter'],
                    ['value' => 'Lainnya', 'label' => 'Lainnya']
                ],
                'placeholder' => 'Pilih pekerjaan'
            ],
            'jabatan' => [
                'name' => 'Jabatan',
                'type' => 'text',
                'label' => 'Jabatan',
                'placeholder' => 'Masukkan jabatan'
            ],
            'instansi' => [
                'name' => 'Instansi',
                'type' => 'text',
                'label' => 'Instansi',
                'placeholder' => 'Masukkan nama instansi'
            ],

            // Location fields
            'dusun' => [
                'name' => 'Dusun',
                'type' => 'select',
                'label' => 'Dusun',
                'options' => [
                    ['value' => 'Dusun Suka Maju', 'label' => 'Dusun Suka Maju'],
                    ['value' => 'Dusun Kulin Jaya', 'label' => 'Dusun Kulin Jaya'],
                    ['value' => 'Dusun Suka Sari', 'label' => 'Dusun Suka Sari']
                ],
                'placeholder' => 'Pilih dusun'
            ],
            'tempat_lahir' => [
                'name' => 'Tempat Lahir',
                'type' => 'text',
                'label' => 'Tempat Lahir',
                'placeholder' => 'Masukkan tempat lahir'
            ],

            // RT/RW numbers
            'no_rt' => [
                'name' => 'No RT',
                'type' => 'number',
                'label' => 'No RT',
                'placeholder' => '001',
                'maxLength' => 3,
                'minLength' => 3
            ],
            'rt' => [
                'name' => 'RT',
                'type' => 'number',
                'label' => 'RT',
                'placeholder' => '001',
                'maxLength' => 3,
                'minLength' => 3
            ],
            'no_rw' => [
                'name' => 'No RW',
                'type' => 'number',
                'label' => 'No RW',
                'placeholder' => '001',
                'maxLength' => 3,
                'minLength' => 3
            ],
            'rw' => [
                'name' => 'RW',
                'type' => 'number',
                'label' => 'RW',
                'placeholder' => '001',
                'maxLength' => 3,
                'minLength' => 3
            ],

            // Document numbers
            'nomor_ktp' => [
                'name' => 'Nomor KTP',
                'type' => 'text',
                'label' => 'Nomor KTP',
                'placeholder' => 'Masukkan nomor KTP',
                'maxLength' => 16,
                'minLength' => 16
            ],
            'nik' => [
                'name' => 'NIK',
                'type' => 'text',
                'label' => 'NIK',
                'placeholder' => 'Masukkan NIK',
                'maxLength' => 16,
                'minLength' => 16
            ],
            'nomor_surat' => [
                'name' => 'Nomor Surat',
                'type' => 'text',
                'label' => 'Nomor Surat',
                'placeholder' => 'Masukkan nomor surat'
            ],

            // Text areas
            'keterangan' => [
                'name' => 'Keterangan',
                'type' => 'textarea',
                'label' => 'Keterangan',
                'placeholder' => 'Masukkan keterangan',
                'rows' => 4
            ],

            // Parent-related fields
            'pekerjaan_orang_tua' => [
                'name' => 'Pekerjaan Orang Tua',
                'type' => 'select',
                'label' => 'Pekerjaan Orang Tua',
                'options' => [
                    ['value' => 'Petani', 'label' => 'Petani'],
                    ['value' => 'Pedagang', 'label' => 'Pedagang'],
                    ['value' => 'PNS', 'label' => 'PNS'],
                    ['value' => 'Karyawan Swasta', 'label' => 'Karyawan Swasta'],
                    ['value' => 'Wiraswasta', 'label' => 'Wiraswasta'],
                    ['value' => 'Guru', 'label' => 'Guru'],
                    ['value' => 'Dokter', 'label' => 'Dokter'],
                    ['value' => 'Lainnya', 'label' => 'Lainnya']
                ],
                'placeholder' => 'Pilih pekerjaan orang tua'
            ],
            'penghasilan_orang_tua' => [
                'name' => 'Penghasilan Orang Tua',
                'type' => 'text',
                'label' => 'Penghasilan Orang Tua',
                'placeholder' => 'Masukkan penghasilan orang tua'
            ],

            // Ownership status
            'status_tempat_tinggal' => [
                'name' => 'Status Tempat Tinggal',
                'type' => 'select',
                'label' => 'Status Tempat Tinggal',
                'options' => [
                    ['value' => 'Milik Pribadi', 'label' => 'Milik Pribadi'],
                    ['value' => 'Sewa', 'label' => 'Sewa'],
                    ['value' => 'Kontrak', 'label' => 'Kontrak'],
                    ['value' => 'Numpang', 'label' => 'Numpang']
                ],
                'placeholder' => 'Pilih status tempat tinggal'
            ],
            'status_kepemilikan_tanah' => [
                'name' => 'Status Kepemilikan Tanah',
                'type' => 'select',
                'label' => 'Status Kepemilikan Tanah',
                'options' => [
                    ['value' => 'Milik Sendiri', 'label' => 'Milik Sendiri'],
                    ['value' => 'Sewa', 'label' => 'Sewa'],
                    ['value' => 'Kontrak', 'label' => 'Kontrak']
                ],
                'placeholder' => 'Pilih status kepemilikan tanah'
            ]
        ];
    }

    /**
     * Check if a field exists (case-insensitive)
     */
    public static function fieldExists($fields, $fieldName)
    {
        $fieldNameLower = strtolower($fieldName);
        foreach ($fields as $field) {
            if (strtolower($field['name'] ?? '') === $fieldNameLower) {
                return true;
            }
        }
        return false;
    }

    /**
     * Find existing field by name (case-insensitive)
     */
    public static function findFieldByName($fields, $fieldName)
    {
        $fieldNameLower = strtolower($fieldName);
        foreach ($fields as $field) {
            if (strtolower($field['name'] ?? '') === $fieldNameLower) {
                return $field;
            }
        }
        return null;
    }

    /**
     * Enhance only existing fields without adding new ones
     */
    public static function enhanceExistingFields($currentFields)
    {
        $fieldEnhancements = self::getFieldEnhancements();
        $enhancedFields = [];
        $processedFieldNames = []; // Track processed field names to avoid duplicates
        
        foreach ($currentFields as $field) {
            $fieldName = $field['name'] ?? '';
            $fieldNameLower = strtolower($fieldName);
            
            // Skip if already processed
            if (in_array($fieldNameLower, $processedFieldNames)) {
                continue;
            }
            
            $processedFieldNames[] = $fieldNameLower;
            
            // Check if this field has a predefined enhancement
            $enhancement = null;
            if (isset($fieldEnhancements[$fieldNameLower])) {
                $enhancement = $fieldEnhancements[$fieldNameLower];
            }
            
            if ($enhancement) {
                // Apply enhancement but preserve original name
                $enhancedField = array_merge($field, [
                    'type' => $enhancement['type'],
                    'label' => $enhancement['label']
                ]);
                
                // Add placeholder if it exists
                if (isset($enhancement['placeholder'])) {
                    $enhancedField['placeholder'] = $enhancement['placeholder'];
                }
                
                // Add options if it's a select field
                if (isset($enhancement['options'])) {
                    $enhancedField['options'] = $enhancement['options'];
                }
                
                // Add rows for textarea
                if (isset($enhancement['rows'])) {
                    $enhancedField['rows'] = $enhancement['rows'];
                }
                
                // Add subfields for ttl_combined type
                if (isset($enhancement['subfields'])) {
                    $enhancedField['subfields'] = $enhancement['subfields'];
                }
                
                $enhancedFields[] = $enhancedField;
            } else {
                // Keep field as-is
                $enhancedFields[] = $field;
            }
        }
        
        return $enhancedFields;
    }

    /**
     * Clean up and enhance existing fields only (no new fields added)
     */
    public static function enhanceExistingFieldsOnly()
    {
        $jenisSuratRecords = self::all();
        
        foreach ($jenisSuratRecords as $record) {
            $currentFields = $record->form_structure ?? [];
            
            // Only enhance existing fields, don't add new ones
            $enhancedFields = self::enhanceExistingFields($currentFields);
            
            // Only update if there are changes
            if ($enhancedFields !== $currentFields) {
                $record->update(['form_structure' => $enhancedFields]);
            }
        }
    }

    // Event listeners for automatic field enhancement (only existing fields)
    protected static function boot()
    {
        parent::boot();
        
        // When creating new jenis_surat, only enhance existing fields
        static::creating(function ($jenisSurat) {
            $currentFields = $jenisSurat->form_structure ?? [];
            
            // Only enhance existing fields, don't add new ones
            $enhancedFields = self::enhanceExistingFields($currentFields);
            
            $jenisSurat->form_structure = $enhancedFields;
        });
        
        // When updating jenis_surat, only enhance existing fields
        static::updating(function ($jenisSurat) {
            if ($jenisSurat->isDirty('form_structure')) {
                $currentFields = $jenisSurat->form_structure ?? [];
                
                // Only enhance existing fields, don't add new ones
                $enhancedFields = self::enhanceExistingFields($currentFields);
                
                $jenisSurat->form_structure = $enhancedFields;
            }
        });
    }
}
