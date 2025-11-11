@extends('layout.app')

@section('title', 'Terjadi Kesalahan - Desa Sungai Meranti')

@section('content')
<section class="min-h-[100vh] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(10, 20, 40, 0.52), rgba(10, 20, 40, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/20 mix-blend-multiply"></div>
    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
            <!-- Left Side - Error Info -->
            <div class="text-white space-y-6">
                <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-8 border border-white/30">
                    <div class="space-y-6">
                        <div class="text-center lg:text-left">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-600/50 border border-orange-400/40 text-orange-100 text-xs tracking-wider uppercase font-medium">
                                Terjadi Kesalahan
                            </span>
                        </div>
                        <div class="text-center lg:text-left">
                            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                                Oops!
                            </h1>
                            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                                Terjadi Kesalahan
                            </h2>
                            <p class="text-sm text-blue-100/90 leading-relaxed">
                                Maaf, terjadi kesalahan yang tidak terduga. Tim kami telah diberitahu tentang masalah ini dan akan segera memperbaikinya.
                            </p>
                        </div>
                        
                        <div class="space-y-3 pt-4">
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-blue-500/20 border border-blue-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Kesalahan tidak terduga</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-green-500/20 border border-green-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Tim support telah diberitahu</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-yellow-500/20 border border-yellow-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Kami akan memperbaiki segera</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Action Buttons -->
            <div class="space-y-6">
                <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-8 border border-white/30">
                    <div class="text-center space-y-6">
                        <div class="space-y-4">
                            <div class="w-24 h-24 mx-auto bg-white/10 rounded-full flex items-center justify-center border-2 border-white/20">
                                <svg class="w-12 h-12 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                            </div>
                            
                            <h3 class="text-xl font-bold text-white">
                                Mohon Maaf
                            </h3>
                            <p class="text-sm text-blue-100/80">
                                Terjadi kesalahan yang tidak terduga. Kami akan segera memperbaiki masalah ini.
                            </p>
                        </div>

                        <div class="space-y-3">
                            <a href="{{ url('/') }}" class="w-full flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-400 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Kembali ke Beranda
                            </a>
                            
                            <button onclick="history.back()" class="w-full flex items-center justify-center gap-2 bg-white/20 hover:bg-white/30 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm border border-white/30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali
                            </button>
                            
                            <a href="mailto:support@desasungaimeranti.com" class="w-full flex items-center justify-center gap-2 bg-white/20 hover:bg-white/30 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm border border-white/30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Hubungi Support
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Error ID -->
                <div class="bg-white/15 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="text-center space-y-2">
                        <p class="text-xs text-blue-100/70">
                            ID Error: <span class="text-white font-mono text-xs">{{ uniqid() }}</span>
                        </p>
                        <p class="text-xs text-blue-100/60">
                            Catat ID ini jika Anda menghubungi support
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection