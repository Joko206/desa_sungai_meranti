@extends('layout.app')

@section('title', 'Sesi Berakhir - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-50 via-white to-yellow-50 flex items-center justify-center px-4">
    <div class="max-w-md w-full text-center">
        <!-- Error Icon -->
        <div class="mb-8">
            <div class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="text-6xl font-bold text-yellow-600 mb-2">408</h1>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Sesi Berakhir</h2>
            <p class="text-gray-600 leading-relaxed">
                Sesi login Anda telah berakhir karena tidak ada aktivitas dalam waktu lama. Untuk melanjutkan, silakan login kembali.
            </p>
        </div>

        <!-- Session Info -->
        <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
            <div class="flex">
                <svg class="w-5 h-5 text-yellow-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
                <div class="text-left">
                    <p class="text-sm text-yellow-800">
                        Demi keamanan akun Anda, sistem secara otomatis mengakhiri sesi setelah periode tidak aktif yang lama.
                    </p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="space-y-4">
            <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-yellow-600 hover:bg-yellow-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Login Kembali
            </a>

            <a href="{{ route('home') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Security Tips -->
        <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="flex">
                <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-left">
                    <p class="text-sm text-blue-800">
                        <strong>Tips keamanan:</strong> Selalu logout setelah selesai menggunakan sistem dan jangan biarkan browser terbuka dalam waktu lama.
                    </p>
                </div>
            </div>
        </div>

        <!-- Alternative Login Options -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
            <h3 class="text-sm font-medium text-gray-900 mb-3">Opsi Login:</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('password.search-email') }}" class="text-center px-3 py-2 text-sm text-blue-600 hover:text-blue-800 border border-blue-200 rounded hover:bg-blue-50 transition-colors">
                    Reset Password
                </a>
                <a href="{{ route('register') }}" class="text-center px-3 py-2 text-sm text-green-600 hover:text-green-800 border border-green-200 rounded hover:bg-green-50 transition-colors">
                    Daftar Akun Baru
                </a>
            </div>
        </div>

        <!-- Error Details (for development) -->
        @if(config('app.debug'))
            <div class="mt-6 p-4 bg-gray-100 rounded-lg text-left">
                <h3 class="text-sm font-medium text-gray-900 mb-2">Debug Information:</h3>
                <dl class="text-xs text-gray-600 space-y-1">
                    <dt><strong>Time:</strong> {{ now()->format('Y-m-d H:i:s') }}</dt>
                    <dt><strong>IP:</strong> {{ request()->ip() }}</dt>
                    <dt><strong>User Agent:</strong> {{ substr(request()->userAgent(), 0, 50) }}...</dt>
                    @auth
                        <dt><strong>Last Activity:</strong> {{ auth()->user()->updated_at ? auth()->user()->updated_at->diffForHumans() : 'Unknown' }}</dt>
                    @endauth
                </dl>
            </div>
        @endif
    </div>
</div>

<script>
// Auto redirect to login after 30 seconds
let countdown = 30;
const countdownElement = document.createElement('p');
countdownElement.className = 'text-sm text-gray-500 mt-4';
countdownElement.innerHTML = `Otomatis redirect ke halaman login dalam <span class="font-bold text-yellow-600">${countdown}</span> detik...`;

document.querySelector('.space-y-4').appendChild(countdownElement);

const timer = setInterval(() => {
    countdown--;
    countdownElement.innerHTML = `Otomatis redirect ke halaman login dalam <span class="font-bold text-yellow-600">${countdown}</span> detik...`;

    if (countdown <= 0) {
        clearInterval(timer);
        window.location.href = '{{ route("login") }}';
    }
}, 1000);

// Clear timer if user interacts
document.addEventListener('click', () => clearInterval(timer));
document.addEventListener('keydown', () => clearInterval(timer));
document.addEventListener('scroll', () => clearInterval(timer));
</script>
@endsection