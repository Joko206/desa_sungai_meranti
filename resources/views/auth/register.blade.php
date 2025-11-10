@extends('layout.app')

@section('title', 'Register - Desa Sungai Meranti')

@section('content')
<section class="relative min-h-[calc(100vh-4rem)] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(10, 20, 40, 0.52), rgba(10, 20, 40, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/32 mix-blend-multiply"></div>
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 left-10 w-96 h-96 bg-blue-200/18 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-blue-300/14 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute bottom-[-50px] left-1/3 w-80 h-80 bg-blue-300/12 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 sm:px-8">
        <div class="grid lg:grid-cols-5">
            <div class="lg:col-span-2 hidden lg:flex flex-col justify-center px-12 py-14 bg-gradient-to-br from-blue-600/30 via-blue-700/20 to-blue-900/35 border-r border-white/10">
                    <div class="space-y-6 text-white">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-blue-900/70 border border-blue-500/40 text-blue-100 text-[11px] tracking-[0.35em] uppercase">
                            Layanan Warga
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-bold leading-tight">
                            Bergabung dengan Sistem Digital Desa Sungai Meranti
                        </h2>
                        <p class="text-sm text-blue-100/90 leading-relaxed">
                            Registrasi hanya membutuhkan beberapa data dasar untuk memverifikasi identitas Anda sebagai warga desa. Setelah terdaftar, Anda dapat mengajukan dan memantau seluruh pengajuan administrasi secara daring tanpa kendala.
                        </p>
                        <ul class="space-y-3 text-sm text-blue-50/90">
                            <li class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-full bg-blue-500/20 border border-blue-300/30 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                                Verifikasi identitas yang mudah dan aman
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-full bg-blue-500/20 border border-blue-300/30 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </span>
                                Akses 24/7 ke layanan administrasi desa
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-full bg-blue-500/20 border border-blue-300/30 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                    </svg>
                                </span>
                                Pantau status pengajuan secara real-time
                            </li>
                        </ul>
                        <div class="pt-4">
                            <div class="flex items-center gap-4 text-sm text-blue-100/80">
                                <span>Untuk warga Sungai Meranti</span>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="lg:col-span-3 flex flex-col justify-center px-6 py-12 sm:px-12">
                <div class="w-full max-w-md mx-auto">
                    <div class="text-center lg:text-left space-y-3">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-blue-900/70 border border-blue-500/40 text-blue-200 text-[11px] tracking-[0.35em] uppercase">
                            Registrasi Akun
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-bold text-white">
                            Daftar Akun Baru
                        </h2>
                        <p class="text-sm sm:text-base text-blue-50/85 max-w-2xl">
                            Isi data berikut sesuai KTP dan identitas resmi Anda. Pastikan informasi yang diberikan akurat untuk memudahkan verifikasi dan proses administrasi.
                        </p>
                    </div>

                    <form action="{{ route('register') }}" method="POST" class="mt-8 space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label for="nik" class="block text-sm font-medium text-blue-50 tracking-wide">
                                    NIK (Nomor Induk Kependudukan)
                                </label>
                                <input
                                    type="text"
                                    id="nik"
                                    name="nik"
                                    required
                                    value="{{ old('nik') }}"
                                    maxlength="16"
                                    class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                    placeholder="Masukkan NIK 16 digit"
                                >
                                @error('nik')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="nama" class="block text-sm font-medium text-blue-50 tracking-wide">
                                    Nama Lengkap
                                </label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    required
                                    value="{{ old('nama') }}"
                                    class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                    placeholder="Masukkan nama lengkap"
                                >
                                @error('nama')
                                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="alamat" class="block text-sm font-medium text-blue-50 tracking-wide">
                                Alamat Lengkap
                            </label>
                            <textarea
                                id="alamat"
                                name="alamat"
                                required
                                rows="3"
                                class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150 resize-none"
                                placeholder="Masukkan alamat lengkap (RT/RW, Jalan, Desa, Kecamatan)"
                            >{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="no_hp" class="block text-sm font-medium text-blue-50 tracking-wide">
                                Nomor Handphone
                            </label>
                            <input
                                type="tel"
                                id="no_hp"
                                name="no_hp"
                                required
                                value="{{ old('no_hp') }}"
                                class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                placeholder="08xxxxxxxxxx"
                            >
                            @error('no_hp')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-blue-50 tracking-wide">
                                Email <span class="text-red-400 text-xs">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                placeholder="nama@email.com"
                            >
                            @error('email')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-blue-100/70 mt-1">
                                Email wajib diisi untuk menerima notifikasi status pengajuan surat.
                            </p>
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-blue-50 tracking-wide">
                                Password
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                minlength="6"
                                class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                placeholder="Minimal 6 karakter"
                            >
                            @error('password')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="kode_rahasia" class="block text-sm font-medium text-blue-50 tracking-wide">
                                Kode Rahasia Admin <span class="text-blue-200/80">(Opsional)</span>
                            </label>
                            <input
                                type="password"
                                id="kode_rahasia"
                                name="kode_rahasia"
                                value="{{ old('kode_rahasia') }}"
                                class="w-full px-4 py-3 rounded-2xl bg-blue-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-150"
                                placeholder="Kosongkan jika mendaftar sebagai warga"
                            >
                            @error('kode_rahasia')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-blue-100/70 mt-1">
                                Isi jika Anda adalah staf atau admin desa untuk mendapatkan akses khusus.
                            </p>
                        </div>

                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full flex items-center justify-center gap-3 bg-blue-400 hover:bg-blue-300 text-blue-950 font-semibold text-base sm:text-lg py-3.5 rounded-2xl shadow-xl shadow-blue-500/30 transition-all duration-200 hover:scale-[1.01]"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Buat Akun Saya
                            </button>
                        </div>
                        
                        <div class="space-y-4">
                            <p class="text-xs sm:text-sm text-blue-100/70 text-center">
                                Dengan mendaftar, Anda menyetujui
                                <a href="#" class="text-blue-200 hover:text-blue-100 underline underline-offset-4">Syarat & Ketentuan</a>
                                serta
                                <a href="#" class="text-blue-200 hover:text-blue-100 underline underline-offset-4">Kebijakan Privasi</a>
                                Desa Sungai Meranti.
                            </p>
                            <p class="text-sm text-blue-100/80 text-center">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="font-semibold text-blue-200 hover:text-blue-100 underline underline-offset-4">
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