@extends('layout.admin.dashboard')

@section('title', 'Detail Pengajuan - Desa Sungai Meranti')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <a href="/admin/pengajuan" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 mb-2">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Daftar
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Detail Pengajuan</h1>
                <p class="mt-2 text-gray-600">Detail pengajuan surat dari warga</p>
            </div>
        </div>
    </div>

    <div id="loading" class="text-center py-12">
        <svg class="animate-spin -ml-1 mr-3 h-8 w-8 text-gray-400 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <p class="text-gray-500">Memuat data...</p>
    </div>

    <div id="pengajuan-detail" class="hidden">
        <!-- Header Info -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-900">
                        Pengajuan #<span id="pengajuan-id">-</span>
                    </h2>
                    <span id="status-badge" class="inline-flex px-3 py-1 text-sm font-semibold rounded-full">
                        -
                    </span>
                </div>
            </div>
            <div class="px-6 py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Informasi Pemohon</h3>
                        <div class="space-y-2">
                            <p class="text-sm"><span class="font-medium">Nama:</span> <span id="pemohon-nama">-</span></p>
                            <p class="text-sm"><span class="font-medium">NIK:</span> <span id="pemohon-nik">-</span></p>
                            <p class="text-sm"><span class="font-medium">Alamat:</span> <span id="pemohon-alamat">-</span></p>
                            <p class="text-sm"><span class="font-medium">No. HP:</span> <span id="pemohon-hp">-</span></p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Informasi Surat</h3>
                        <div class="space-y-2">
                            <p class="text-sm"><span class="font-medium">Jenis Surat:</span> <span id="jenis-surat">-</span></p>
                            <p class="text-sm"><span class="font-medium">Tanggal Pengajuan:</span> <span id="tanggal-pengajuan">-</span></p>
                            <p class="text-sm"><span class="font-medium">Status:</span> <span id="status-text">-</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Isian -->
        <div class="bg-white shadow-sm rounded-xl border border-gray-200 mb-6 overflow-hidden">
            <div class="px-6 py-5 bg-gradient-to-r from-blue-50 to-blue-50 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-blue-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Data Pengajuan
                </h3>
                <p class="mt-1 text-sm text-blue-600">Informasi lengkap yang diisi oleh pemohon</p>
            </div>
            <div class="px-6 py-5">
                <div id="data-isian-content" class="space-y-6">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>

        <!-- File Requirements -->
        <div class="bg-white shadow-sm rounded-xl border border-gray-200 mb-6 overflow-hidden">
            <div class="px-6 py-5 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-blue-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Dokumen Persyaratan
                </h3>
                <p class="mt-1 text-sm text-blue-600">Berkas yang dilampirkan oleh pemohon</p>
            </div>
            <div class="px-6 py-5">
                <div id="file-requirements-content">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Aksi</h3>
            </div>
            <div class="px-6 py-4">
                <div class="flex space-x-4" id="action-buttons">
                    <!-- Action buttons will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rejection Modal -->
<div id="rejection-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Tolak Pengajuan</h3>
            <form id="rejection-form">
                <div class="mb-4">
                    <label for="alasan-penolakan" class="block text-sm font-medium text-gray-700 mb-2">Alasan Penolakan</label>
                    <textarea id="alasan-penolakan" name="alasan" rows="4" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Masukkan alasan penolakan..."></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeRejectionModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                        Tolak Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let currentPengajuanId = window.location.pathname.split('/').pop();
let currentPengajuanData = null;

