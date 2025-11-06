@extends('layout.app')

@section('title', 'Daftar - Desa Sungai Meranti')

@section('content')
<section class="relative min-h-[calc(100vh-4rem)] flex items-center justify-center overflow-hidden bg-emerald-950" style="background-image: linear-gradient(rgba(10, 40, 25, 0.52), rgba(10, 40, 25, 0.52)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed%;">
    <div class="absolute inset-0 bg-black/32 mix-blend-multiply"></div>
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 left-10 w-96 h-96 bg-emerald-200/18 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-teal-300/14 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute bottom-[-50px] left-1/3 w-80 h-80 bg-emerald-300/12 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 w-full px-6 sm:px-10 lg:px-16 xl:px-20 py-10">
        <div class="w-full bg-white/12 backdrop-blur-2xl border border-white/25 rounded-4xl shadow-2xl shadow-black/30 overflow-hidden">
            <div class="grid lg:grid-cols-5">
                <div class="lg:col-span-2 hidden lg:flex flex-col justify-center px-12 py-14 bg-gradient-to-br from-emerald-600/30 via-emerald-700/20 to-emerald-900/35 border-r border-white/10">
                        <div class="space-y-6 text-white">
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-900/70 border border-emerald-500/40 text-emerald-100 text-[11px] tracking-[0.35em] uppercase">
                                Layanan Warga
                            </span>
                            <h3 class="text-3xl font-black leading-tight">
                                Bergabung bersama Desa Sungai Meranti Digital
                            </h3>
                            <p class="text-sm text-emerald-100/90 leading-relaxed">
                                Registrasi hanya membutuhkan beberapa data dasar untuk memverifikasi identitas Anda sebagai warga desa. Setelah terdaftar, Anda dapat mengajukan dan memantau seluruh pengajuan administrasi secara daring tanpa kendala.
                            </p>
                            <ul class="space-y-3 text-sm text-emerald-50/90">
                                <li class="flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-300/30 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    Ajukan surat kapan saja, di mana saja.
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-300/30 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </span>
                                    Pantau status dan riwayat pengajuan secara real-time.
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-full bg-emerald-500/20 border border-emerald-300/30 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                        </svg>
                                    </span>
                                    Terhubung langsung dengan perangkat desa dan layanan publik.
                                </li>
                            </ul>
                        </div>
                    </div>

                <div class="lg:col-span-3 px-10 sm:px-14 lg:px-18 xl:px-20 py-12 space-y-10">
                    <div class="text-center lg:text-left space-y-3">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-900/70 border border-emerald-500/40 text-emerald-200 text-[11px] tracking-[0.35em] uppercase">
                            Registrasi Akun
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
                            Daftarkan Identitas Anda
                        </h2>
                        <p class="text-sm sm:text-base text-emerald-50/85 max-w-2xl">
                            Isi data berikut sesuai KTP dan identitas resmi Anda. Pastikan informasi yang diberikan akurat untuk memudahkan verifikasi dan proses administrasi.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register.post') }}" class="space-y-7" onsubmit="return validateForm()">
                            @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="space-y-2">
                                    <label for="nik" class="block text-sm font-medium text-emerald-50 tracking-wide">
                                        NIK (Nomor Induk Kependudukan)
                                    </label>
                                    <input
                                        type="text"
                                        id="nik"
                                        name="nik"
                                        required
                                        maxlength="16"
                                        class="w-full px-4 py-3 rounded-2xl bg-emerald-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:border-transparent transition-all duration-150"
                                        placeholder="Masukkan NIK 16 digit"
                                        onblur="sanitizeInput(this)"
                                    >
                                    @error('nik')
                                        <p class="text-rose-200 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="nama" class="block text-sm font-medium text-emerald-50 tracking-wide">
                                        Nama Lengkap
                                    </label>
                                    <input
                                        type="text"
                                        id="nama"
                                        name="nama"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl bg-emerald-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:border-transparent transition-all duration-150"
                                        placeholder="Masukkan nama lengkap"
                                        onblur="sanitizeInput(this)"
                                    >
                                    @error('nama')
                                        <p class="text-rose-200 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2 md:col-span-2">
                                    <label for="alamat" class="block text-sm font-medium text-emerald-50 tracking-wide">
                                        Alamat Lengkap
                                    </label>
                                    <textarea
                                        id="alamat"
                                        name="alamat"
                                        required
                                        rows="3"
                                        class="w-full px-4 py-3 rounded-2xl bg-emerald-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:border-transparent transition-all duration-150 resize-none"
                                        placeholder="Masukkan alamat lengkap (RT/RW, Jalan, Desa, Kecamatan)"
                                        onblur="sanitizeInput(this)"
                                    ></textarea>
                                    @error('alamat')
                                        <p class="text-rose-200 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="no_hp" class="block text-sm font-medium text-emerald-50 tracking-wide">
                                        Nomor Handphone
                                    </label>
                                    <input
                                        type="tel"
                                        id="no_hp"
                                        name="no_hp"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl bg-emerald-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:border-transparent transition-all duration-150"
                                        placeholder="08xxxxxxxxxx"
                                        onblur="sanitizeInput(this)"
                                    >
                                    @error('no_hp')
                                        <p class="text-rose-200 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="email" class="block text-sm font-medium text-emerald-50 tracking-wide">
                                        Email <span class="text-emerald-200/80">(Opsional)</span>
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="w-full px-4 py-3 rounded-2xl bg-emerald-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:border-transparent transition-all duration-150"
                                        placeholder="nama@email.com (boleh kosong)"
                                        onblur="sanitizeInput(this)"
                                    >
                                    @error('email')
                                        <p class="text-rose-200 text-sm">{{ $message }}</p>
                                    @enderror
                                    <p class="text-xs text-emerald-100/70 mt-1">
                                        Email digunakan untuk menerima notifikasi status pengajuan surat.
                                    </p>
                                </div>

                                <div class="space-y-2">
                                    <label for="password" class="block text-sm font-medium text-emerald-50 tracking-wide">
                                        Password
                                    </label>
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        required
                                        minlength="6"
                                        class="w-full px-4 py-3 rounded-2xl bg-emerald-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:border-transparent transition-all duration-150"
                                        placeholder="Minimal 6 karakter"
                                        onblur="sanitizeInput(this)"
                                    >
                                    @error('password')
                                        <p class="text-rose-200 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="kode_rahasia" class="block text-sm font-medium text-emerald-50 tracking-wide">
                                        Kode Rahasia Admin <span class="text-emerald-200/80">(Opsional)</span>
                                    </label>
                                    <input
                                        type="password"
                                        id="kode_rahasia"
                                        name="kode_rahasia"
                                        class="w-full px-4 py-3 rounded-2xl bg-emerald-950/60 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:border-transparent transition-all duration-150"
                                        placeholder="Kosongkan jika mendaftar sebagai warga"
                                        onblur="sanitizeInput(this)"
                                    >
                                    <p class="text-xs text-emerald-100/70 mt-1">
                                        Isi jika Anda adalah staf atau admin desa untuk mendapatkan akses khusus.
                                    </p>
                                </div>
                            </div>

                        <div class="space-y-4">
                            <button
                                type="submit"
                                class="w-full flex items-center justify-center gap-3 bg-emerald-400 hover:bg-emerald-300 text-emerald-950 font-semibold text-base sm:text-lg py-3.5 rounded-2xl shadow-xl shadow-emerald-500/30 transition-all duration-200 hover:scale-[1.01]"
                            >
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    Daftar Sekarang
                                </button>
                        <p class="text-xs sm:text-sm text-emerald-100/70 text-center">
                            Dengan mendaftar, Anda menyetujui
                            <a href="#" class="text-emerald-200 hover:text-emerald-100 underline underline-offset-4">Syarat & Ketentuan</a>
                            serta
                            <a href="#" class="text-emerald-200 hover:text-emerald-100 underline underline-offset-4">Kebijakan Privasi</a>
                            Desa Sungai Meranti.
                        </p>
                        <p class="text-sm text-emerald-100/80 text-center">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="font-semibold text-emerald-200 hover:text-emerald-100 underline underline-offset-4">
                                Masuk di sini
                            </a>
                        </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('nik').focus();

