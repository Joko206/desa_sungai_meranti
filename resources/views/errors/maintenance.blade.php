@extends('layout.app')

@section('title', 'Maintenance - Desa Sungai Meranti')

@section('content')
<section class="min-h-[100vh] flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(10, 20, 40, 0.52), rgba(10, 20, 40, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/20 mix-blend-multiply"></div>
    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
            <!-- Left Side - Maintenance Info -->
            <div class="text-white space-y-6">
                <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-8 border border-white/30">
                    <div class="space-y-6">
                        <div class="text-center lg:text-left">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-600/50 border border-orange-400/40 text-orange-100 text-xs tracking-wider uppercase font-medium">
                                Maintenance Mode
                            </span>
                        </div>
                        <div class="text-center lg:text-left">
                            <h1 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                                Kami Sedang<br>Maintenance
                            </h1>
                            <p class="text-sm text-blue-100/90 leading-relaxed">
                                Website sedang undergo perbaikan dan peningkatan sistem untuk memberikan layanan yang lebih baik. Kami akan kembali segera!
                            </p>
                        </div>
                        
                        <div class="space-y-3 pt-4">
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-blue-500/20 border border-blue-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Peningkatan sistem rutin</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-green-500/20 border border-green-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Performa yang lebih baik</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <div class="w-6 h-6 rounded-full bg-yellow-500/20 border border-yellow-400/30 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-blue-50/90">Fitur baru akan segera hadir</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Status & Actions -->
            <div class="space-y-6">
                <div class="bg-white/25 backdrop-blur-sm rounded-2xl p-8 border border-white/30">
                    <div class="text-center space-y-6">
                        <div class="space-y-4">
                            <div class="w-24 h-24 mx-auto bg-white/10 rounded-full flex items-center justify-center border-2 border-white/20">
                                <svg class="w-12 h-12 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            
                            <h3 class="text-xl font-bold text-white">
                                Sedang Maintenance
                            </h3>
                            <p class="text-sm text-blue-100/80">
                                Kami sedang melakukan peningkatan untuk memberikan pengalaman yang lebih baik
                            </p>
                        </div>

                        <div class="bg-white/10 rounded-lg p-4 border border-white/20">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-blue-100/80">Status:</span>
                                    <span class="text-yellow-300 font-medium">Maintenance</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-blue-100/80">Mulai:</span>
                                    <span class="text-white">{{ date('d/m/Y H:i', strtotime('-2 hours')) }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-blue-100/80">Estimasi Selesai:</span>
                                    <span class="text-green-300 font-medium">{{ date('d/m/Y H:i', strtotime('+1 hour')) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button onclick="location.reload()" class="w-full flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-400 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Cek Status
                            </button>
                            
                            <a href="mailto:admin@desasungaimeranti.com" class="w-full flex items-center justify-center gap-2 bg-white/20 hover:bg-white/30 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 hover:scale-[1.01] text-sm border border-white/30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media/Contact -->
                <div class="bg-white/15 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="text-center space-y-2">
                        <p class="text-xs text-blue-100/70">
                            Ikutiupdate terbaru melalui:
                        </p>
                        <div class="flex items-center justify-center gap-4 text-xs">
                            <a href="#" class="text-blue-200 hover:text-blue-100 transition-colors">
                                📱 WhatsApp: (0761) 123-456
                            </a>
                            <a href="#" class="text-blue-200 hover:text-blue-100 transition-colors">
                                📧 Email: info@desasungaimeranti.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Auto refresh every 30 seconds -->
<script>
    setTimeout(function() {
        location.reload();
    }, 30000);
</script>
@endsection