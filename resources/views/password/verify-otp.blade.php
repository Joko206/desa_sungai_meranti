@extends('layout.app')

@section('title', 'Verifikasi OTP - Desa Sungai Meranti')

@section('content')
<section class="min-h-[100vh] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(10, 20, 40, 0.52), rgba(10, 20, 40, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/20 mix-blend-multiply"></div>
    <div class="relative z-10 w-full max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-8 border border-white/30">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-500/20 border border-purple-400/30 rounded-full mb-4">
                    <svg class="w-8 h-8 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Verifikasi OTP</h3>
                <p class="text-sm text-blue-100/80">
                    Masukkan kode OTP yang dikirim ke email Anda
                </p>
                @if(isset($email))
                <p class="text-xs text-blue-200/70 mt-1">
                    <span class="font-medium">{{ $email }}</span>
                </p>
                @endif
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-500/20 border border-green-400/30 rounded-lg">
                    <p class="text-green-200 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                    <p class="text-red-200 text-sm">{{ session('error') }}</p>
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-4 p-3 bg-yellow-500/20 border border-yellow-400/30 rounded-lg">
                    <p class="text-yellow-200 text-sm font-mono">{{ session('warning') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                    <ul class="text-red-200 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.verify-otp.post') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
                
                <div class="space-y-2">
                    <label for="otp" class="block text-sm font-medium text-blue-50">
                        Kode OTP
                    </label>
                    <input
                        type="text"
                        id="otp"
                        name="otp"
                        required
                        maxlength="6"
                        value="{{ old('otp') }}"
                        class="w-full px-3 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:border-transparent text-center text-xl font-mono tracking-widest"
                        placeholder="000000"
                    >
                    <p class="text-xs text-blue-200/60">
                        Kode OTP berlaku selama 5 menit
                    </p>
                    @error('otp')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Countdown Timer -->
                <div class="text-center">
                    <div class="inline-flex items-center gap-2 bg-orange-500/20 border border-orange-400/30 rounded-lg px-3 py-2">
                        <svg class="w-4 h-4 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-orange-200 font-medium text-sm">
                            Sisa waktu: <span id="countdown">05:00</span>
                        </span>
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-purple-500 hover:bg-purple-400 text-white font-semibold py-3 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Verifikasi OTP
                </button>

                <!-- Resend OTP -->
                <div class="text-center">
                    <p class="text-xs text-blue-200/70">
                        Tidak menerima kode?
                        <button 
                            type="button" 
                            id="resendBtn" 
                            class="text-blue-200 hover:text-blue-100 font-medium underline disabled:opacity-50" 
                            disabled
                        >
                            <span id="resendText">Kirim Ulang OTP</span>
                            <span id="resendTimer" class="text-blue-300/60"></span>
                        </button>
                    </p>
                </div>
            </form>

            <div class="text-center pt-4 border-t border-white/20 space-y-2">
                <p class="text-xs text-blue-200/60">
                    Salah email?
                    <a href="{{ route('password.search-email') }}" class="text-blue-200 hover:text-blue-100 underline">Cari email lagi</a>
                </p>
                <p class="text-xs text-blue-200/60">
                    Lupa password?
                    <a href="{{ route('login') }}" class="text-blue-200 hover:text-blue-100 underline">Kembali ke login</a>
                </p>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const otpInput = document.getElementById('otp');
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
    });

    // Countdown timer (5 minutes)
    let timeLeft = 300;
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
            timeLeft = 300;
            resendBtn.disabled = true;
            resendText.textContent = 'Mengirim...';
            resendTimer.textContent = '';
            
            setTimeout(() => {
                resendText.textContent = 'Kirim Ulang OTP';
            }, 2000);
        }
    });
});
</script>
@endsection