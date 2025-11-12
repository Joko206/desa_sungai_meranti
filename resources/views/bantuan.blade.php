@extends('layout.app')

@section('title', 'Bantuan & FAQ - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-50">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-600 via-blue-800 to-blue-700 overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(16, 38, 58, 0.45), rgba(16, 38, 58, 0.45)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center;"></div>

        <div class="relative z-10 container mx-auto px-4 py-16 lg:py-20">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Bantuan & FAQ</h1>
                <h2 class="text-xl md:text-2xl font-light mb-4">Panduan Lengkap Penggunaan Sistem</h2>
                <p class="text-lg text-blue-100 max-w-2xl mx-auto">
                    Temukan jawaban atas pertanyaan umum dan panduan penggunaan sistem informasi desa
                </p>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" id="faq-search" placeholder="Cari pertanyaan atau kata kunci..."
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 pb-16">
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Kategori Bantuan</h3>
                    <nav class="space-y-2">
                        <a href="#pengajuan" class="block w-full text-left px-4 py-3 text-blue-700 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors category-link" data-category="pengajuan">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Pengajuan Surat
                            </div>
                        </a>
                        <a href="#akun" class="block w-full text-left px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors category-link" data-category="akun">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Akun & Profil
                            </div>
                        </a>
                        <a href="#berkas" class="block w-full text-left px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors category-link" data-category="berkas">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Upload Berkas
                            </div>
                        </a>
                        <a href="#tracking" class="block w-full text-left px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors category-link" data-category="tracking">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                                Tracking Pengajuan
                            </div>
                        </a>
                        <a href="#kontak" class="block w-full text-left px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors category-link" data-category="kontak">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Hubungi Admin
                            </div>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- FAQ Content -->
            <div class="lg:col-span-2">
                <div class="space-y-6">

                    <!-- Pengajuan Surat Section -->
                    <div id="pengajuan-section" class="faq-section">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Pengajuan Surat
                                </h2>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Bagaimana cara mengajukan surat?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Ikuti langkah berikut untuk mengajukan surat:</p>
                                        <ol class="list-decimal list-inside mt-2 space-y-1 text-gray-700">
                                            <li>Login ke akun Anda</li>
                                            <li>Pilih menu "Buat Surat" atau "Administrasi Online"</li>
                                            <li>Pilih jenis surat yang diinginkan</li>
                                            <li>Isi formulir dengan data yang akurat</li>
                                            <li>Upload berkas persyaratan yang diperlukan</li>
                                            <li>Klik "Ajukan" untuk mengirim pengajuan</li>
                                        </ol>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Berapa lama proses pengajuan surat?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Waktu proses pengajuan surat bervariasi tergantung jenis surat:</p>
                                        <ul class="list-disc list-inside mt-2 space-y-1 text-gray-700">
                                            <li><strong>Surat Keterangan:</strong> 1-3 hari kerja</li>
                                            <li><strong>Surat Pengantar:</strong> 1-2 hari kerja</li>
                                            <li><strong>Surat Kematian/Kelahiran:</strong> 2-5 hari kerja</li>
                                            <li><strong>Surat yang memerlukan verifikasi khusus:</strong> 3-7 hari kerja</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Apa saja berkas yang perlu disiapkan?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Berkas yang diperlukan bervariasi per jenis surat, namun umumnya meliputi:</p>
                                        <ul class="list-disc list-inside mt-2 space-y-1 text-gray-700">
                                            <li>Foto copy KTP pemohon</li>
                                            <li>Foto copy KK (Kartu Keluarga)</li>
                                            <li>Surat pengantar RT/RW (jika diperlukan)</li>
                                            <li>Berkas pendukung lainnya sesuai jenis surat</li>
                                        </ul>
                                        <p class="text-gray-700 mt-3"><strong>Catatan:</strong> Pastikan semua berkas dalam format PDF atau JPG dengan ukuran maksimal 10MB per file.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Akun & Profil Section -->
                    <div id="akun-section" class="faq-section hidden">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Akun & Profil
                                </h2>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Bagaimana cara mengubah data profil?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Untuk mengubah data profil:</p>
                                        <ol class="list-decimal list-inside mt-2 space-y-1 text-gray-700">
                                            <li>Login ke dashboard Anda</li>
                                            <li>Klik menu profil atau "Edit Profil"</li>
                                            <li>Perbarui data yang diperlukan</li>
                                            <li>Klik "Simpan Perubahan"</li>
                                        </ol>
                                        <p class="text-gray-700 mt-3"><strong>Penting:</strong> NIK dan data identitas lainnya tidak dapat diubah. Jika ada kesalahan, hubungi admin desa.</p>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Bagaimana cara reset password?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Untuk reset password:</p>
                                        <ol class="list-decimal list-inside mt-2 space-y-1 text-gray-700">
                                            <li>Klik "Lupa Password" di halaman login</li>
                                            <li>Masukkan email yang terdaftar</li>
                                            <li>Cek email untuk kode OTP</li>
                                            <li>Masukkan kode OTP</li>
                                            <li>Buat password baru</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Berkas Section -->
                    <div id="berkas-section" class="faq-section hidden">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    Upload Berkas
                                </h2>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Format berkas apa yang didukung?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Format berkas yang didukung:</p>
                                        <ul class="list-disc list-inside mt-2 space-y-1 text-gray-700">
                                            <li><strong>Gambar:</strong> JPG, JPEG, PNG</li>
                                            <li><strong>Dokumen:</strong> PDF</li>
                                            <li><strong>Office:</strong> DOC, DOCX (Microsoft Word)</li>
                                        </ul>
                                        <p class="text-gray-700 mt-3"><strong>Ukuran maksimal:</strong> 10MB per berkas</p>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Kenapa berkas saya ditolak?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Berkas mungkin ditolak karena:</p>
                                        <ul class="list-disc list-inside mt-2 space-y-1 text-gray-700">
                                            <li>Gambar tidak jelas atau blur</li>
                                            <li>Teks tidak terbaca</li>
                                            <li>Berkas tidak sesuai dengan persyaratan</li>
                                            <li>Ukuran file terlalu besar</li>
                                            <li>Format file tidak didukung</li>
                                        </ul>
                                        <p class="text-gray-700 mt-3">Pastikan berkas dalam kondisi baik dan sesuai spesifikasi sebelum upload.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tracking Section -->
                    <div id="tracking-section" class="faq-section hidden">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-orange-600 to-orange-700 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                    </svg>
                                    Tracking Pengajuan
                                </h2>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Bagaimana cara melihat status pengajuan?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <p class="text-gray-700 mt-2">Untuk melihat status pengajuan:</p>
                                        <ol class="list-decimal list-inside mt-2 space-y-1 text-gray-700">
                                            <li>Login ke dashboard Anda</li>
                                            <li>Pilih menu "Pengajuan Saya" atau "Riwayat"</li>
                                            <li>Klik detail pada pengajuan yang ingin dilihat</li>
                                            <li>Status akan ditampilkan dengan badge warna</li>
                                        </ol>
                                    </div>
                                </div>

                                <div class="faq-item">
                                    <button class="w-full text-left flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors faq-toggle">
                                        <span class="font-medium text-gray-900">Apa arti status pengajuan?</span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden px-4 pb-4">
                                        <div class="mt-2 space-y-2">
                                            <div class="flex items-center space-x-3">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                                                <span class="text-gray-700">Pengajuan sedang ditinjau admin</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Disetujui</span>
                                                <span class="text-gray-700">Pengajuan disetujui, sedang proses generate surat</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
                                                <span class="text-gray-700">Pengajuan ditolak, cek alasan di detail</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                                <span class="text-gray-700">Surat telah selesai dan dapat diunduh</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak Admin Section -->
                    <div id="kontak-section" class="faq-section hidden">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Hubungi Admin
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Kontak</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="text-gray-700">Jl. Desa Sungai Meranti No.1</span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                                <span class="text-gray-700">(0761) 123-456</span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                <span class="text-gray-700">admin@desasungaimeranti.id</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Kirim Pesan</h3>
                                        <form id="contact-form" class="space-y-4">
                                            <div>
                                                <input type="text" name="nama" placeholder="Nama Anda" required
                                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <input type="email" name="email" placeholder="Email Anda" required
                                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <textarea name="pesan" rows="4" placeholder="Pesan Anda..." required
                                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                                            </div>
                                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors">
                                                Kirim Pesan
                                            </button>
                                        </form>
                                    </div>
                                </div>
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
    // FAQ Toggle functionality
    document.querySelectorAll('.faq-toggle').forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });

    // Category navigation
    document.querySelectorAll('.category-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Hide all sections
            document.querySelectorAll('.faq-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Remove active class from all links
            document.querySelectorAll('.category-link').forEach(l => {
                l.classList.remove('bg-blue-50', 'text-blue-700');
                l.classList.add('text-gray-700');
            });

            // Show selected section
            const category = this.getAttribute('data-category');
            document.getElementById(`${category}-section`).classList.remove('hidden');

            // Add active class to clicked link
            this.classList.remove('text-gray-700');
            this.classList.add('bg-blue-50', 'text-blue-700');

            // Scroll to section
            document.getElementById(`${category}-section`).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });

    // Search functionality
    const searchInput = document.getElementById('faq-search');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        document.querySelectorAll('.faq-item').forEach(item => {
            const question = item.querySelector('.faq-toggle span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-content').textContent.toLowerCase();

            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Contact form submission
    document.getElementById('contact-form').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;

        submitBtn.disabled = true;
        submitBtn.textContent = 'Mengirim...';

        try {
            // Simulate sending (in real app, this would be an API call)
            await new Promise(resolve => setTimeout(resolve, 2000));

            // Show success message
            alert('Pesan berhasil dikirim! Admin akan menghubungi Anda segera.');
            this.reset();
        } catch (error) {
            alert('Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    });
});
</script>
@endsection