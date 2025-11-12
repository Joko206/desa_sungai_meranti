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
                Panduan lengkap cara mengajukan surat administrasi secara online di Sistem Informasi Desa (SID) Sungai Meranti dengan fitur canggih dan keamanan terjamin
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
                        <p class="text-gray-600 mb-4">Pastikan Anda sudah memiliki akun dan masuk ke sistem dengan NIK dan password yang benar. Sistem menggunakan autentikasi berbasis role untuk keamanan optimal.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                            <h4 class="font-medium text-blue-800 mb-1">Tips Keamanan</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Jangan pernah bagikan password Anda kepada orang lain</li>
                                <li>• Sistem menggunakan enkripsi dan rate limiting untuk keamanan</li>
                                <li>• Aktivasi akun melalui OTP email untuk verifikasi</li>
                            </ul>
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
                        <p class="text-gray-600 mb-4">Masuk ke menu Administrasi Online dan pilih jenis surat yang ingin Anda ajukan. Sistem menampilkan berbagai jenis surat dengan informasi lengkap persyaratan.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                            <h4 class="font-medium text-blue-800 mb-1">Jenis Surat Tersedia</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Surat Keterangan (Domisili, Tidak Mampu, Belum Menikah)</li>
                                <li>• Surat Pengantar (Nikah, SKCK, Izin Kerja)</li>
                                <li>• Surat Keterangan Usaha</li>
                                <li>• Template surat kustom sesuai kebutuhan desa</li>
                            </ul>
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
                        <p class="text-gray-600 mb-4">Baca dengan teliti persyaratan yang dibutuhkan untuk jenis surat yang dipilih. Sistem menampilkan syarat secara detail dan template surat.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <h4 class="font-medium text-blue-800 mb-1">Cek Template</h4>
                                <p class="text-blue-700 text-sm">Template surat Word (.docx) tersedia untuk preview dan referensi format</p>
                            </div>
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <h4 class="font-medium text-blue-800 mb-1">Dokumen Pendukung</h4>
                                <p class="text-blue-700 text-sm">KTP, KK, dan dokumen spesifik sesuai jenis surat (asli + fotocopy)</p>
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
                        <p class="text-gray-600 mb-4">Lengkapi semua data yang diminta dengan informasi yang benar dan sesuai dokumen. Sistem menggunakan form dinamis dengan validasi real-time.</p>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Data diri pemohon (NIK, nama, TTL, agama, pekerjaan)
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Alamat lengkap dan detail lokasi
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Informasi spesifik surat (data pihak terkait, detail keperluan)
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Form otomatis mendeteksi tipe field (dropdown, date, text)
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
                        <p class="text-gray-600 mb-4">Unggah foto/scan dokumen persyaratan sesuai dengan format yang diminta. Sistem memiliki validasi keamanan dan penyimpanan terenkripsi.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h4 class="font-medium text-blue-800 mb-2">Format Dokumen</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Format: JPG, PNG, atau PDF (terdeteksi otomatis)</li>
                                <li>• Ukuran maksimal: 2MB per file (kompresi otomatis)</li>
                                <li>• Validasi keamanan: anti-malware dan file type checking</li>
                                <li>• Penyimpanan: terenkripsi dengan akses terkontrol</li>
                                <li>• Preview: bisa melihat dokumen sebelum submit</li>
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
                        <p class="text-gray-600 mb-4">Tinjau kembali semua data, centang persetujuan syarat, lalu klik "Ajukan Surat". Sistem akan memproses pengajuan dengan notifikasi real-time.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h4 class="font-medium text-blue-800 mb-2">Konfirmasi Akhir</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Validasi akhir: sistem memeriksa kelengkapan data</li>
                                <li>• Preview pengajuan: lihat ringkasan sebelum submit</li>
                                <li>• Persetujuan digital: checkbox untuk syarat & ketentuan</li>
                                <li>• Submit dengan konfirmasi: modal konfirmasi akhir</li>
                                <li>• Notifikasi instan: email/SMS konfirmasi pengajuan</li>
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
                        <p class="text-gray-600 mb-4">Pantau status pengajuan Anda melalui dashboard real-time atau notifikasi email/SMS. Sistem menyediakan tracking lengkap dari pengajuan hingga selesai.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Menunggu Verifikasi - Sedang diperiksa admin</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Disetujui - Surat sedang diproses</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Surat Terbit - Siap diunduh</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Ditolak - Lihat alasan penolakan</span>
                            </div>
                        </div>
                        <div class="mt-4 bg-blue-50 border border-blue-200 rounded-lg p-3">
                            <h4 class="font-medium text-blue-800 mb-1">Fitur Monitoring</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Dashboard real-time dengan status terkini</li>
                                <li>• Notifikasi email dan SMS otomatis</li>
                                <li>• History lengkap semua pengajuan</li>
                                <li>• Download surat langsung dari dashboard</li>
                            </ul>
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

        <!-- Additional Info -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mt-8">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-green-800 mb-2">Informasi Penting</h3>
                    <ul class="text-green-700 text-sm space-y-2">
                        <li><strong>Waktu Proses:</strong> 1-3 hari kerja tergantung jenis surat</li>
                        <li><strong>Biaya:</strong> Gratis untuk surat administrasi dasar</li>
                        <li><strong>Dukungan:</strong> Helpdesk aktif Senin-Jumat 08:00-16:00 WIB</li>
                        <li><strong>Keamanan:</strong> Semua data dienkripsi dan dilindungi undang-undang</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center mt-12">
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('administrasi') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition duration-200 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Mulai Pengajuan Sekarang
                </a>
                <a href="{{ route('warga.dashboard') }}" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-blue-600 font-semibold px-6 py-3 rounded-lg border border-blue-200 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Lihat Dashboard Saya
                </a>
            </div>
        </div>
    </div>
</div>
@endsection