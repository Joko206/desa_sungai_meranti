@extends('layout.app')

@section('title', 'Konfirmasi Email - Desa Sungai Meranti')

@section('content')
<section class="min-h-[100vh] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(10, 20, 40, 0.52), rgba(10, 20, 40, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/20 mix-blend-multiply"></div>
    <div class="relative z-10 w-full max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-8 border border-white/30">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500/20 border border-green-400/30 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Konfirmasi Email</h3>
                <p class="text-sm text-blue-100/80">
                    Akun ditemukan! Periksa detail di bawah ini
                </p>
            </div>

            @if(session('error'))
                <div class="mb-4 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                    <p class="text-red-200 text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <!-- User Information Card -->
            <div class="bg-blue-500/20 border border-blue-400/30 rounded-lg p-4 mb-6">
                <h4 class="text-blue-100 font-semibold mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Detail Akun
                </h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-blue-200/70">Nama:</span>
                        <span class="text-blue-100 font-medium">{{ $user->nama }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-200/70">NIK:</span>
                        <span class="text-blue-100 font-medium">{{ $user->nik }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-200/70">Email:</span>
                        <span class="text-blue-100 font-medium">{{ $user->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-200/70">Role:</span>
                        <span class="text-blue-100 font-medium capitalize">{{ $user->role->nama_role ?? 'warga' }}</span>
                    </div>
                </div>
            </div>

            <!-- Confirmation Message -->
            <div class="bg-yellow-500/20 border border-yellow-400/30 rounded-lg p-4 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-yellow-300 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h5 class="text-yellow-100 font-medium mb-1">Kirim Kode OTP</h5>
                        <p class="text-yellow-200/80 text-xs">
                            Kami akan mengirim kode OTP ke <strong>{{ $user->email }}</strong>. Kode berlaku selama 5 menit.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <form method="POST" action="{{ route('password.send-otp') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $user->email }}">
                    <button
                        type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-400 text-white font-semibold py-3 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Kirim Kode OTP
                    </button>
                </form>

                <a
                    href="{{ route('password.search-email') }}"
                    class="w-full flex items-center justify-center gap-2 bg-gray-500/80 hover:bg-gray-400/80 text-white font-semibold py-3 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Pencarian
                </a>
            </div>

            <div class="text-center pt-4 border-t border-white/20">
                <p class="text-xs text-blue-200/60">
                    Bukan akun Anda?
                    <a href="{{ route('password.search-email') }}" class="text-blue-200 hover:text-blue-100 underline">Cari email lain</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection