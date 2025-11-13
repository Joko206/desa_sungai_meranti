@extends('layout.app')

@section('title', 'Cari Email - Desa Sungai Meranti')

@section('content')
<section class="min-h-[100vh] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(10, 20, 40, 0.52), rgba(10, 20, 40, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/20 mix-blend-multiply"></div>
    <div class="relative z-10 w-full max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-8 border border-white/30">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600/20 border border-blue-400/30 rounded-full mb-4">
                    <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Cari Akun Email</h3>
                <p class="text-sm text-blue-100/80">
                    Masukkan alamat email Anda untuk mencari akun
                </p>
            </div>

            <!-- Form -->
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

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-500/20 border border-red-400/30 rounded-lg">
                    <ul class="text-red-200 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.search-email.post') }}" class="space-y-4">
                @csrf
                
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-blue-50">
                        Alamat Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        value="{{ old('email') }}"
                        class="w-full px-3 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent text-sm"
                        placeholder="nama@email.com"
                    >
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-400 text-white font-semibold py-3 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cari Akun
                </button>
            </form>

            <div class="text-center space-y-3 pt-6 border-t border-white/20">
                <p class="text-xs text-blue-100/70">
                    Ingat password Anda?
                    <a href="{{ route('login') }}" class="text-blue-200 hover:text-blue-100 font-semibold underline">
                        Masuk di sini
                    </a>
                </p>
                <p class="text-xs text-blue-200/60">
                    Tidak menemukan akun?
                    <a href="#" class="text-blue-200 hover:text-blue-100 underline">Hubungi admin desa</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection