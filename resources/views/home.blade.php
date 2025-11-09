@extends('layout.app')

@section('title', 'Beranda - Desa Sungai Meranti')

@section('content')
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-blue-950" style="background-image: linear-gradient(rgba(16, 38, 58, 0.45), rgba(16, 38, 58, 0.45)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="absolute inset-0 bg-black/35"></div>
    <div class="absolute inset-0 bg-blue-800/30 mix-blend-multiply"></div>

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-blue-200/20 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute top-1/2 -left-20 w-72 h-72 bg-blue-300/15 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-16 right-1/3 w-60 h-60 bg-blue-200/20 rounded-full blur-2xl animate-pulse delay-1000"></div>
    </div>

    <div class="relative z-10 w-full px-6 sm:px-12 lg:px-20 xl:px-28 py-12 md:py-16">
        <div class="grid lg:grid-cols-2 gap-12 xl:gap-24 items-center">
            <div class="space-y-8 text-center lg:text-left">
                <!-- Main Title -->
                <div class="space-y-4">
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-medium text-blue-100/90 tracking-wide">
                        Selamat Datang di
                    </h1>
                    <h2 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-blue-400 drop-shadow-[0_4px_18px_rgba(59,130,246,0.35)] leading-tight">
                        simadesa
                    </h2>
                </div>

                <!-- Subtitle -->
                <div class="space-y-3">
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-semibold text-white leading-tight">
                        Sistem Informasi Manajemen
                    </h3>
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-semibold text-white leading-tight">
                        Administrasi Desa Sungai Meranti
                    </h3>
                    <div class="mt-6">
                        <span class="inline-block h-1.5 w-24 rounded-full bg-blue-300/90"></span>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-lg md:text-xl text-blue-100/90 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Melayani masyarakat dengan sistem informasi yang modern, transparan, dan mudah diakses. 
                    Semua layanan administrasi desa dalam satu platform digital yang nyaman digunakan di mana saja.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 sm:gap-6 pt-4">
                    <a href="{{ route('administrasi') }}" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-400 text-white px-8 py-4 rounded-2xl font-semibold text-base md:text-lg transition-all transform hover:scale-[1.02] shadow-blue-500/40 shadow-lg flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                        Administrasi Online
                    </a>
                    <a href="https://desasungaimeranti.id/" target="_blank" class="w-full sm:w-auto bg-white/15 hover:bg-white/25 text-white px-8 py-4 rounded-2xl font-semibold text-base md:text-lg transition-all transform hover:scale-[1.02] shadow-black/30 shadow-lg flex items-center justify-center gap-3 border border-white/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Web Profil
                    </a>
                </div>
            </div>
            
            <!-- Statistics Card -->
            <div class="hidden lg:block">
                <div class="bg-white/18 backdrop-blur-2xl rounded-[36px] p-12 shadow-2xl border border-white/40">
                    <h3 class="text-3xl font-semibold text-white text-center mb-10 tracking-tight">Statistik Desa</h3>
                    <div class="grid grid-cols-2 gap-10">
                        <div class="text-center space-y-3">
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="6243">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Total Penduduk</div>
                        </div>
                        <div class="text-center space-y-3">
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="756">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Kepala Keluarga</div>
                        </div>
                        <div class="text-center space-y-3">
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="23">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Dusun</div>
                        </div>
                        <div class="text-center space-y-3">
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="1">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Desa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<<<<<<< HEAD
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="2847">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Total Penduduk</div>
=======
                            <div class="text-5xl md:text-6xl font-black text-emerald-200" data-count="6243">0</div>
                            <div class="text-emerald-50 text-base uppercase tracking-[0.3em]">Total Penduduk</div>
>>>>>>> 0d03fa85a59a54b2f6879eff923760827f2cf773
                        </div>
                        <div class="text-center space-y-3">
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="756">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Kepala Keluarga</div>
                        </div>
                        <div class="text-center space-y-3">
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="23">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Dusun</div>
                        </div>
                        <div class="text-center space-y-3">
                            <div class="text-5xl md:text-6xl font-black text-blue-200" data-count="1">0</div>
                            <div class="text-blue-50 text-base uppercase tracking-[0.3em]">Desa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('[data-count]');
    const speed = 160;

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-count');
            const count = +counter.innerText.replace(/\D/g, '');
            const inc = Math.max(Math.ceil(target / speed), 1);

            if (count < target) {
                counter.innerText = `${Math.min(count + inc, target)}`;
                requestAnimationFrame(updateCount);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };
        updateCount();
    });
});
</script>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.animate-float {
    animation: float 4s ease-in-out infinite;
}
</style>

@endsection
