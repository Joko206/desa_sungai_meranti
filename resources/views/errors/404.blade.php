@extends('layout.app')

@section('title', 'Halaman Tidak Ditemukan - Desa Sungai Meranti')

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
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-600/50 border border-red-400/40 text-red-100 text-xs tracking-wider uppercase font-medium">
                                Error 404
                            </span>
                        </div>
                        <div class="text-center lg:text-left">
                            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                                404
                            </h1>
                            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                                Halaman Tidak Ditemukan
                            </h2>
                            <p class="text-sm text-blue-100/90 leading-relaxed">
                                Maaf, halaman yang Anda cari tidak ditemukan. Halaman mungkin telah dipindahkan, dihapus, atau URL yang Anda masukkan salah.
                            </p>
                        </div>
                        
                        <div class="space-y-3 pt-4">
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-blue-500/20 border border-blue-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Kembali ke halaman utama</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-blue-500/20 border border-blue-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Hubungi dukungan kami</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-blue-500/20 border border-blue-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Coba cari di situs kami</span>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.47-.881-6.073-2.331M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            
                            <h3 class="text-xl font-bold text-white">
                                Oops! Terjadi Kesalahan
                            </h3>
                            <p class="text-sm text-blue-100/80">
                                Jangan khawatir, kami akan membantu Anda menemukan jalan yang benar
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
                                Kembali ke Halaman Sebelumnya
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
                
                <!-- Additional Help -->
                <div class="bg-white/15 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="text-center space-y-2">
                        <p class="text-xs text-blue-100/70">
                            Masih mengalami masalah? Tim kami siap membantu 24/7
                        </p>
                        <div class="flex items-center justify-center gap-4 text-xs text-blue-100/60">
                            <span>📞 (0761) 123-456</span>
                            <span>✉️ info@desasungaimeranti.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection