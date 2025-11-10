@extends('layout.app')

@section('title', 'Masuk - Desa Sungai Meranti')

@section('content')
<section class="relative min-h-[calc(100vh-4rem)] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(12, 28, 51, 0.5), rgba(12, 28, 51, 0.5)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="absolute inset-0 bg-black/30 mix-blend-multiply"></div>
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 -left-20 w-96 h-96 bg-blue-300/15 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-40px] right-0 w-80 h-80 bg-blue-300/15 rounded-full blur-2xl"></div>
        <div class="absolute top-1/3 right-1/3 w-64 h-64 bg-blue-200/12 rounded-full blur-xl animate-pulse"></div>
    </div>

    <div class="relative z-10 w-full px-6 sm:px-8 lg:px-12 xl:px-16 py-10">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white/12 backdrop-blur-2xl border border-white/25 rounded-3xl shadow-2xl shadow-black/30 overflow-hidden">
                <div class="px-6 sm:px-10 lg:px-14 xl:px-16 py-10 space-y-7">
                    <div class="text-center space-y-3">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-blue-900/70 border border-blue-500/40 text-blue-200 text-xs tracking-[0.3em] uppercase">
                            Selamat Datang
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white leading-tight">
                            Masuk ke Akun Anda
                        </h2>
                        <p class="text-sm sm:text-base text-blue-100/85 max-w-lg mx-auto">
                            Akses semua layanan administrasi desa dengan mudah dan aman dalam satu dashboard digital.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5" id="loginForm">
                        @csrf

                        <div class="grid grid-cols-1 gap-5">
                            <div class="space-y-2">
                                <label for="nik" class="block text-sm font-medium text-blue-50 tracking-wide">
                                    NIK (Nomor Induk Kependudukan)
                                </label>
                                <input
                                    type="text"
                                    id="nik"
                                    name="nik"
                                    required
                                    maxlength="16"
                                    class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                    placeholder="Masukkan NIK 16 digit"
                                    autofocus
                                    onblur="sanitizeInput(this)"
                                >
                                @error('nik')
                                    <p class="text-rose-200 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-medium text-blue-50 tracking-wide">
                                    Password
                                </label>
                                <div class="relative">
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        required
                                        minlength="6"
                                        class="w-full px-4 py-3 pr-12 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                        placeholder="Masukkan password"
                                    >
                                    <button
                                        type="button"
                                        onclick="togglePassword()"
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-blue-100/75 hover:text-white transition-colors"
                                        aria-label="Tampilkan password"
                                    >
                                        <svg id="toggle-password-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="text-rose-200 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <label for="remember" class="inline-flex items-center gap-2 text-sm text-blue-50/90">
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                        class="w-4 h-4 rounded border-white/20 bg-blue-950/60 text-blue-300 focus:ring-blue-300 focus:ring-2"
                                    >
                                    <span>Ingat saya</span>
                                </label>
                                <a
                                    href="{{ route('password.search-email') }}"
                                    class="text-sm font-medium text-blue-200 hover:text-blue-100 transition-colors underline underline-offset-2"
                                >
                                    Lupa password?
                                </a>
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    id="loginBtn"
                                    class="w-full flex items-center justify-center gap-3 bg-blue-400 hover:bg-blue-300 text-blue-950 font-semibold text-base sm:text-lg py-3.5 rounded-2xl shadow-xl shadow-blue-500/30 transition-all duration-200 hover:scale-[1.01] disabled:opacity-60 disabled:cursor-not-allowed"
                                    disabled
                                >
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    <span id="loginBtnText">Masuk ke Dashboard</span>
                                    <span id="loginSpinner" class="hidden w-4 h-4 border-2 border-blue-900 border-t-transparent rounded-full animate-spin"></span>
                                </button>
                            </div>

                            <div class="text-center text-sm text-blue-100/80">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="font-semibold text-blue-200 hover:text-blue-100 underline-offset-4 underline">
                                    Daftar sekarang
                                </a>
                            </div>
                        </div>
                    </form>

                    <div class="text-center text-xs sm:text-sm text-blue-100/70">
                        Mengalami kendala?
                        <a href="#" class="text-blue-200 hover:text-blue-100 underline underline-offset-4">Hubungi Support</a>
                        atau
                        <a href="{{ route('home') }}" class="text-blue-200 hover:text-blue-100 underline underline-offset-4">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nikInput = document.getElementById('nik');
    const passwordInput = document.getElementById('password');
    const loginBtn = document.getElementById('loginBtn');
    const loginBtnText = document.getElementById('loginBtnText');
    const loginSpinner = document.getElementById('loginSpinner');

    function updateSubmitButton() {
        const isValid = nikInput.value.length === 16 && passwordInput.value.length >= 6;
        loginBtn.disabled = !isValid;
    }

    nikInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 16) {
            value = value.substring(0, 16);
        }
        e.target.value = value;
        updateSubmitButton();
    });

    passwordInput.addEventListener('input', updateSubmitButton);

    document.getElementById('loginForm').addEventListener('submit', function() {
        loginBtn.disabled = true;
        loginBtnText.textContent = 'Memproses...';
        loginSpinner.classList.remove('hidden');
    });

    nikInput.focus();
});

function sanitizeInput(input) {
    if (input && input.value) {
        // Apply htmlspecialchars equivalent in JavaScript
        const div = document.createElement('div');
        div.textContent = input.value;
        const sanitized = div.innerHTML;
        input.value = sanitized.replace(/&/g, '&')
                             .replace(/</g, '<')
                             .replace(/>/g, '>')
                             .replace(/"/g, '"')
                             .replace(/'/g, '&#x27;')
                             .replace(/\//g, '&#x2F;');
    }
}

function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggle-password-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
        `;
    } else {
        passwordInput.type = 'password';
        toggleIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        `;
    }
}
</script>
@endsection