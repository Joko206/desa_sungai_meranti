@extends('layout.app')

@section('title', 'Akses Ditolak - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 via-white to-red-50 flex items-center justify-center px-4">
    <div class="max-w-md w-full text-center">
        <!-- Error Icon -->
        <div class="mb-8">
            <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0v2m0-2h2m-2 0h-2m-6 4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h1 class="text-6xl font-bold text-red-600 mb-2">403</h1>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Akses Ditolak</h2>
            <p class="text-gray-600 leading-relaxed">
                Anda tidak memiliki izin untuk mengakses halaman ini. Halaman ini hanya dapat diakses oleh pengguna yang berwenang.
            </p>
        </div>

        <!-- Actions -->
        <div class="space-y-4">
            @auth
                @if(auth()->user()->role && auth()->user()->role->nama_role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h2a2 2 0 012 2v2H8V5z"/>
                        </svg>
                        Kembali ke Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('warga.dashboard') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Login Terlebih Dahulu
                </a>
            @endauth

            <a href="{{ route('home') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Help Text -->
        <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="flex">
                <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-left">
                    <p class="text-sm text-blue-800">
                        <strong>Butuh bantuan?</strong> Jika Anda merasa ini adalah kesalahan, silakan hubungi admin desa atau coba login dengan akun yang tepat.
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
                    @auth
                        <dt><strong>User:</strong> {{ auth()->user()->nama }} ({{ auth()->user()->role->nama_role ?? 'No Role' }})</dt>
                    @else
                        <dt><strong>User:</strong> Guest</dt>
                    @endauth
                </dl>
            </div>
        @endif
    </div>
</div>
@endsection