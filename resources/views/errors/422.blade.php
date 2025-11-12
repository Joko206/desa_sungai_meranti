@extends('layout.app')

@section('title', 'Data Tidak Valid - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-orange-50 flex items-center justify-center px-4">
    <div class="max-w-md w-full text-center">
        <!-- Error Icon -->
        <div class="mb-8">
            <div class="w-24 h-24 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="text-6xl font-bold text-orange-600 mb-2">422</h1>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Data Tidak Valid</h2>
            <p class="text-gray-600 leading-relaxed">
                Data yang Anda kirimkan tidak memenuhi persyaratan. Mohon periksa kembali dan lengkapi data dengan benar.
            </p>
        </div>

        <!-- Validation Errors (if available) -->
        @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-left">
                <h3 class="text-sm font-medium text-red-800 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Kesalahan Validasi:
                </h3>
                <ul class="text-sm text-red-700 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Common Validation Issues -->
        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg text-left">
            <h3 class="text-sm font-medium text-blue-800 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Tips Perbaikan Data:
            </h3>
            <ul class="text-sm text-blue-700 space-y-1">
                <li>• Pastikan semua field wajib sudah diisi</li>
                <li>• NIK harus 16 digit angka</li>
                <li>• Email harus dalam format yang benar</li>
                <li>• File upload harus sesuai format dan ukuran</li>
                <li>• Tanggal harus dalam format yang valid</li>
            </ul>
        </div>

        <!-- Actions -->
        <div class="space-y-4">
            <button onclick="window.history.back()" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-orange-600 hover:bg-orange-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali & Perbaiki
            </button>

            <a href="{{ route('home') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Help Links -->
        <div class="mt-8 p-4 bg-green-50 rounded-lg border border-green-200">
            <div class="flex">
                <svg class="w-5 h-5 text-green-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-left">
                    <p class="text-sm text-green-800">
                        <strong>Butuh bantuan?</strong> Lihat panduan lengkap di halaman
                        <a href="{{ url('/bantuan') }}" class="text-green-600 hover:text-green-800 font-medium underline">Bantuan & FAQ</a>
                        atau hubungi admin desa.
                    </p>
                </div>
            </div>
        </div>

        <!-- Error Details (for development) -->
        @if(config('app.debug'))
            <div class="mt-6 p-4 bg-gray-100 rounded-lg text-left">
                <h3 class="text-sm font-medium text-gray-900 mb-2">Debug Information:</h3>
                <dl class="text-xs text-gray-600 space-y-1">
                    <dt><strong>URL:</strong> {{ request()->fullUrl() }}</dt>
                    <dt><strong>Method:</strong> {{ request()->method() }}</dt>
                    <dt><strong>IP:</strong> {{ request()->ip() }}</dt>
                    <dt><strong>Input:</strong> {{ json_encode(request()->all()) }}</dt>
                </dl>
            </div>
        @endif
    </div>
</div>
@endsection