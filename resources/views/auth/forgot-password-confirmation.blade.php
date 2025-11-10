@extends('layout.app')

@section('title', 'Konfirmasi Email - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-900 via-orange-800 to-red-700 flex items-center justify-center pt-20" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container mx-auto px-8">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-green-500 rounded-full mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-bold text-white mb-4">Konfirmasi Email</h2>
                <p class="text-xl text-amber-100">
                    Akun ditemukan! Periksa detail di bawah ini
                </p>
            </div>

            <!-- Confirmation Card -->
            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20">
                @if(session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- User Information -->
                <div class="bg-blue-50 rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold text-blue-800 mb-4">Detail Akun</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <div>
                                <p class="text-sm text-blue-600 font-medium">Nama</p>
                                <p class="text-blue-800 font-semibold">{{ $user->nama }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <div>
                                <p class="text-sm text-blue-600 font-medium">NIK</p>
                                <p class="text-blue-800 font-semibold">{{ $user->nik }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <p class="text-sm text-blue-600 font-medium">Email</p>
                                <p class="text-blue-800 font-semibold">{{ $user->email }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <div>
                                <p class="text-sm text-blue-600 font-medium">Role</p>
                                <p class="text-blue-800 font-semibold capitalize">{{ $user->role->nama_role ?? 'warga' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirmation Message -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h4 class="text-yellow-800 font-medium">Kirim Kode OTP</h4>
                            <p class="text-yellow-700 text-sm mt-1">
                                Kami akan mengirim kode OTP ke <strong>{{ $user->email }}</strong>. Kode berlaku selama 5 menit.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <form method="POST" action="{{ route('password.send-otp') }}" id="sendOtpForm">
                        @csrf
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        <button type="submit" id="sendOtpBtn" class="w-full bg-green-500 hover:bg-green-400 text-white py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-6 h-6 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span id="sendOtpBtnText">Kirim Kode OTP</span>
                            <div id="sendOtpSpinner" class="hidden inline-block ml-2 w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                        </button>
                    </form>

                    <a href="{{ route('password.search-email') }}" class="w-full bg-gray-500 hover:bg-gray-400 text-white py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-xl text-center block">
                        <svg class="w-6 h-6 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Pencarian
                    </a>
                </div>
            </div>

            <div class="text-center mt-10">
                <p class="text-amber-200 text-sm">
                    Bukan akun Anda?
                    <a href="{{ route('password.search-email') }}" class="text-yellow-300 hover:text-yellow-200 underline">Cari email lain</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('sendOtpForm').addEventListener('submit', function(e) {
    const sendOtpBtn = document.getElementById('sendOtpBtn');
    const sendOtpBtnText = document.getElementById('sendOtpBtnText');
    const sendOtpSpinner = document.getElementById('sendOtpSpinner');
    
    sendOtpBtn.disabled = true;
    sendOtpBtnText.textContent = 'Mengirim OTP...';
    sendOtpSpinner.classList.remove('hidden');
});
</script>
@endsection