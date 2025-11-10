@extends('layout.app')

@section('title', 'Tutorial Pengajuan - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-50 to-blue-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Tutorial Pengajuan Surat</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Panduan lengkap cara mengajukan surat administrasi secara online di simadesa Desa Sungai Meranti
            </p>
        </div>

        <!-- Steps -->
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Step 1 -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-semibold">
                        1
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Masuk ke Akun</h3>
                        <p class="text-gray-600 mb-4"> Pastikan Anda sudah memiliki akun dan masuk ke sistem dengan NIK dan password yang benar.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                            <h4 class="font-medium text-blue-800 mb-1">Tips Keamanan</h4>
                            <p class="text-blue-700 text-sm">Jangan pernah bagikan password Anda kepada orang lain</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-semibold">
                        2
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Pilih Jenis Surat</h3>
                        <p class="text-gray-600 mb-4">Masuk ke menu Administrasi Online dan pilih jenis surat yang ingin Anda ajukan.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                            <h4 class="font-medium text-blue-800 mb-1">Jenis Surat Tersedia</h4>
                            <p class="text-blue-700 text-sm">Dapat berupa Surat Keterangan, Surat Pengantar, atau surat lainnya</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-semibold">
                        3
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Cek Persyaratan</h3>
                        <p class="text-gray-600 mb-4">Baca dengan teliti persyaratan yang dibutuhkan untuk jenis surat yang dipilih.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <h4 class="font-medium text-blue-800 mb-1">Cek Template</h4>
                                <p class="text-blue-700 text-sm">Dokumen template tersedia untuk referensi</p>
                            </div>
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <h4 class="font-medium text-blue-800 mb-1">Dokumen Pendukung</h4>
                                <p class="text-blue-700 text-sm">Pastikan dokumen asli dan fotocopy lengkap</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-semibold">
                        4
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Isi Form Data</h3>
                        <p class="text-gray-600 mb-4">Lengkapi semua data yang diminta dengan informasi yang benar dan sesuai dokumen.</p>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Data diri pemohon
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Alamat lengkap dan jelas
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Detail informasi spesifik
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-semibold">
                        5
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Upload Dokumen</h3>
                        <p class="text-gray-600 mb-4">Unggah foto/scan dokumen persyaratan sesuai dengan format yang diminta.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h4 class="font-medium text-blue-800 mb-2">Format Dokumen</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Format: JPG, PNG, atau PDF</li>
                                <li>• Ukuran maksimal: 2MB per file</li>
                                <li>• Pastikan dokumen terbaca dengan jelas</li>
                                <li>• Dokumen harus masih berlaku</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 6 -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-semibold">
                        6
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Review & Submit</h3>
                        <p class="text-gray-600 mb-4">Tinjau kembali semua data, centang persetujuan syarat, lalu klik "Ajukan Surat".</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h4 class="font-medium text-blue-800 mb-2">Konfirmasi Akhir</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Periksa kembali semua data yang diisi</li>
                                <li>• Pastikan dokumen terupload dengan benar</li>
                                <li>• Centang persetujuan syarat dan ketentuan</li>
                                <li>• Klik "Ajukan Surat" untuk submit</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 7 -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-semibold">
                        7
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Monitoring Status</h3>
                        <p class="text-gray-600 mb-4"> pantau status pengajuan Anda melalui dashboard atau notifikasi email/SMS.</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Diajukan - Pengajuan sedang diproses</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Disetujui - Pengajuan disetujui dan surat siap</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Ditolak - Ada Revisi atau dokumen kurang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mt-12">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-800 mb-2">Butuh Bantuan?</h3>
                    <p class="text-blue-700 text-sm mb-3">
                        Jika Anda mengalami kesulitan atau memiliki pertanyaan, silakan hubungi kami:
                    </p>
                    <div class="space-y-2 text-sm text-blue-700">
                        <p><strong>Telepon:</strong> (0761) 123-456</p>
                        <p><strong>WhatsApp:</strong> 0812-3456-7890</p>
                        <p><strong>Email:</strong> info@desasungaimeranti.id</p>
                        <p><strong>Alamat:</strong> kantor Desa Sungai Meranti</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center mt-12">
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('administrasi') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Mulai Pengajuan
                </a>
                <a href="{{ route('warga.dashboard') }}" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-blue-600 font-semibold px-6 py-3 rounded-lg border border-blue-200 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection