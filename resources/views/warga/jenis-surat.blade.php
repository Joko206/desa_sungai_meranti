@extends('layout.app')

@section('title', 'Jenis Surat - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center">
                <a href="{{ route('warga.tutorial-pengajuan') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-700 font-medium bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-lg transition duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Tutorial Pengajuan
                </a>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mt-4">Jenis Surat Administrasi</h1>
            <p class="text-gray-600 mt-2">Pilih jenis surat yang ingin Anda ajukan</p>
        </div>

        <!-- Jenis Surat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jenisSuratList as $jenis)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <!-- Card Header - Judul dan button dalam satu card -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-6 flex items-center justify-between">
                        <h3 class="text-lg font-bold text-white leading-tight flex-1">{{ $jenis->nama_surat }}</h3>
                        <a href="{{ route('pengajuan.create') }}?jenis={{ $jenis->id }}"
                           class="ml-4 bg-white hover:bg-gray-100 text-blue-600 font-semibold py-2 px-4 rounded-lg transition-colors duration-200 flex items-center gap-2 whitespace-nowrap">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Ajukan
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if($jenisSuratList->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada jenis surat</h3>
                <p class="mt-1 text-sm text-gray-500">Jenis surat administrasi akan segera ditambahkan.</p>
            </div>
        @endif
    </div>
</div>
@endsection