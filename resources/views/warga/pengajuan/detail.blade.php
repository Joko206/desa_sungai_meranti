@extends('layout.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-50 to-blue-50 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600 font-medium">Detail Pengajuan Surat</p>
                            <h1 class="text-2xl font-bold text-gray-800">Informasi Lengkap</h1>
                        </div>
                    </div>
                    <a href="{{ route('warga.dashboard') }}"
                       class="inline-flex items-center rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-50 hover:shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>

        @php
            $statusLabels = [
                'menunggu' => 'Menunggu',
                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                'disetujui' => 'Disetujui',
                'ditolak' => 'Ditolak',
                'dibatalkan' => 'Dibatalkan',
            ];
            $statusClasses = [
                'menunggu' => 'bg-gradient-to-r from-yellow-400 to-orange-400 text-white',
                'menunggu_verifikasi' => 'bg-gradient-to-r from-blue-400 to-indigo-500 text-white',
                'disetujui' => 'bg-gradient-to-r from-blue-400 to-blue-500 text-white',
                'ditolak' => 'bg-gradient-to-r from-red-400 to-rose-500 text-white',
                'dibatalkan' => 'bg-gradient-to-r from-gray-400 to-gray-500 text-white',
            ];
            $statusKey = $pengajuan->status ?? '';
            $statusLabel = $statusLabels[$statusKey] ?? ucwords(str_replace('_', ' ', $statusKey));
            $statusClass = $statusClasses[$statusKey] ?? 'bg-gray-100 text-gray-700';

            $tanggalPengajuan = $pengajuan->tanggal_pengajuan
                ? \Illuminate\Support\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y')
                : '-';

            $dataPemohon = $pengajuan->data_isian['data_pemohon'] ?? [];
            $keterangan = $pengajuan->data_isian['keterangan'] ?? null;
            $lampiran = $pengajuan->file_syarat ?? [];
        @endphp

        <!-- Status Card -->
        <div class="mb-6 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-blue-100">Nomor Pengajuan</p>
                            <p class="text-xl font-bold text-white">#{{ $pengajuan->id }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-blue-100">Tanggal Pengajuan</p>
                        <p class="text-lg font-semibold text-white">{{ $tanggalPengajuan }}</p>
                    </div>
                </div>
            </div>
            <div class="px-6 py-5">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Surat</p>
                            <p class="text-lg font-semibold text-gray-800">
                                {{ $pengajuan->jenis->nama_surat ?? '-' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="inline-flex rounded-full px-4 py-2 text-sm font-semibold shadow-sm {{ $statusClass }}">
                            {{ $statusLabel }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pemohon Card -->
        <div class="mb-6 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Data Pemohon
                </h2>
            </div>
            <div class="px-6 py-5">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 p-4 bg-gradient-to-br from-blue-50 to-blue-50 rounded-xl border border-blue-100">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-lg">👤</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $dataPemohon['nama'] ?? $user->nama ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-lg">🆔</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">NIK</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $dataPemohon['nik_pemohon'] ?? $user->nik ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 p-4 bg-gradient-to-br from-red-50 to-rose-50 rounded-xl border border-red-100">
                            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-lg">📍</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Alamat</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $dataPemohon['alamat'] ?? $user->alamat ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-gradient-to-br from-purple-50 to-violet-50 rounded-xl border border-purple-100">
                            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-lg">📱</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nomor HP</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $user->no_hp ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Data Isian Card -->
        <div class="mb-6 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Data Pengajuan
                </h2>
                <p class="mt-1 text-sm text-blue-100">Detail informasi yang Anda isi</p>
            </div>
            <div class="px-6 py-5">
                @php
                    // Get the actual data isian from the pengajuan
                    $fullDataIsian = $pengajuan->data_isian ?? [];
                    $actualData = [];
                    $keteranganData = null;
                    
                    // Handle different possible data structures
                    if (isset($fullDataIsian['form_structure_data'])) {
                        $actualData = $fullDataIsian['form_structure_data'];
                        $keteranganData = $fullDataIsian['keterangan'] ?? null;
                    } elseif (isset($fullDataIsian['data_pemohon'])) {
                        $actualData = $fullDataIsian['data_pemohon'];
                        $keteranganData = $fullDataIsian['keterangan'] ?? null;
                    } else {
                        $actualData = $fullDataIsian;
                        $keteranganData = $fullDataIsian['keterangan'] ?? null;
                    }
                    
                    // Remove the keterangan from actualData if it exists
                    unset($actualData['keterangan']);
                @endphp

                @if(count($actualData) > 0)
                    <div class="space-y-6">
                        <!-- Data Pengajuan Section -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-50 rounded-xl p-6 border border-blue-100">
                            <h4 class="font-semibold text-blue-800 mb-4 flex items-center text-lg">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                Data Pengajuan
                            </h4>
                            <div class="bg-white rounded-lg p-6 shadow-sm">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    @foreach($actualData as $key => $value)
                                        @if($value !== null && $value !== '' && $value !== 0)
                                            @php
                                                $displayKey = $key;
                                                $displayValue = $value;
                                                
                                                // Format display key
                                                $displayKey = str_replace('_', ' ', $displayKey);
                                                $displayKey = ucwords($displayKey);
                                                
                                                // Determine field type and styling
                                                $fieldTypeIcon = '📝';
                                                $fieldTypeColor = 'text-gray-600';
                                                
                                                if (stripos($displayKey, 'nik') !== false || stripos($displayKey, 'nomor') !== false) {
                                                    $fieldTypeIcon = '🆔';
                                                    $fieldTypeColor = 'text-blue-600';
                                                } elseif (stripos($displayKey, 'nama') !== false) {
                                                    $fieldTypeIcon = '👤';
                                                    $fieldTypeColor = 'text-green-600';
                                                } elseif (stripos($displayKey, 'alamat') !== false || stripos($displayKey, 'tempat') !== false) {
                                                    $fieldTypeIcon = '📍';
                                                    $fieldTypeColor = 'text-red-600';
                                                } elseif (stripos($displayKey, 'tanggal') !== false || stripos($displayKey, 'tgl') !== false) {
                                                    $fieldTypeIcon = '📅';
                                                    $fieldTypeColor = 'text-purple-600';
                                                } elseif (stripos($displayKey, 'hp') !== false || stripos($displayKey, 'telepon') !== false || stripos($displayKey, 'phone') !== false) {
                                                    $fieldTypeIcon = '📱';
                                                    $fieldTypeColor = 'text-indigo-600';
                                                }
                                            @endphp
                                            <div class="group">
                                                <label class="flex items-center text-sm font-medium text-gray-700 mb-2">
                                                    <span class="text-lg mr-2">{{ $fieldTypeIcon }}</span>
                                                    <span class="{{ $fieldTypeColor }} group-hover:text-gray-900 transition-colors">{{ $displayKey }}</span>
                                                </label>
                                                <div class="bg-gray-50 rounded-lg p-3 border border-gray-200 group-hover:border-gray-300 transition-colors">
                                                    <p class="text-sm text-gray-900 font-medium break-words">
                                                        @if(is_array($value) || is_object($value))
                                                            {{ json_encode($value, JSON_PRETTY_PRINT) }}
                                                        @else
                                                            {{ $value }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <!-- Keterangan Section -->
                        @if($keteranganData)
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
                                            <p class="text-sm text-gray-900 leading-relaxed">{{ $keteranganData }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="text-gray-500 text-lg font-medium">Belum ada data yang tersedia</p>
                        <p class="text-gray-400 text-sm mt-1">Data pengajuan akan muncul di sini setelah diisi</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Keterangan Card -->
        <div class="mb-6 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-6 py-4">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                    Keterangan Pengajuan
                </h2>
            </div>
            <div class="px-6 py-5">
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-5 border border-amber-200">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-amber-400 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-900 leading-relaxed">
                                {{ $keterangan ?? 'Tidak ada keterangan tambahan yang diberikan.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lampiran Persyaratan Card -->
        <div class="mb-6 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Lampiran Persyaratan
                </h2>
            </div>
            <div class="px-6 py-5">
                @if(count($lampiran) > 0)
                    <div class="space-y-4">
                        @foreach($lampiran as $index => $file)
                            @php
                                $fileUrl = route('warga.file.serve', ['pengajuanId' => $pengajuan->id, 'fileIndex' => $index]);
                                $fileName = $file['name'] ?? ('Lampiran-' . ($index + 1));
                                $fileSize = $file['size_kb'] ?? null;
                                
                                // Determine file type
                                $fileType = 'document';
                                $fileIcon = '📄';
                                $bgColor = 'bg-blue-50';
                                $borderColor = 'border-blue-200';
                                $textColor = 'text-blue-600';
                                
                                if (stripos($fileName, 'foto') !== false || stripos($fileName, 'image') !== false ||
                                    stripos($fileName, 'jpg') !== false || stripos($fileName, 'jpeg') !== false ||
                                    stripos($fileName, 'png') !== false) {
                                    $fileType = 'image';
                                    $fileIcon = '🖼️';
                                    $bgColor = 'bg-green-50';
                                    $borderColor = 'border-green-200';
                                    $textColor = 'text-green-600';
                                } elseif (stripos($fileName, 'ktp') !== false || stripos($fileName, 'kartu') !== false) {
                                    $fileType = 'id';
                                    $fileIcon = '🆔';
                                    $bgColor = 'bg-purple-50';
                                    $borderColor = 'border-purple-200';
                                    $textColor = 'text-purple-600';
                                } elseif (stripos($fileName, 'pdf') !== false) {
                                    $fileType = 'pdf';
                                    $fileIcon = '📕';
                                    $bgColor = 'bg-red-50';
                                    $borderColor = 'border-red-200';
                                    $textColor = 'text-red-600';
                                }
                            @endphp
                            <div class="flex items-center justify-between p-4 {{ $bgColor }} rounded-xl border {{ $borderColor }} hover:shadow-md transition-all duration-200 group">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 {{ $bgColor }} rounded-xl flex items-center justify-center border {{ $borderColor }} group-hover:scale-105 transition-transform">
                                            <span class="text-xl">{{ $fileIcon }}</span>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $fileName }}</p>
                                        <div class="flex items-center space-x-4 mt-1">
                                            @if($fileSize)
                                                <p class="text-xs text-gray-500 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                    </svg>
                                                    {{ number_format($fileSize, 2) }} KB
                                                </p>
                                            @endif
                                            <p class="text-xs text-gray-400">Dokumen #{{ $index + 1 }}</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ $fileUrl }}"
                                   target="_blank"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white {{ $textColor }} bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:shadow-md transition-all duration-200 shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Total {{ count($lampiran) }} dokumen
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Terakhir diperbarui: {{ now()->format('d F Y') }}
                            </span>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="text-sm text-gray-500">Belum ada lampiran yang diunggah</p>
                    </div>
                @endif
            </div>
        </div>

        @if($pengajuan->status === 'disetujui' && $pengajuan->suratTerbit && $pengajuan->suratTerbit->file_surat)
            @php
                $suratUrl = \Illuminate\Support\Facades\Storage::url(str_replace('public/', '', $pengajuan->suratTerbit->file_surat));
            @endphp
            <!-- Surat Tersedia Card -->
            <div class="bg-gradient-to-r from-emerald-400 to-green-500 rounded-2xl shadow-lg border border-emerald-200 overflow-hidden">
                <div class="px-6 py-5">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-semibold text-white">Surat Terbit Tersedia</p>
                                <p class="text-sm text-emerald-100">Surat resmi telah diterbitkan dan siap untuk diunduh</p>
                            </div>
                        </div>
                        <a href="{{ $suratUrl }}"
                           download
                           class="inline-flex items-center rounded-xl bg-white px-6 py-3 text-sm font-semibold text-emerald-600 shadow-sm transition-all hover:bg-emerald-50 hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Unduh Surat
                        </a>
                    </div>
                </div>
            </div>
        @elseif($pengajuan->status === 'ditolak' && $pengajuan->alasan_penolakan)
            <!-- Pengajuan Ditolak Card -->
            <div class="bg-gradient-to-r from-rose-400 to-red-500 rounded-2xl shadow-lg border border-rose-200 overflow-hidden">
                <div class="px-6 py-5">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white mb-2">Pengajuan Ditolak</h3>
                            <div class="bg-white/10 rounded-xl p-4">
                                <p class="text-sm text-white mb-2">
                                    <span class="font-semibold">Alasan penolakan:</span>
                                </p>
                                <p class="text-sm text-white leading-relaxed">{{ $pengajuan->alasan_penolakan }}</p>
                            </div>
                            <div class="mt-3 flex items-center text-sm text-rose-100">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Ditolak pada: {{ $pengajuan->updated_at->format('d F Y, H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection