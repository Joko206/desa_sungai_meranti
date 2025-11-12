@extends('layout.app')

@section('title', 'Profil Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-50">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-900 via-blue-800 to-blue-700 overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(16, 38, 58, 0.45), rgba(16, 38, 58, 0.45)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center;"></div>

        <div class="relative z-10 container mx-auto px-4 py-16 lg:py-24">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Profil Desa</h1>
                <h2 class="text-2xl md:text-3xl font-light mb-4">Sungai Meranti</h2>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                    Kecamatan Pinggir, Kabupaten Bengkalis, Provinsi Riau
                </p>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Letak Geografis -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Letak Geografis</h3>
                    </div>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p>Desa Sungai Meranti terletak di Kecamatan Pinggir, Kabupaten Bengkalis, Provinsi Riau. Desa ini merupakan bagian dari wilayah pesisir timur Sumatera yang kaya akan potensi alam dan budaya.</p>
                        <div class="grid md:grid-cols-2 gap-6 mt-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Koordinat</h4>
                                <p class="text-sm text-gray-600">1°15'30.2"N 102°22'45.6"E</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Luas Wilayah</h4>
                                <p class="text-sm text-gray-600">± 15.5 km²</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sejarah -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Sejarah</h3>
                    </div>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p>Desa Sungai Meranti didirikan pada tahun 1970-an sebagai bagian dari program transmigrasi pemerintah. Nama "Sungai Meranti" diambil dari sungai yang mengalir di wilayah desa ini, yang dikelilingi oleh pohon meranti yang tumbuh subur.</p>
                        <p>Awalnya desa ini dihuni oleh para transmigran dari berbagai daerah di Indonesia, yang kemudian berkembang menjadi komunitas yang harmonis dan mandiri. Seiring berjalannya waktu, Desa Sungai Meranti telah berkembang pesat dalam berbagai aspek kehidupan masyarakat.</p>
                    </div>
                </div>

                <!-- Visi Misi -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Visi & Misi</h3>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg p-6 border-l-4 border-purple-500">
                            <h4 class="text-lg font-bold text-purple-800 mb-3">Visi</h4>
                            <p class="text-gray-700">"Terwujudnya Desa Sungai Meranti yang Mandiri, Sejahtera, dan Berkelanjutan"</p>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h5 class="font-semibold text-gray-900 mb-2">Misi Utama:</h5>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>• Meningkatkan kesejahteraan masyarakat</li>
                                    <li>• Mengembangkan potensi ekonomi lokal</li>
                                    <li>• Melestarikan budaya dan lingkungan</li>
                                    <li>• Meningkatkan pelayanan publik</li>
                                </ul>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h5 class="font-semibold text-gray-900 mb-2">Program Unggulan:</h5>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>• Pertanian berbasis teknologi</li>
                                    <li>• Pengembangan UMKM</li>
                                    <li>• Pendidikan berkualitas</li>
                                    <li>• Kesehatan prima</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="space-y-6">

                <!-- Statistik -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Statistik Desa
                    </h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Total Penduduk</span>
                            <span class="text-lg font-bold text-blue-600">6,243</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Kepala Keluarga</span>
                            <span class="text-lg font-bold text-green-600">756</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Dusun</span>
                            <span class="text-lg font-bold text-purple-600">23</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">RT/RW</span>
                            <span class="text-lg font-bold text-orange-600">67/23</span>
                        </div>
                    </div>
                </div>

                <!-- Pemerintah Desa -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Pemerintah Desa
                    </h4>
                    <div class="space-y-4">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h5 class="font-semibold text-gray-900">Kepala Desa</h5>
                            <p class="text-sm text-gray-600">H. Ahmad Surya, S.Pd</p>
                        </div>
                        <div class="border-t pt-4">
                            <h6 class="font-medium text-gray-900 mb-2">Perangkat Desa</h6>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Sekretaris Desa</li>
                                <li>• Kaur Keuangan</li>
                                <li>• Kaur Umum</li>
                                <li>• Kaur Pemerintahan</li>
                                <li>• 3 Kepala Dusun</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Kontak & Informasi
                    </h4>
                    <div class="space-y-3">
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <svg class="w-4 h-4 text-gray-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">Alamat</p>
                                <p class="text-sm text-gray-900">Jl. Desa Sungai Meranti No.1</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <svg class="w-4 h-4 text-gray-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">Telepon</p>
                                <p class="text-sm text-gray-900">(0761) 123-456</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <svg class="w-4 h-4 text-gray-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">Email</p>
                                <p class="text-sm text-gray-900">info@desasungaimeranti.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-blue-600 rounded-xl shadow-lg p-6 text-white">
                    <h4 class="text-lg font-bold mb-4">Layanan Cepat</h4>
                    <div class="space-y-3">
                        <a href="{{ route('administrasi') }}" class="block w-full bg-blue-500 hover:bg-blue-400 text-white px-4 py-3 rounded-lg text-center font-medium transition-colors">
                            Buat Surat Online
                        </a>
                        <a href="{{ route('warga.tutorial-pengajuan') }}" class="block w-full bg-white/20 hover:bg-white/30 text-white px-4 py-3 rounded-lg text-center font-medium transition-colors">
                            Panduan Penggunaan
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection