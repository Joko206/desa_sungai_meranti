@extends('layout.app')

@section('title', 'Tutorial Pengajuan Surat - Desa Sungai Meranti')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Tutorial Pengajuan Surat</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Panduan lengkap cara mengajukan surat administrasi secara online di Desa Sungai Meranti
            </p>
        </div>

        <!-- Navigation Steps -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Langkah-langkah Pengajuan</h2>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <!-- Step 1 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-semibold">
                            1
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Masuk ke Sistem</h3>
                            <p class="text-gray-600 mb-3">Login ke akun warga Anda atau daftar akun baru jika belum memiliki.</p>
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <p class="text-blue-800 text-sm">
                                    <strong>Tips:</strong> Pastikan data diri Anda sudah lengkap dan terverifikasi untuk процес yang lebih cepat.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-semibold">
                            2
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Pilih Menu Administrasi</h3>
                            <p class="text-gray-600 mb-3">Klik tombol "Administrasi Online" di dashboard atau navigasi utama.</p>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                <p class="text-gray-700 text-sm">
                                    Anda akan melihat daftar jenis surat yang tersedia untuk mengajukan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-semibold">
                            3
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Pilih Jenis Surat</h3>
                            <p class="text-gray-600 mb-3">Klik pada jenis surat yang ingin Anda ajukan. Baca deskripsi dan syaratnya dengan teliti.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                                    <h4 class="font-medium text-yellow-800 mb-1">Perhatikan Syarat</h4>
                                    <p class="text-yellow-700 text-sm">Setiap jenis surat memiliki persyaratan dokumen yang berbeda</p>
                                </div>
                                <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                                    <h4 class="font-medium text-green-800 mb-1">Cek Template</h4>
                                    <p class="text-green-700 text-sm">Dokumen template tersedia untuk referensi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-semibold">
                            4
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Lihat Syarat Dokumen</h3>
                            <p class="text-gray-600 mb-3">Klik "Lihat Syarat" untuk melihat daftar dokumen yang diperlukan.</p>
                            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                <h4 class="font-medium text-red-800 mb-2">Persiapan Dokumen</h4>
                                <ul class="text-red-700 text-sm space-y-1">
                                    <li>• Pastikan semua dokumen dalam format PDF, JPG, atau PNG</li>
                                    <li>• Ukuran file maksimal 2MB per dokumen</li>
                                    <li>• Dokumen harus jelas dan terbaca</li>
                                    <li>• Siapkan fotocopi dan dokumen asli</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-semibold">
                            5
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Isi Formulir Pengajuan</h3>
                            <p class="text-gray-600 mb-3">Klik "Ajukan Surat Ini" dan lengkapi formulir dengan data yang benar.</p>
                            <div class="space-y-3">
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                    <h4 class="font-medium text-blue-800 mb-1">Data Pemohon</h4>
                                    <p class="text-blue-700 text-sm">Form akan menyesuaikan berdasarkan jenis surat yang dipilih</p>
                                </div>
                                <div class="bg-purple-50 border border-purple-200 rounded-lg p-3">
                                    <h4 class="font-medium text-purple-800 mb-1">Auto Fill</h4>
                                    <p class="text-purple-700 text-sm">Data diri akan terisi otomatis jika sudah lengkap</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-semibold">
                            6
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Upload Dokumen</h3>
                            <p class="text-gray-600 mb-3">Upload semua dokumen persyaratan sesuai dengan nama yang diminta.</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-6 h-6 text-gray-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-xs text-gray-600">PDF</p>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-6 h-6 text-gray-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-xs text-gray-600">JPG/PNG</p>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-6 h-6 text-gray-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-xs text-gray-600">DOCX</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 7 -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-semibold">
                            7
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Konfirmasi dan Submit</h3>
                            <p class="text-gray-600 mb-3">Tinjau kembali semua data, centang persetujuan syarat, lalu klik "Ajukan Surat".</p>
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                <h4 class="font-medium text-green-800 mb-2">Konfirmasi Akhir</h4>
                                <ul class="text-green-700 text-sm space-y-1">
                                    <li>• Periksa kembali semua data yang diisi</li>
                                    <li>• Pastikan semua dokumen terupload dengan benar</li>
                                    <li>• Centang persetujuan syarat dan ketentuan</li>
                                    <li>• Klik "Ajukan Surat" untuk submit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Tracking -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Melacak Status Pengajuan</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3">Status Pengajuan</h3>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Menunggu - Pengajuan sedang menunggu verifikasi</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Verifikasi - Sedang proses verifikasi dokumen</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Disetujui - Pengajuan disetujui dan surat siap</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Ditolak - Pengajuan ditolak, cek catatan</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3">Cara Cek Status</h3>
                        <ol class="text-sm text-gray-700 space-y-2">
                            <li>1. Masuk ke Dashboard Warga</li>
                            <li>2. Lihat daftar pengajuan Anda</li>
                            <li>3. Klik "Detail" untuk info lengkap</li>
                            <li>4. Pantau status secara berkala</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Pertanyaan Umum</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="border-b border-gray-200 pb-4">
                        <h4 class="font-medium text-gray-800 mb-2">Berapa lama proses pengajuan surat?</h4>
                        <p class="text-gray-600 text-sm">Proses pengajuan biasanya memakan waktu 1-3 hari kerja, tergantung jenis surat dan kelengkapan dokumen.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-4">
                        <h4 class="font-medium text-gray-800 mb-2">Apakah ada biaya administrasi?</h4>
                        <p class="text-gray-600 text-sm">Algunos jenis surat mungkin memiliki biaya administrasi. Informasi akan ditampilkan saat proses pengajuan.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-4">
                        <h4 class="font-medium text-gray-800 mb-2">Bagaimana jika pengajuan ditolak?</h4>
                        <p class="text-gray-600 text-sm">Jika pengajuan ditolak, Anda akan mendapatkan informasi alasan penolakan. Anda dapat mengajukan kembali dengan dokumen yang lebih lengkap.</p>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800 mb-2">Dimana saya bisa mengambil surat yang sudah jadi?</h4>
                        <p class="text-gray-600 text-sm">Surat yang sudah jadi dapat diambil di kantor desa dengan membawa KTP asli. Info lengkap akan dikirim melalui notifikasi.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-emerald-800 mb-2">Butuh Bantuan?</h3>
                    <p class="text-emerald-700 text-sm mb-3">
                        Jika Anda mengalami kesulitan atau memiliki pertanyaan, silakan hubungi kami:
                    </p>
                    <div class="space-y-2 text-sm text-emerald-700">
                        <p><strong>Telepon:</strong> (0761) 123-456</p>
                        <p><strong>Email:</strong> info@desasungaimeranti.id</p>
                        <p><strong>Jam Kerja:</strong> Senin-Jumat, 08:00-16:00 WIB</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center mt-8 space-y-4">
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('administrasi') }}" class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Mulai Ajukan Surat
                </a>
                <a href="{{ route('warga.dashboard') }}" class="inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-lg transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection