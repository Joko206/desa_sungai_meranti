@extends('layout.app')

@section('title', 'Kontak Admin - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-50">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-red-600 via-red-700 to-red-800 overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(16, 38, 58, 0.45), rgba(16, 38, 58, 0.45)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center;"></div>

        <div class="relative z-10 container mx-auto px-4 py-16 lg:py-20">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Hubungi Kami</h1>
                <h2 class="text-xl md:text-2xl font-light mb-4">Butuh Bantuan? Kami Siap Membantu</h2>
                <p class="text-lg text-red-100 max-w-2xl mx-auto">
                    Tim admin desa siap membantu Anda dengan segala pertanyaan dan masalah terkait layanan administrasi
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-16">
        <div class="grid lg:grid-cols-2 gap-12">

            <!-- Contact Information -->
            <div class="space-y-8">

                <!-- Contact Cards -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Informasi Kontak
                    </h3>

                    <div class="space-y-6">
                        <!-- Office Address -->
                        <div class="flex items-start space-x-4 p-4 bg-blue-50 rounded-lg">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Kantor Desa</h4>
                                <p class="text-gray-600 mt-1">Jl. Desa Sungai Meranti No.1<br>Kecamatan Pinggir, Kabupaten Bengkalis<br>Provinsi Riau 28884</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4 p-4 bg-green-50 rounded-lg">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Telepon</h4>
                                <p class="text-gray-600 mt-1">(0761) 123-456</p>
                                <p class="text-sm text-gray-500 mt-1">Senin - Jumat: 08:00 - 16:00 WIB</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-4 p-4 bg-purple-50 rounded-lg">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Email</h4>
                                <p class="text-gray-600 mt-1">admin@desasungaimeranti.id</p>
                                <p class="text-sm text-gray-500 mt-1">Kami akan merespons dalam 1-2 hari kerja</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Office Hours -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-8 h-8 mr-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Jam Operasional
                    </h3>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-3 border-b border-gray-200">
                            <span class="font-medium text-gray-900">Senin - Kamis</span>
                            <span class="text-gray-600">08:00 - 16:00 WIB</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-200">
                            <span class="font-medium text-gray-900">Jumat</span>
                            <span class="text-gray-600">08:00 - 16:30 WIB</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-200">
                            <span class="font-medium text-gray-900">Sabtu</span>
                            <span class="text-gray-600">08:00 - 14:00 WIB</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <span class="font-medium text-red-600">Minggu & Hari Libur</span>
                            <span class="text-red-600">Tutup</span>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                        <div class="flex">
                            <svg class="w-5 h-5 text-yellow-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <div>
                                <p class="text-sm text-yellow-800">
                                    <strong>Darurat:</strong> Untuk keadaan darurat di luar jam kerja, silakan hubungi nomor darurat desa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Access -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg p-8 text-white">
                    <h3 class="text-xl font-bold mb-4">Akses Cepat</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('administrasi') }}" class="block text-center p-4 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                            <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-sm font-medium">Buat Surat</span>
                        </a>
                        <a href="{{ route('warga.dashboard') }}" class="block text-center p-4 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                            <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"/>
                            </svg>
                            <span class="text-sm font-medium">Dashboard</span>
                        </a>
                        <a href="{{ route('warga.tutorial-pengajuan') }}" class="block text-center p-4 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                            <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm font-medium">Bantuan</span>
                        </a>
                        <a href="{{ route('profil') }}" class="block text-center p-4 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                            <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <span class="text-sm font-medium">Profil Desa</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-xl shadow-lg p-8 sticky top-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-8 h-8 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Kirim Pesan
                    </h3>

                    <form id="contact-form" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                                <input type="text" name="nama" id="nama" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                       placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" id="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                       placeholder="email@contoh.com">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori *</label>
                            <select name="kategori" id="kategori" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <option value="">Pilih kategori</option>
                                <option value="pengajuan">Pengajuan Surat</option>
                                <option value="akun">Masalah Akun</option>
                                <option value="berkas">Upload Berkas</option>
                                <option value="sistem">Masalah Sistem</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subjek *</label>
                            <input type="text" name="subjek" id="subjek" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                   placeholder="Jelaskan singkat masalah Anda">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan *</label>
                            <textarea name="pesan" id="pesan" rows="6" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all resize-none"
                                      placeholder="Jelaskan detail masalah atau pertanyaan Anda..."></textarea>
                            <p class="text-xs text-gray-500 mt-1">Minimal 20 karakter</p>
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="text-sm text-blue-800">
                                        <strong>Informasi:</strong> Pesan Anda akan diteruskan ke admin desa dan akan direspon dalam 1-2 hari kerja melalui email.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-btn"
                                class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white py-4 px-6 rounded-lg hover:from-red-700 hover:to-red-800 transition-all transform hover:scale-[1.02] shadow-lg hover:shadow-xl flex items-center justify-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Kirim Pesan
                        </button>
                    </form>

                    <!-- Success Message -->
                    <div id="success-message" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 text-green-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-green-800">Pesan berhasil dikirim!</h4>
                                <p class="text-sm text-green-700 mt-1">Terima kasih atas pesan Anda. Admin akan segera menghubungi Anda.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="error-message" class="hidden mt-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 text-red-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-medium text-red-800">Terjadi kesalahan</h4>
                                <p class="text-sm text-red-700 mt-1">Mohon coba lagi atau hubungi kami langsung.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Validation
        const nama = document.getElementById('nama').value.trim();
        const email = document.getElementById('email').value.trim();
        const kategori = document.getElementById('kategori').value;
        const subjek = document.getElementById('subjek').value.trim();
        const pesan = document.getElementById('pesan').value.trim();

        if (!nama || !email || !kategori || !subjek || !pesan) {
            showError('Mohon lengkapi semua field yang wajib diisi.');
            return;
        }

        if (pesan.length < 20) {
            showError('Pesan minimal 20 karakter.');
            return;
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showError('Format email tidak valid.');
            return;
        }

        // Show loading state
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Mengirim...
        `;

        try {
            // Simulate API call (replace with actual API endpoint)
            const response = await fetch('/api/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    nama, email, kategori, subjek, pesan
                })
            });

            if (response.ok) {
                // Show success
                form.reset();
                showSuccess();
            } else {
                throw new Error('Failed to send message');
            }

        } catch (error) {
            showError('Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });

    function showSuccess() {
        successMessage.classList.remove('hidden');
        errorMessage.classList.add('hidden');
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function showError(message) {
        errorMessage.classList.remove('hidden');
        successMessage.classList.add('hidden');
        errorMessage.querySelector('p').textContent = message;
        errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Character count for message
    const pesanTextarea = document.getElementById('pesan');
    const charCount = document.createElement('div');
    charCount.className = 'text-xs text-gray-500 mt-1 text-right';
    charCount.textContent = '0/20 karakter minimum';
    pesanTextarea.parentNode.appendChild(charCount);

    pesanTextarea.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = `${count}/20 karakter minimum`;
        charCount.className = count < 20 ? 'text-xs text-red-500 mt-1 text-right' : 'text-xs text-green-500 mt-1 text-right';
    });
});
</script>
@endsection