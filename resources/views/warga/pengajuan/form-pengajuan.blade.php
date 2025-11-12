@extends('layout.app')

@section('title', 'Ajukan Surat - Desa Sungai Meranti')

@section('content')
    <style>
        /* Optimized CSS for Performance */
        :root {
            --primary-color: #10b981;
            --primary-hover: #059669;
            --border-color: #e5e7eb;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --bg-gray: #f9fafb;
            --transition-fast: 150ms ease;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .pt-20 {
            padding-top: 5rem;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .responsive-grid {
            display: grid;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .responsive-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .optimized-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            transition: all var(--transition-fast);
            font-size: 0.875rem;
            background: white;
        }

        .optimized-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            transition: all var(--transition-fast);
            font-size: 0.875rem;
            background: white;
            cursor: pointer;
        }

        .optimized-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .optimized-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Number input specific styling */
        .optimized-input[type="number"] {
            text-align: center;
            font-weight: 600;
        }

        .optimized-input[type="number"]::-webkit-outer-spin-button,
        .optimized-input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .optimized-input[type="number"] {
            -moz-appearance: textfield;
        }

        /* Date input styling */
        .optimized-input[type="date"] {
            position: relative;
            color-scheme: light;
        }

        .optimized-input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            opacity: 0.6;
            transition: opacity 0.2s;
        }

        .optimized-input[type="date"]::-webkit-calendar-picker-indicator:hover {
            opacity: 1;
        }

        /* Field validation states */
        .field-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }

        .field-success {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        }

        /* Help text styling */
        .field-help {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }

        .field-help-error {
            color: #ef4444;
        }

        .optimized-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all var(--transition-fast);
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: white;
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: var(--bg-gray);
        }

        .card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all var(--transition-fast);
        }

        .card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .section-content {
            padding: 1.5rem;
        }

        .upload-field {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all var(--transition-fast);
        }

        .upload-field:hover {
            border-color: var(--primary-color);
        }

        .requirement-badge {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-up {
            animation: slideUp 0.2s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="min-h-screen pt-20" style="background: var(--bg-gray);">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">
                <!-- Optimized Navigation -->
                <nav class="mb-8 fade-in" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-green-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                Beranda
                            </a></li>
                        <li><svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg></li>
                        <li><a href="{{ route('administrasi') }}"
                                class="text-gray-600 hover:text-green-600">Administrasi</a></li>
                        <li><svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg></li>
                        <li class="text-gray-500">Ajukan Surat</li>
                    </ol>
                </nav>

                <!-- Optimized Page Header -->
                <div class="card mb-8 slide-up">
                    <div class="px-6 py-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">Ajukan Surat</h1>
                                <p class="text-gray-600">Lengkapi formulir untuk mengajukan surat administratif</p>
                            </div>
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Optimized Form -->
                <form method="POST" action="{{ route('pengajuan.create.post') }}" enctype="multipart/form-data"
                    class="space-y-6" id="pengajuanForm">
                    @csrf
                    <input type="hidden" name="keterangan" id="keteranganField" value="">
                    <input type="hidden" name="form_structure_definition" id="formStructureDefinitionField" value="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Optimized Letter Type Selection -->
                    <div class="card slide-up">
                        <div class="section-header">
                            <h2 class="text-lg font-semibold text-gray-900">1. Pilih Jenis Surat</h2>
                        </div>
                        <div class="section-content">
                            <div>
                                <label for="jenis_surat_id" class="block text-sm font-medium text-gray-700 mb-2">Jenis
                                    Surat</label>
                                <select id="jenis_surat_id" name="jenis_surat_id" required class="optimized-input"
                                    style="height: 3rem;">
                                    <option value="">Pilih jenis surat...</option>
                                    @foreach ($jenisSuratList as $jenis)
                                        <option value="{{ $jenis->id }}"
                                            {{ (string) $selectedJenisId === (string) $jenis->id ? 'selected' : '' }}>
                                            {{ $jenis->nama_surat }}
                                            @if($jenis->butuh_tanda_tangan_pihak_lain)
                                                (Perlu Tanda Tangan Pihak Lain)
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_surat_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Optimized Dynamic Applicant Information -->
                    <div class="card slide-up">
                        <div class="section-header">
                            <h2 class="text-lg font-semibold text-gray-900">2. Data Pemohon</h2>
                            <p class="text-sm text-gray-600 mt-1">Form akan menyesuaikan berdasarkan jenis surat yang
                                dipilih</p>
                        </div>
                        <div class="section-content">
                            <div id="dynamicFields" class="space-y-4">
                                <!-- Optimized initial state with form preview -->
                                <div id="initialState" class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center">
                                    <div
                                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Form Data Pemohon</h3>
                                    <p class="text-gray-600 mb-4">Pilih jenis surat di atas untuk menampilkan form pengajuan
                                        yang sesuai</p>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 text-sm">
                                        <div class="bg-white p-3 rounded border">
                                            <div class="font-medium text-gray-700">Form Dinamis</div>
                                            <div class="text-xs text-gray-500">Menyesuaikan jenis surat</div>
                                        </div>
                                        <div class="bg-white p-3 rounded border">
                                            <div class="font-medium text-gray-700">Auto Fill</div>
                                            <div class="text-xs text-gray-500">Data otomatis terisi</div>
                                        </div>
                                        <div class="bg-white p-3 rounded border">
                                            <div class="font-medium text-gray-700">Validasi</div>
                                            <div class="text-xs text-gray-500">Real-time validation</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Optimized Dynamic File Uploads -->
                    <div class="card slide-up">
                        <div class="section-header">
                            <h2 class="text-lg font-semibold text-gray-900">3. Upload Dokumen Persyaratan</h2>
                            <p class="text-sm text-gray-600 mt-1">Dukungan: PDF, JPG, PNG (Max 2MB per file)</p>
                        </div>
                        <div class="section-content">
                            <div id="dynamicUploads">
                                <!-- Optimized initial state -->
                                <div id="uploadsInitialState" class="text-center py-8">
                                    <div class="loading-skeleton rounded-full w-16 h-16 mx-auto mb-4"></div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Siap Upload</h3>
                                    <p class="text-gray-500">Persyaratan akan muncul otomatis</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Optimized Terms and Conditions -->
                    <div class="card slide-up">
                        <div class="section-header">
                            <h2 class="text-lg font-semibold text-gray-900">4. Konfirmasi</h2>
                        </div>
                        <div class="section-content">
                            <div class="flex items-start space-x-3">
                                <div class="flex items-center h-5 pt-1">
                                    <input id="agree_terms" name="agree_terms" type="checkbox" required
                                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                </div>
                                <div class="text-sm">
                                    <label for="agree_terms" class="font-medium text-gray-700 cursor-pointer">
                                        Saya menyetujui syarat dan ketentuan pengajuan surat
                                    </label>
                                    <p class="text-gray-500 mt-1">Semua data yang diisi adalah benar dan dokumen yang
                                        diunggah adalah asli</p>
                                </div>
                            </div>
                            @error('agree_terms')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Optimized Submit Button -->
                    <div class="flex justify-end space-x-4 fade-in">
                        <a href="{{ route('administrasi') }}" class="optimized-btn btn-secondary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </a>
                        <button type="submit" id="submitBtn" class="optimized-btn btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            <span id="submitBtnText">Ajukan Surat</span>
                            <div id="submitSpinner"
                                class="hidden ml-2 w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin">
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Optimized JavaScript for Maximum Performance
        (() => {
            'use strict';

            // Performance optimized selectors
            const $ = (sel) => document.querySelector(sel);

            // Cache DOM elements
            const elements = {
                form: $('#pengajuanForm'),
                submitBtn: $('#submitBtn'),
                submitBtnText: $('#submitBtnText'),
                submitSpinner: $('#submitSpinner'),
                jenisSuratSelect: $('#jenis_surat_id'),
                dynamicFields: $('#dynamicFields'),
                dynamicUploads: $('#dynamicUploads'),
                formStructureDefinitionField: $('#formStructureDefinitionField')
            };

            // Optimized field creation with proper form handling
            const createField = (field) => {
                const wrapper = document.createElement('div');
                const key = field.key || field.name || `field_${Date.now()}`;
                const label = field.label || field.name || key;

                // Create proper field structure
                const fieldDiv = document.createElement('div');
                fieldDiv.className = 'space-y-2';

                // Create label
                const labelEl = document.createElement('label');
                labelEl.setAttribute('for', key);
                labelEl.className = 'block text-sm font-medium text-gray-700';
                labelEl.textContent = label;

                // Create input based on type
                let input;
                
                switch (field.type) {
                    case 'checkbox':
                    input = document.createElement('div');
                    input.className = 'grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3';

                    // Pastikan selalu ada options, kalau kosong pakai field name sebagai default
                    const options = field.options && field.options.length ? field.options : [field.name];

                    options.forEach(option => {
                        const optionDiv = document.createElement('div');
                        optionDiv.className = 'flex items-center';

                        // Cek apakah option adalah objek dengan value/label atau string biasa
                        const value = option.value || option;
                        const label = option.label || option;

                        // Jika hanya satu option, name tidak perlu array "[]"
                        const nameAttr = options.length === 1 ? `data_pemohon[${key}]` : `data_pemohon[${key}][]`;

                        optionDiv.innerHTML = `
                            <input type="checkbox"
                                id="${key}_${value}"
                                name="${nameAttr}"
                                value="${value}"
                                class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        `;

                        input.appendChild(optionDiv);
                    });

                    fieldDiv.appendChild(labelEl);
                    fieldDiv.appendChild(input);
                    return fieldDiv;


                    case 'ttl_combined':
                        // Create TTL combined field with two sub-fields
                        const ttlWrapper = document.createElement('div');
                        ttlWrapper.className = 'responsive-grid gap-4';
                        
                        // Tempat Lahir field
                        const tempatLahirDiv = document.createElement('div');
                        const tempatLahirLabel = document.createElement('label');
                        tempatLahirLabel.className = 'block text-sm font-medium text-gray-700';
                        tempatLahirLabel.textContent = 'Tempat Lahir';
                        tempatLahirLabel.setAttribute('for', `${key}_tempat_lahir`);
                        
                        const tempatLahirInput = document.createElement('input');
                        tempatLahirInput.type = 'text';
                        tempatLahirInput.id = `${key}_tempat_lahir`;
                        tempatLahirInput.name = `data_pemohon[tempat_lahir]`;
                        tempatLahirInput.className = 'optimized-input';
                        tempatLahirInput.placeholder = 'Masukkan tempat lahir';
                        tempatLahirInput.required = true;
                        
                        tempatLahirDiv.appendChild(tempatLahirLabel);
                        tempatLahirDiv.appendChild(tempatLahirInput);
                        
                        // Tanggal Lahir field
                        const tanggalLahirDiv = document.createElement('div');
                        const tanggalLahirLabel = document.createElement('label');
                        tanggalLahirLabel.className = 'block text-sm font-medium text-gray-700';
                        tanggalLahirLabel.textContent = 'Tanggal Lahir';
                        tanggalLahirLabel.setAttribute('for', `${key}_tanggal_lahir`);
                        
                        const tanggalLahirInput = document.createElement('input');
                        tanggalLahirInput.type = 'date';
                        tanggalLahirInput.id = `${key}_tanggal_lahir`;
                        tanggalLahirInput.name = `data_pemohon[tanggal_lahir]`;
                        tanggalLahirInput.className = 'optimized-input';
                        tanggalLahirInput.required = true;
                        
                        // Add date validation for birth date
                        const today = new Date();
                        const maxDate = new Date(today.getFullYear() - 17, today.getMonth(), today.getDate()); // Minimum 17 years old
                        tanggalLahirInput.setAttribute('max', maxDate.toISOString().split('T')[0]);
                        tanggalLahirInput.setAttribute('min', '1950-01-01');
                        
                        tanggalLahirDiv.appendChild(tanggalLahirLabel);
                        tanggalLahirDiv.appendChild(tanggalLahirInput);
                        
                        // Add help text
                        const helpText = document.createElement('p');
                        helpText.className = 'field-help col-span-2';
                        helpText.textContent = 'Data akan disimpan dalam format: Tempat, Tanggal (contoh: Bandung, 20 Februari 2005)';
                        
                        ttlWrapper.appendChild(tempatLahirDiv);
                        ttlWrapper.appendChild(tanggalLahirDiv);
                        ttlWrapper.appendChild(helpText);
                        
                        fieldDiv.appendChild(ttlWrapper);
                        return fieldDiv;
                        
                    case 'date':
                        input = document.createElement('input');
                        input.type = 'date';
                        input.className = 'optimized-input';
                        input.placeholder = field.placeholder || `Masukkan ${label}`;
                        // Add date validation attributes
                        if (field.name === 'tanggal_lahir') {
                            const today = new Date();
                            const maxDate = new Date(today.getFullYear() - 17, today.getMonth(), today.getDate()); // Minimum 17 years old
                            input.setAttribute('max', maxDate.toISOString().split('T')[0]);
                            input.setAttribute('min', '1950-01-01');
                        }
                        break;
                    case 'number':
                        input = document.createElement('input');
                        input.type = 'number';
                        input.className = 'optimized-input';
                        input.step = 'any';
                        input.placeholder = field.placeholder || `Masukkan ${label}`;
                        
                        // Add constraints for RT/RW fields
                        if (key.toLowerCase().includes('rt') || key.toLowerCase().includes('rw')) {
                            // Allow any number of digits but validate range
                            input.min = '1';
                            input.max = '999';
                            input.placeholder = 'contoh: 1, 2, 3, 10, 25, 007';
                            input.addEventListener('input', function() {
                                // Auto-format to 3 digits with leading zeros
                                let value = this.value.replace(/[^0-9]/g, '');
                                if (value.length > 0) {
                                    value = value.slice(0, 3); // Max 3 digits
                                    if (value > 0 && value <= 999) {
                                        // Store formatted value for display
                                        this.dataset.formattedValue = value.padStart(3, '0');
                                        // Keep original user input for validation
                                        this.dataset.originalValue = value;
                                    }
                                }
                            });
                            
                            // Add help text
                            const helpText = document.createElement('p');
                            helpText.className = 'field-help';
                            helpText.textContent = 'Masukkan 1-3 digit (1-999), akan disimpan dengan 3 digit (contoh: 1→001)';
                            fieldDiv.appendChild(helpText);
                        }
                        
                        // NIK validation
                        if (key.toLowerCase().includes('nik')) {
                            input.pattern = '[0-9]{16}';
                            input.maxLength = 16;
                            input.minLength = 16;
                            input.placeholder = 'Masukkan 16 digit NIK';
                            
                            // Add help text
                            const helpText = document.createElement('p');
                            helpText.className = 'field-help';
                            helpText.textContent = 'NIK harus 16 digit';
                            fieldDiv.appendChild(helpText);
                        }
                        break;
                    case 'email':
                        input = document.createElement('input');
                        input.type = 'email';
                        input.className = 'optimized-input';
                        input.pattern = '[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,}$';
                        input.placeholder = field.placeholder || `Masukkan ${label}`;
                        break;
                    case 'tel':
                        input = document.createElement('input');
                        input.type = 'tel';
                        input.className = 'optimized-input';
                        input.placeholder = field.placeholder || `Masukkan ${label}`;
                        break;
                    case 'textarea':
                        input = document.createElement('textarea');
                        input.className = 'optimized-input';
                        input.rows = '3';
                        input.placeholder = field.placeholder || `Masukkan ${label}`;
                        break;
                    case 'select':
                        input = document.createElement('select');
                        input.className = 'optimized-select';
                        input.placeholder = field.placeholder || `Pilih ${label}...`;
                        
                        // Add default option
                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = field.placeholder || `Pilih ${label}...`;
                        input.appendChild(defaultOption);
                        
                        // Add options for select fields
                        if (field.options && Array.isArray(field.options)) {
                            field.options.forEach(option => {
                                const optionEl = document.createElement('option');
                                optionEl.value = option.value;
                                optionEl.textContent = option.label;
                                input.appendChild(optionEl);
                            });
                        }
                        
                        // Add validation for select fields
                        input.addEventListener('change', function() {
                            if (this.value) {
                                this.classList.add('field-success');
                            } else {
                                this.classList.remove('field-success');
                            }
                        });
                        break;
                    default:
                        input = document.createElement('input');
                        input.type = 'text';
                        input.className = 'optimized-input';
                        input.placeholder = field.placeholder || `Masukkan ${label}`;
                        break;
                }

                // Set common properties
                input.id = key;
                input.name = `data_pemohon[${key}]`;
                input.className = 'optimized-input';
                input.required = true;

                // Add helper text for specific fields
                let helpText = null;
                if (key.toLowerCase().includes('nik')) {
                    helpText = document.createElement('p');
                    helpText.className = 'mt-1 text-xs text-gray-500';
                    helpText.textContent = 'NIK harus 16 digit';
                }

                // Build field
                fieldDiv.appendChild(labelEl);
                fieldDiv.appendChild(input);
                if (helpText) fieldDiv.appendChild(helpText);

                return fieldDiv;
            };
 
            const setFormStructureDefinition = (definition) => {
                if (!elements.formStructureDefinitionField) {
                    return;
                }
 
                try {
                    const normalized = Array.isArray(definition) ? definition : [];
                    elements.formStructureDefinitionField.value = JSON.stringify(normalized);
                } catch {
                    elements.formStructureDefinitionField.value = '[]';
                }
            };
 
            setFormStructureDefinition([]);
 
            // Optimized API calls with error handling and caching
            const apiCall = (url, options = {}) => {
                return fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    ...options
                }).then(response => {
                    if (!response.ok) throw new Error(`HTTP ${response.status}`);
                    return response.json();
                });
            };

            // Optimized loading states
            const showLoading = (container, message = 'Memuat...') => {
                container.innerHTML = `
            <div class="text-center py-8">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">Memuat Form</h3>
                    <p class="text-blue-700">${message}</p>
                </div>
            </div>
        `;
            };

            // Optimized dynamic fields loading
            const loadDynamicFields = async (jenisSuratId) => {
                const container = elements.dynamicFields;
                if (!jenisSuratId) {
                    setFormStructureDefinition([]);
                    return showInitialState(container);
                }

                showLoading(container, 'Sedang menyiapkan form pengajuan...');

                try {
                    const response = await apiCall(`/api/pengajuan/form-structure/${jenisSuratId}`);

                    const fields = response?.data?.form_structure || [];
                    container.innerHTML = '';

                    if (fields.length === 0) {
                        // Show message for no specific fields but still add common fields
                        const noFieldsMsg = document.createElement('div');
                        noFieldsMsg.className =
                            'bg-gray-50 border border-gray-200 rounded-lg p-6 text-center mb-6';
                        noFieldsMsg.innerHTML = `
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Form Data Dasar</h3>
                    <p class="text-gray-600">Jenis surat ini menggunakan data yang sudah ada. Silakan isi keterangan di bawah.</p>
                `;
                        setFormStructureDefinition([]);
                        container.appendChild(noFieldsMsg);
                    } else {
                        const formHeader = document.createElement('div');
                        formHeader.className = 'bg-green-50 border border-green-200 rounded-lg p-4 mb-6';
                        formHeader.innerHTML = `
                    <h3 class="text-lg font-semibold text-green-800 mb-2">Data Pemohon</h3>
                    <p class="text-green-700 text-sm">Silakan lengkapi data berikut untuk jenis surat yang dipilih</p>
                `;
                        container.appendChild(formHeader);

                        // Create fields
                        const fieldsContainer = document.createElement('div');
                        fieldsContainer.className = 'responsive-grid';
                        setFormStructureDefinition(fields);

                        // Regular array of fields
                        fields.forEach((field) => {
                            const fieldElement = createField(field);
                            fieldsContainer.appendChild(fieldElement);
                        });
                        container.appendChild(fieldsContainer);
                    }

                    addCommonFields(container);

                    // Auto-fill user data
                    setTimeout(autoFillUserData, 100);

                } catch (error) {
                    setFormStructureDefinition([]);
                    container.innerHTML = `
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <p class="text-red-800">Error memuat form: ${error.message}</p>
                    <button onclick="window.loadDynamicFields('${jenisSuratId}')"
                            class="mt-2 text-red-600 underline hover:text-red-800">Coba lagi</button>
                </div>
            `;
                }
            };

            // Optimized upload requirements loading
            const loadUploadRequirements = async (jenisSuratId) => {
                const container = elements.dynamicUploads;
                if (!jenisSuratId) return showInitialState(container);

                showLoading(container, 'Memuat persyaratan dokumen...');

                try {
                    const response = await apiCall(`/api/pengajuan/form-structure/${jenisSuratId}`);
                    const syaratList = response?.data?.syarat || [];

                    container.innerHTML = '';

                    if (syaratList.length === 0) {
                        container.innerHTML = `
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Persyaratan Khusus</h3>
                        <p class="text-gray-600">Anda dapat langsung mengajukan surat</p>
                    </div>
                `;
                    } else {
                        const header = document.createElement('div');
                        header.className = 'bg-green-50 border border-green-200 rounded-lg p-4 mb-6';
                        header.innerHTML = `
                    <h3 class="text-lg font-semibold text-green-800 mb-2">Persyaratan Dokumen</h3>
                    <p class="text-green-700 text-sm">${syaratList.length} dokumen diperlukan</p>
                `;
                        container.appendChild(header);

                        syaratList.forEach((syarat, index) => {
                            container.appendChild(createUploadField(syarat, index + 1));
                        });
                    }

                    // Add additional documents section
                    addAdditionalDocuments(container);
 
                } catch (error) {
                    container.innerHTML = `
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <p class="text-red-800">Error memuat persyaratan: ${error.message}</p>
                    <button onclick="window.loadUploadRequirements('${jenisSuratId}')"
                            class="mt-2 text-red-600 underline hover:text-red-800">Coba lagi</button>
                </div>
            `;
                }
            };

            // Optimized upload field creation
            const createUploadField = (syarat, index) => {
            const wrapper = document.createElement('div');
            // Ambil label dari JSON
            const cleanSyarat = typeof syarat === 'string' ? syarat : (syarat.nama || syarat.name || `Dokumen ${index}`);
            const safeLabel = cleanSyarat.replace(/\s+/g, '_'); // sama seperti di backend
            const fieldId = `upload_${index}`;

            wrapper.className = 'upload-field fade-in';
            wrapper.innerHTML = `
                <div class="flex items-start gap-4">
                    <div class="requirement-badge">${index}</div>
                    <div class="flex-1">
                        <label for="${fieldId}" class="block text-sm font-medium text-gray-700 mb-2">${cleanSyarat}</label>
                        <input type="file" id="${fieldId}" name="file_syarat[${safeLabel}]" accept=".pdf,.jpg,.jpeg,.png,.docx"
                            class="optimized-input">
                        <p class="mt-1 text-xs text-gray-500">Format: PDF, JPG, PNG, DOCX (Max 2MB)</p>
                    </div>
                </div>
            `;
            return wrapper;
        };

            // Helper functions
            const showInitialState = (container) => {
                container.innerHTML = `
            <div class="text-center py-8">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Form Data Pemohon</h3>
                    <p class="text-gray-600 mb-4">Pilih jenis surat di atas untuk menampilkan form pengajuan yang sesuai</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 text-sm">
                        <div class="bg-white p-3 rounded border">
                            <div class="font-medium text-gray-700">Form Dinamis</div>
                            <div class="text-xs text-gray-500">Menyesuaikan jenis surat</div>
                        </div>
                        <div class="bg-white p-3 rounded border">
                            <div class="font-medium text-gray-700">Auto Fill</div>
                            <div class="text-xs text-gray-500">Data otomatis terisi</div>
                        </div>
                        <div class="bg-white p-3 rounded border">
                            <div class="font-medium text-gray-700">Validasi</div>
                            <div class="text-xs text-gray-500">Real-time validation</div>
                        </div>
                    </div>
                </div>
            </div>
        `;
            };

            const addCommonFields = (container) => {
                const separator = document.createElement('hr');
                separator.className = 'my-6 border-gray-300';
                container.appendChild(separator);

                const header = document.createElement('h4');
                header.className = 'text-md font-semibold text-gray-700 mb-4';
                header.textContent = 'Keterangan Pengajuan';
                container.appendChild(header);

                const textarea = document.createElement('textarea');
                textarea.name = 'keterangan';
                textarea.className = 'optimized-input';
                textarea.rows = '3';
                textarea.placeholder = 'Jelaskan kedatangan atau tujuan pembuatan surat ini';
                textarea.required = true;
                container.appendChild(textarea);
            };

            const addAdditionalDocuments = (container) => {
                const section = document.createElement('div');
                section.className = 'mt-6 pt-6 border-t border-gray-200';
                section.innerHTML = `
            <h4 class="text-md font-semibold text-gray-700 mb-3">Dokumen Pendukung Lainnya (Opsional)</h4>
            <input type="file" name="dokumen_tambahan" accept=".pdf,.jpg,.jpeg,.png" class="optimized-input">
            <p class="mt-1 text-sm text-gray-500">Upload dokumen pendukung tambahan jika diperlukan</p>
        `;
                container.appendChild(section);
            };

            const autoFillUserData = () => {
                @if (isset($user))
                    // Only use fields that exist in the user_desa table
                    const userData = {
                        'nama': '{{ $user->nama ?? '' }}',
                        'nik': '{{ $user->nik ?? '' }}',
                        'alamat': '{{ $user->alamat ?? '' }}',
                        'no_hp': '{{ $user->no_hp ?? '' }}'
                    };

                    Object.keys(userData).forEach(key => {
                        if (userData[key]) {
                            const input = document.querySelector(`[name="data_pemohon[${key}]"]`);
                            if (input && !input.value) input.value = userData[key];
                        }
                    });
                @endif
            };

            // Event listeners with optimized performance
            const initEventListeners = () => {
                elements.jenisSuratSelect?.addEventListener('change', (e) => {
                    const jenisId = e.target.value;
                    loadDynamicFields(jenisId);
                    loadUploadRequirements(jenisId);
                });

                elements.form?.addEventListener('submit', (e) => {
                    // Handle keterangan field
                    const textarea = document.querySelector('textarea[name="keterangan"]');
                    const hidden = document.getElementById('keteranganField');
                    if (textarea && hidden) {
                        hidden.value = textarea.value;
                    }

                    // **TTL COMBINING FUNCTIONALITY**
                    // Combine TTL fields: tempat_lahir + tanggal_lahir
                    const tempatLahir = document.querySelector('[name="data_pemohon[tempat_lahir]"]');
                    const tanggalLahir = document.querySelector('[name="data_pemohon[tanggal_lahir]"]');
                    
                    if (tempatLahir && tanggalLahir && tempatLahir.value && tanggalLahir.value) {
                        // Convert date format from YYYY-MM-DD to Indonesian format
                        const dateValue = tanggalLahir.value;
                        const [year, month, day] = dateValue.split('-');
                        
                        const monthNames = [
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];
                        
                        const formattedDate = `${parseInt(day)} ${monthNames[parseInt(month) - 1]} ${year}`;
                        const combinedTTL = `${tempatLahir.value}, ${formattedDate}`;
                        
                        // Create hidden field for submission with new field name
                        let ttlField = document.querySelector('input[name="data_pemohon[Tempat_Tanggal_Lahir]"]');
                        if (!ttlField) {
                            ttlField = document.createElement('input');
                            ttlField.type = 'hidden';
                            ttlField.name = 'data_pemohon[Tempat_Tanggal_Lahir]';
                            elements.form.appendChild(ttlField);
                        }
                        ttlField.value = combinedTTL;
                        
                        // Remove the separate fields since we combined them
                        tempatLahir.remove();
                        tanggalLahir.remove();
                    }

                    elements.submitBtn.disabled = true;
                    elements.submitBtnText.textContent = 'Memproses...';
                    elements.submitSpinner.classList.remove('hidden');
                });
            };

            // Auto-load for pre-selected jenis
            const autoLoad = () => {
                const jenisId = elements.jenisSuratSelect?.value;
                if (jenisId && jenisId !== '') {
                    setTimeout(() => {
                        loadDynamicFields(jenisId);
                        loadUploadRequirements(jenisId);
                    }, 100);
                }
            };

            // Initialize when DOM is ready
            document.addEventListener('DOMContentLoaded', () => {
                initEventListeners();
                autoLoad();
            });

            // Form validation removed to allow normal form submission

            // Make functions globally accessible
            window.loadDynamicFields = loadDynamicFields;
            window.loadUploadRequirements = loadUploadRequirements;
        })();
    </script>
@endsection