async function loadPengajuanDetail() {
    try {
        const response = await fetch(`/admin/pengajuan/${currentPengajuanId}`, {
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) {
            throw new Error('Failed to load pengajuan detail');
        }

        const result = await response.json();
        
        if (result.success) {
            currentPengajuanData = result.data;
            displayPengajuanDetail(result.data);
        } else {
            throw new Error(result.message);
        }
    } catch (error) {
        document.getElementById('loading').innerHTML = `
            <div class="text-red-500">
                <p>Error: ${error.message}</p>
                <button onclick="loadPengajuanDetail()" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Coba Lagi
                </button>
            </div>
        `;
    }
}

function displayPengajuanDetail(pengajuan) {
    document.getElementById('loading').classList.add('hidden');
    document.getElementById('pengajuan-detail').classList.remove('hidden');

    // Header info
    document.getElementById('pengajuan-id').textContent = pengajuan.id;
    document.getElementById('pemohon-nama').textContent = pengajuan.pemohon?.nama || 'Unknown';
    document.getElementById('pemohon-nik').textContent = pengajuan.pemohon?.nik || 'Unknown';
    document.getElementById('pemohon-alamat').textContent = pengajuan.pemohon?.alamat || 'Unknown';
    document.getElementById('pemohon-hp').textContent = pengajuan.pemohon?.no_hp || 'Unknown';
    document.getElementById('jenis-surat').textContent = pengajuan.jenis?.nama_surat || 'Unknown';
    document.getElementById('tanggal-pengajuan').textContent = new Date(pengajuan.tanggal_pengajuan).toLocaleDateString('id-ID');
    
    // Status
    const statusBadge = document.getElementById('status-badge');
    statusBadge.textContent = getStatusLabel(pengajuan.status);
    statusBadge.className = `inline-flex px-3 py-1 text-sm font-semibold rounded-full ${getStatusColor(pengajuan.status)}`;
    document.getElementById('status-text').textContent = getStatusLabel(pengajuan.status);

    // Data isian
    displayDataIsian(pengajuan.data_isian, pengajuan.form_structure);
    
    // File requirements
    displayFileRequirements(pengajuan.file_syarat);
    
    // Action buttons
    displayActionButtons(pengajuan);
}

function displayDataIsian(dataIsian, formStructure = null) {
    const container = document.getElementById('data-isian-content');
    
    if (!dataIsian || typeof dataIsian !== 'object') {
        container.innerHTML = `
            <div class="text-center py-8">
                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="text-gray-500 text-sm">Tidak ada data isian yang tersedia</p>
            </div>
        `;
        return;
    }

    let html = '';
    
    // Extract actual data from the nested structure
    let actualData = {};
    let keterangan = '';
    
    // Handle different possible data structures
    if (dataIsian.form_structure_data) {
        actualData = dataIsian.form_structure_data;
        keterangan = dataIsian.keterangan || '';
    } else if (dataIsian.data_pemohon) {
        actualData = dataIsian.data_pemohon;
        keterangan = dataIsian.keterangan || '';
    } else {
        actualData = dataIsian;
        keterangan = dataIsian.keterangan || '';
    }
    
    // Create a field label mapping from form structure
    const fieldLabels = {};
    if (formStructure && Array.isArray(formStructure)) {
        formStructure.forEach(field => {
            const name = field.name || field.field_name || field.key;
            const label = field.label || name;
            fieldLabels[name] = label;
        });
    }
    
    // Display data in organized sections
    html += '<div class="space-y-8">';
    
    // Data Pengajuan Section - Enhanced styling
    if (Object.keys(actualData).length > 0) {
        html += `
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100">
                <h4 class="font-semibold text-green-800 mb-4 flex items-center text-lg">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    Data Pengajuan
                </h4>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">`;
        
        Object.entries(actualData).forEach(([key, value]) => {
            if (value !== null && value !== undefined && value !== '') {
                const displayKey = fieldLabels[key] || key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                const displayValue = typeof value === 'object' ? JSON.stringify(value, null, 2) : value;
                
                // Determine field type and styling
                let fieldTypeIcon = '📝';
                let fieldTypeColor = 'text-gray-600';
                
                if (displayKey.toLowerCase().includes('nik') || displayKey.toLowerCase().includes('nomor')) {
                    fieldTypeIcon = '🆔';
                    fieldTypeColor = 'text-blue-600';
                } else if (displayKey.toLowerCase().includes('nama')) {
                    fieldTypeIcon = '👤';
                    fieldTypeColor = 'text-green-600';
                } else if (displayKey.toLowerCase().includes('alamat') || displayKey.toLowerCase().includes('tempat')) {
                    fieldTypeIcon = '📍';
                    fieldTypeColor = 'text-red-600';
                } else if (displayKey.toLowerCase().includes('tanggal') || displayKey.toLowerCase().includes('tgl')) {
                    fieldTypeIcon = '📅';
                    fieldTypeColor = 'text-purple-600';
                } else if (displayKey.toLowerCase().includes('hp') || displayKey.toLowerCase().includes('telepon') || displayKey.toLowerCase().includes('phone')) {
                    fieldTypeIcon = '📱';
                    fieldTypeColor = 'text-indigo-600';
                }
                
                html += `
                    <div class="group">
                        <label class="flex items-center text-sm font-medium text-gray-700 mb-2">
                            <span class="text-lg mr-2">${fieldTypeIcon}</span>
                            <span class="${fieldTypeColor} group-hover:text-gray-900 transition-colors">${displayKey}</span>
                        </label>
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-200 group-hover:border-gray-300 transition-colors">
                            <p class="text-sm text-gray-900 font-medium break-words">${displayValue}</p>
                        </div>
                    </div>
                `;
            }
        });
        
        html += `
                    </div>
                </div>
            </div>
        `;
    }
    
    // Form Structure (Field Definitions) Section - Enhanced
    if (formStructure && Array.isArray(formStructure) && formStructure.length > 0) {
        html += `
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                <h4 class="font-semibold text-blue-800 mb-4 flex items-center text-lg">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    Struktur Form
                </h4>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="space-y-4">`;
        
        formStructure.forEach((field, index) => {
            const name = field.name || field.field_name || field.key;
            const label = field.label || name;
            const type = field.type || 'text';
            const required = field.required ? '<span class="inline-flex items-center px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full ml-2">Wajib</span>' : '';
            const optional = !field.required ? '<span class="inline-flex items-center px-2 py-1 text-xs font-semibold text-gray-600 bg-gray-100 rounded-full ml-2">Opsional</span>' : '';
            
            let typeIcon = '📝';
            let typeColor = 'bg-gray-100 text-gray-700';
            
            if (type === 'text') {
                typeIcon = '🔤';
            } else if (type === 'email') {
                typeIcon = '📧';
                typeColor = 'bg-blue-100 text-blue-700';
            } else if (type === 'date') {
                typeIcon = '📅';
                typeColor = 'bg-purple-100 text-purple-700';
            } else if (type === 'file') {
                typeIcon = '📎';
                typeColor = 'bg-orange-100 text-orange-700';
            } else if (type === 'textarea') {
                typeIcon = '📄';
                typeColor = 'bg-green-100 text-green-700';
            }
            
            html += `
                <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-lg border border-gray-200 hover:border-gray-300 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center border">
                            <span class="text-sm font-bold text-gray-600">${index + 1}</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center flex-wrap gap-2 mb-2">
                            <h5 class="font-semibold text-gray-900 text-sm">${label}</h5>
                            ${required}
                            ${optional}
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium ${typeColor} rounded-full">
                                <span class="mr-1">${typeIcon}</span>
                                ${type}
                            </span>
                        </div>
                        ${field.placeholder ? `<p class="text-xs text-gray-500 italic">Placeholder: "${field.placeholder}"</p>` : ''}
                        ${field.description ? `<p class="text-xs text-gray-600 mt-1">${field.description}</p>` : ''}
                    </div>
                </div>
            `;
        });
        
        html += `
                    </div>
                </div>
            </div>
        `;
    }
    
    // Keterangan Section - Enhanced
    if (keterangan) {
        html += `
            <div class="bg-gradient-to-br from-amber-50 to-yellow-50 rounded-xl p-6 border border-amber-200">
                <h4 class="font-semibold text-amber-800 mb-4 flex items-center text-lg">
                    <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                    </div>
                    Keterangan Tambahan
                </h4>
                <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-amber-400">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-amber-400 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-900 leading-relaxed">${keterangan}</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    // If no data at all
    if (!Object.keys(actualData).length && !formStructure?.length && !keterangan) {
        html += `
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="text-gray-500 text-lg font-medium">Belum ada data yang tersedia</p>
                <p class="text-gray-400 text-sm mt-1">Data pengajuan akan muncul di sini setelah diisi</p>
            </div>
        `;
    }
    
    html += '</div>';
    container.innerHTML = html;
}

function displayFileRequirements(files) {
    const container = document.getElementById('file-requirements-content');
    
    if (!files || !Array.isArray(files) || files.length === 0) {
        container.innerHTML = `
            <div class="text-center py-8">
                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="text-gray-500 text-sm">Belum ada dokumen yang diunggah</p>
            </div>
        `;
        return;
    }

    const html = files.map((file, index) => {
        // Determine file type icon and color
        let fileIcon = '📄';
        let fileColor = 'text-blue-600';
        let bgColor = 'bg-blue-50';
        let borderColor = 'border-blue-200';
        
        if (file.label) {
            const fileName = file.label.toLowerCase();
            if (fileName.includes('foto') || fileName.includes('image') || fileName.includes('jpg') || fileName.includes('jpeg') || fileName.includes('png')) {
                fileIcon = '🖼️';
                fileColor = 'text-green-600';
                bgColor = 'bg-green-50';
                borderColor = 'border-green-200';
            } else if (fileName.includes('ktp') || fileName.includes('kartu')) {
                fileIcon = '🆔';
                fileColor = 'text-purple-600';
                bgColor = 'bg-purple-50';
                borderColor = 'border-purple-200';
            } else if (fileName.includes('pdf')) {
                fileIcon = '📕';
                fileColor = 'text-red-600';
                bgColor = 'bg-red-50';
                borderColor = 'border-red-200';
            }
        }
        
        const fileSize = file.size_kb ? `${file.size_kb} KB` : 'Unknown';
        
        return `
            <div class="flex items-center justify-between p-5 ${bgColor} rounded-xl border ${borderColor} hover:shadow-md transition-all duration-200 group">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 ${bgColor} rounded-xl flex items-center justify-center border ${borderColor} group-hover:scale-105 transition-transform">
                            <span class="text-xl">${fileIcon}</span>
                        </div>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-900 truncate">${file.label}</p>
                        <div class="flex items-center space-x-4 mt-1">
                            <p class="text-xs text-gray-500 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                                ${fileSize}
                            </p>
                            <p class="text-xs text-gray-400">Dokumen #${index + 1}</p>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="/admin/file/lihat/${currentPengajuanId}/${encodeURIComponent(file.label)}" target="_blank"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-blue-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition-all duration-200 shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Lihat
                    </a>
                    <a href="/admin/file/download/${currentPengajuanId}/${encodeURIComponent(file.label)}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-green-700 bg-white border border-green-200 rounded-lg hover:bg-green-50 hover:border-green-300 transition-all duration-200 shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Unduh
                    </a>
                </div>
            </div>
        `;
    }).join('');
    
    container.innerHTML = `
        <div class="space-y-4">
            ${html}
        </div>
        <div class="mt-6 pt-4 border-t border-gray-200">
            <div class="flex items-center justify-between text-sm text-gray-600">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Total ${files.length} dokumen
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Terakhir diperbarui: ${new Date().toLocaleDateString('id-ID')}
                </span>
            </div>
        </div>
    `;
}

function displayActionButtons(pengajuan) {
    const container = document.getElementById('action-buttons');
    let html = '';

    switch(pengajuan.status) {
        case 'menunggu':
            html = `
                <button onclick="approvePengajuan(${pengajuan.id})"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Setujui
                </button>
                <button onclick="openRejectionModal()"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Tolak
                </button>
            `;
            break;
        case 'disetujui_verifikasi':
            // This status should no longer appear as letter is generated automatically
            html = `
                <div class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-blue-700 bg-blue-50 border border-blue-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Sedang memproses...
                </div>
            `;
            break;
        case 'menunggu_tanda_tangan':
            if (pengajuan.surat_terbit) {
                html = `
                    <a href="/${pengajuan.surat_terbit.file_surat}" target="_blank"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Lihat Surat
                    </a>
                `;
            }
            break;
    }

    if (html) {
        container.innerHTML = html;
    } else {
        container.innerHTML = '<p class="text-gray-500">Tidak ada aksi yang tersedia</p>';
    }
}

function getStatusColor(status) {
    switch(status) {
        case 'menunggu':
            return 'bg-yellow-100 text-yellow-800';
        case 'disetujui_verifikasi':
            return 'bg-blue-100 text-blue-800';
        case 'ditolak':
            return 'bg-red-100 text-red-800';
        case 'menunggu_tanda_tangan':
            return 'bg-purple-100 text-purple-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
}

function getStatusLabel(status) {
    switch(status) {
        case 'menunggu':
            return 'Menunggu';
        case 'disetujui_verifikasi':
            return 'Disetujui';
        case 'ditolak':
            return 'Ditolak';
        case 'menunggu_tanda_tangan':
            return 'Menunggu Tanda Tangan';
        default:
            return status;
    }
}

function openRejectionModal() {
    document.getElementById('rejection-modal').classList.remove('hidden');
}

function closeRejectionModal() {
    document.getElementById('rejection-modal').classList.add('hidden');
    document.getElementById('rejection-form').reset();
}

async function approvePengajuan(id) {
    if (!confirm('Apakah Anda yakin ingin menyetujui pengajuan ini?')) {
        return;
    }

    try {
        const response = await fetch(`/admin/pengajuan/${id}/approve`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const result = await response.json();
        
        if (result.success) {
            if (result.file_url) {
                alert('Pengajuan berhasil disetujui dan surat telah digenerate otomatis! Mengalihkan ke halaman detail...');
            } else {
                alert('Pengajuan berhasil disetujui!');
            }
            location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    } catch (error) {
        alert('Terjadi kesalahan saat menyetujui pengajuan');
    }
}

async function rejectPengajuan(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const alasan = formData.get('alasan');

    try {
        const response = await fetch(`/admin/pengajuan/${currentPengajuanId}/reject`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ alasan })
        });

        const result = await response.json();
        
        if (result.success) {
            alert('Pengajuan berhasil ditolak!');
            closeRejectionModal();
            location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    } catch (error) {
        alert('Terjadi kesalahan saat menolak pengajuan');
    }
}

async function generateSurat(id) {
    if (!confirm('Apakah Anda yakin ingin generate surat untuk pengajuan ini?')) {
        return;
    }

    try {
        const response = await fetch(`/admin/pengajuan/${id}/generate`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const result = await response.json();
        
        if (result.success) {
            alert('Surat berhasil di-generate!');
            location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    } catch (error) {
        alert('Terjadi kesalahan saat generate surat');
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    loadPengajuanDetail();
    document.getElementById('rejection-form').addEventListener('submit', rejectPengajuan);
});
</script>
@endsection