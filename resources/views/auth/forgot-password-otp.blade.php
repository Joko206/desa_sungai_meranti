@extends('layout.app')

@section('title', 'Verifikasi OTP - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-900 via-purple-800 to-indigo-700 flex items-center justify-center pt-20" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container mx-auto px-8">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-green-500 rounded-full mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-bold text-white mb-4">Verifikasi OTP</h2>
                <p class="text-xl text-purple-100">
                    Masukkan kode OTP yang dikirim ke email Anda
                </p>
                @if(isset($email))
                <p class="text-lg text-purple-200 mt-2">
                    <span class="font-medium">{{ $email }}</span>
                </p>
                @endif
            </div>

            <!-- Form Card -->
            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20">
                @if(session('success'))
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.verify-otp') }}" id="otpForm">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
                    
                    <div class="space-y-6">
                        <!-- OTP Input -->
                        <div>
                            <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">Kode OTP</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input 
                                    type="text" 
                                    id="otp" 
                                    name="otp" 
                                    required 
                                    maxlength="6"
                                    autofocus
                                    value="{{ old('otp') }}"
                                    class="w-full pl-10 pr-4 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-center text-2xl font-mono tracking-widest"
                                    placeholder="000000"
                                >
                            </div>
                            <p class="text-sm text-gray-500 mt-2">
                                Kode OTP berlaku selama 5 menit
                            </p>
                        </div>

                        <!-- Countdown Timer -->
                        <div class="text-center">
                            <div class="inline-flex items-center space-x-2 bg-orange-100 rounded-lg px-4 py-2">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-orange-800 font-medium">
                                    Sisa waktu: <span id="countdown">05:00</span>
                                </span>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" id="verifyBtn" class="w-full bg-green-500 hover:bg-green-400 text-white py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg class="w-6 h-6 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span id="verifyBtnText">Verifikasi OTP</span>
                                <div id="verifySpinner" class="hidden inline-block ml-2 w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                            </button>
                        </div>

                        <!-- Resend OTP -->
                        <div class="text-center">
                            <p class="text-sm text-gray-600">
                                Tidak menerima kode?
                                <button type="button" id="resendBtn" class="text-purple-600 hover:text-purple-800 font-medium underline disabled:opacity-50" disabled>
                                    <span id="resendText">Kirim Ulang OTP</span>
                                    <span id="resendTimer" class="text-gray-500"></span>
                                </button>
                            </p>
                        </div>
                    </div>
                </form>

                <div class="text-center pt-6">
                    <p class="text-purple-100">
                        Salah email?
                        <a href="{{ route('password.search-email') }}" class="text-yellow-300 hover:text-yellow-200 font-semibold underline underline-offset-2">
                            Cari email lagi
                        </a>
                    </p>
                </div>
            </div>

            <div class="text-center mt-10">
                <p class="text-purple-200 text-sm">
                    Lupa password?
                    <a href="{{ route('login') }}" class="text-yellow-300 hover:text-yellow-200 underline">Kembali ke login</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const otpInput = document.getElementById('otp');
    const verifyBtn = document.getElementById('verifyBtn');
    const resendBtn = document.getElementById('resendBtn');
    const resendText = document.getElementById('resendText');
    const resendTimer = document.getElementById('resendTimer');
    const countdownElement = document.getElementById('countdown');

    // Format OTP input (numbers only, max 6 digits)
    otpInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 6) {
            value = value.substring(0, 6);
        }
        e.target.value = value;
        
        // Enable/disable verify button
        verifyBtn.disabled = value.length !== 6;
    });

    // Countdown timer (5 minutes)
    let timeLeft = 300; // 5 minutes in seconds
    const countdown = setInterval(function() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        countdownElement.textContent = 
            String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
        
        if (timeLeft <= 0) {
            clearInterval(countdown);
            countdownElement.textContent = '00:00';
            resendBtn.disabled = false;
            resendText.textContent = 'Kirim Ulang OTP';
            resendTimer.textContent = '';
        } else if (timeLeft <= 60) {
            resendBtn.disabled = false;
            resendText.textContent = 'Kirim Ulang OTP';
            resendTimer.textContent = '';
        } else {
            resendBtn.disabled = true;
            resendText.textContent = 'Kirim Ulang OTP dalam ';
            resendTimer.textContent = Math.floor(timeLeft / 60) + ' menit';
        }
        
        timeLeft--;
    }, 1000);

    // Resend OTP functionality
    resendBtn.addEventListener('click', function() {
        if (timeLeft <= 60) {
            // Reset countdown
            timeLeft = 300;
            resendBtn.disabled = true;
            resendText.textContent = 'Mengirim...';
            resendTimer.textContent = '';
            
            // Here you would make an AJAX call to resend OTP
            setTimeout(() => {
                resendText.textContent = 'Kirim Ulang OTP';
            }, 2000);
        }
    });

    // Form submission
    document.getElementById('otpForm').addEventListener('submit', function() {
        verifyBtn.disabled = true;
        document.getElementById('verifyBtnText').textContent = 'Memverifikasi...';
        document.getElementById('verifySpinner').classList.remove('hidden');
    });
});
</script>
@endsection