document.getElementById('nik').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 16) {
        value = value.substring(0, 16);
    }
    e.target.value = value;
});

document.getElementById('no_hp').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 15) {
        value = value.substring(0, 15);
    }
    e.target.value = value;
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

function validateForm() {
    const alamat = document.getElementById('alamat').value.trim();
    const noHp = document.getElementById('no_hp').value.trim();

    let isValid = true;

    if (alamat.length < 10) {
        showError('alamat', 'Alamat minimal 10 karakter');
        isValid = false;
    } else {
        clearError('alamat');
    }

    if (noHp.length < 10 || noHp.length > 15) {
        showError('no_hp', 'Nomor HP harus 10-15 digit');
        isValid = false;
    } else {
        clearError('no_hp');
    }

    return isValid;
}

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    let errorDiv = field.parentNode.querySelector('.text-rose-200');

    if (!errorDiv) {
        errorDiv = document.createElement('p');
        errorDiv.className = 'text-rose-200 text-sm mt-1';
        field.parentNode.appendChild(errorDiv);
    }
    errorDiv.textContent = message;
    field.classList.add('border-rose-300');
}

function clearError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorDiv = field.parentNode.querySelector('.text-rose-200');
    if (errorDiv) {
        errorDiv.remove();
    }
    field.classList.remove('border-rose-300');
}
</script>
@endsection