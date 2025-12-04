@extends('layout.app')

@section('title', 'Jenis Surat - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-center mb-4">
                <a href="{{ route('warga.tutorial-pengajuan') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-700 font-medium bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-lg transition duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Tutorial Pengajuan
                </a>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 text-center">Jenis Surat Administrasi</h1>
            <p class="text-gray-600 text-center mt-2">Pilih jenis surat yang ingin Anda ajukan</p>
            
            <!-- Button Surat Pernyataan - Posisi Baru -->
            <div class="flex justify-center mt-6">
                <button onclick="openSuratPernyataanModal()"
                        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Download Template Surat Pernyataan
                </button>
            </div>
        </div>

        <!-- Jenis Surat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jenisSuratList as $jenis)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <!-- Card Header - Judul dan button dalam satu card -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-6 flex items-center justify-between">
                        <h3 class="text-lg font-bold text-white leading-tight flex-1">{{ $jenis->nama_surat }}</h3>
                        <a href="{{ route('pengajuan.create') }}?jenis={{ $jenis->id }}"
                           class="ml-4 bg-white hover:bg-gray-100 text-blue-600 font-semibold py-2 px-4 rounded-lg transition-colors duration-200 flex items-center gap-2 whitespace-nowrap">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Ajukan
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if($jenisSuratList->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada jenis surat</h3>
                <p class="mt-1 text-sm text-gray-500">Jenis surat administrasi akan segera ditambahkan.</p>
            </div>
        @endif
    </div>
</div>

<!-- Modal Surat Pernyataan -->
<div id="suratPernyataanModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-lg bg-white">
        <!-- Modal Header -->
        <div class="flex items-center justify-between pb-3 border-b">
            <h3 class="text-xl font-bold text-gray-900">Download Surat Pernyataan</h3>
            <button onclick="closeSuratPernyataanModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="mt-4">
            <p class="text-gray-600 mb-4">Pilih template surat pernyataan yang ingin Anda download:</p>
            
            <div class="space-y-3">
                <!-- Surat Pernyataan Umum -->
                <a href="{{ route('download.surat.pernyataan', 'SURAT PERNYATAAN.docx') }}"
                   class="flex items-center justify-between p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-200 group">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Surat Pernyataan Umum</h4>
                            <p class="text-sm text-gray-600">Template surat pernyataan umum</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-blue-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </a>

                <!-- Surat Pernyataan Nikah -->
                <a href="{{ route('download.surat.pernyataan', 'SURAT PERNYATAA NIKAH.docx') }}"
                   class="flex items-center justify-between p-4 bg-green-50 hover:bg-green-100 rounded-lg transition duration-200 group">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Surat Pernyataan Nikah</h4>
                            <p class="text-sm text-gray-600">Template surat pernyataan untuk nikah</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-green-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </a>

                <!-- Pernyataan Meninggal -->
                <a href="{{ route('download.surat.pernyataan', 'PERNYATAAN MENINGGAL.docx') }}"
                   class="flex items-center justify-between p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition duration-200 group">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900">Pernyataan Meninggal</h4>
                            <p class="text-sm text-gray-600">Template surat pernyataan meninggal</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-purple-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </a>
            </div>

            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                <p class="text-sm text-yellow-800">
                    <strong>Catatan:</strong> Setelah download, silakan isi template sesuai kebutuhan Anda dan upload kembali saat mengajukan surat.
                </p>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="flex justify-end mt-5 pt-3 border-t">
            <button onclick="closeSuratPernyataanModal()"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition duration-200">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
function openSuratPernyataanModal() {
    document.getElementById('suratPernyataanModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeSuratPernyataanModal() {
    document.getElementById('suratPernyataanModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('suratPernyataanModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeSuratPernyataanModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeSuratPernyataanModal();
    }
});
</script>
@endsection