@extends('layout.app')

@section('title', 'Register - Desa Sungai Meranti')

@section('content')
<section class="min-h-[100vh] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(10, 20, 40, 0.52), rgba(10, 20, 40, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/20 mix-blend-multiply"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-3 gap-8 items-start">
            <!-- Left Side - Compact Info -->
            <div class="lg:col-span-1 text-white space-y-6">
                <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-6 border border-white/30">
                    <div class="space-y-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-600/50 border border-blue-400/40 text-blue-100 text-xs tracking-wider uppercase font-medium">
                            Sistem Digital Desa
                        </span>
                        <h2 class="text-2xl font-bold leading-tight">
                            Daftar Akun Warga
                        </h2>
                        <p class="text-sm text-blue-100/90 leading-relaxed">
                            Bergabung dengan sistem digital Desa Sungai Meranti untuk memudahkan pengajuan administrasi desa.
                        </p>
                        
                        <div class="space-y-3 pt-2">
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-green-500/20 border border-green-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Verifikasi mudah & aman</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-green-500/20 border border-green-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Akses 24/7</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-green-500/20 border border-green-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Tracking real-time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="lg:col-span-2">
                <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/30">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Form Registrasi</h3>
                        <p class="text-sm text-blue-100/80">
                            Isi data berikut sesuai KTP dan identitas resmi Anda
                        </p>
                    </div>

                    <form action="{{ route('register') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Two Column Grid for Basic Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="nik" class="block text-sm font-medium text-blue-50">
                                    NIK
                                </label>
                                <input
                                    type="text"
                                    id="nik"
                                    name="nik"
                                    required
                                    value="{{ old('nik') }}"
                                    maxlength="16"
                                    class="w-full px-3 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent text-sm"
                                    placeholder="16 digit NIK"
                                >
                                @error('nik')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="space-y-1">
                                <label for="nama" class="block text-sm font-medium text-blue-50">
                                    Nama Lengkap
                                </label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    required
                                    value="{{ old('nama') }}"
                                    class="w-full px-3 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent text-sm"
                                    placeholder="Nama sesuai KTP"
                                >
                                @error('nama')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="no_hp" class="block text-sm font-medium text-blue-50">
                                    Nomor HP
                                </label>
                                <input
                                    type="tel"
                                    id="no_hp"
                                    name="no_hp"
                                    required
                                    value="{{ old('no_hp') }}"
                                    class="w-full px-3 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent text-sm"
                                    placeholder="08xxxxxxxxxx"
                                >
                                @error('no_hp')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="space-y-1">
                                <label for="email" class="block text-sm font-medium text-blue-50">
                                    Email <span class="text-red-400 text-xs">*</span>
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
                        </div>

                        <!-- Address -->
                        <div class="space-y-1">
                            <label for="alamat" class="block text-sm font-medium text-blue-50">
                                Alamat Lengkap
                            </label>
                            <textarea
                                id="alamat"
                                name="alamat"
                                required
                                rows="2"
                                class="w-full px-3 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent resize-none text-sm"
                                placeholder="RT/RW, Jalan, Desa, Kecamatan"
                            >{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-blue-50">
                                    Password
                                </label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    minlength="6"
                                    class="w-full px-3 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent text-sm"
                                    placeholder="Minimal 6 karakter"
                                >
                                @error('password')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="space-y-1">
                                <label for="kode_rahasia" class="block text-sm font-medium text-blue-50">
                                    Kode Admin <span class="text-blue-200/70 text-xs">(Opsional)</span>
                                </label>
                                <input
                                    type="password"
                                    id="kode_rahasia"
                                    name="kode_rahasia"
                                    value="{{ old('kode_rahasia') }}"
                                    class="w-full px-3 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent text-sm"
                                    placeholder="Untuk staf/admin"
                                >
                                @error('kode_rahasia')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-400 text-white font-semibold py-3 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Buat Akun Saya
                            </button>
                        </div>
                        
                        <!-- Links -->
                        <div class="text-center space-y-3 pt-2">
                            <p class="text-xs text-blue-100/70">
                                Dengan mendaftar, Anda menyetujui
                                <a href="#" class="text-blue-200 hover:text-blue-100 underline">Syarat & Ketentuan</a>
                                dan
                                <a href="#" class="text-blue-200 hover:text-blue-100 underline">Kebijakan Privasi</a>
                            </p>
                            <p class="text-sm text-blue-100/80">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="font-semibold text-blue-200 hover:text-blue-100 underline">
                                    Masuk di sini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection