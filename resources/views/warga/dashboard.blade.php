@extends('layout.app')

@section('title', 'Dashboard Warga - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Dashboard Warga</h1>
                    <p class="text-gray-600 mt-1">Selamat datang, {{ $user->nama }}</p>
                </div>
                <div class="mt-2">
                    <a href="{{ route('warga.tutorial-pengajuan') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-700 font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Tutorial Pengajuan
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <a href="{{ route('administrasi') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-3 rounded-lg transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Administrasi Online
            </a>
            <a href="https://desasungaimeranti.id/" target="_blank" class="inline-flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 text-white font-semibold px-4 py-3 rounded-lg transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                </svg>
                Website Desa
            </a>
        </div>

        <!-- Notifications -->
        @if(session('success'))
            <div class="mb-4 rounded-md border border-blue-200 bg-blue-50 px-4 py-3 text-blue-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Pengajuan</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $summary['total'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Menunggu</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $summary['menunggu'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Disetujui</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $summary['disetujui'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Pengajuan -->
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Pengajuan Terbaru</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Daftar pengajuan surat Anda yang terbaru</p>
            </div>
            <ul class="divide-y divide-gray-200">
                @if(isset($pengajuanList) && $pengajuanList->count() > 0)
                    @foreach($pengajuanList as $pengajuan)
                        <li>
                            <a href="{{ route('warga.pengajuan.show', $pengajuan) }}" class="block hover:bg-gray-50">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <p class="text-sm font-medium text-blue-600 truncate">
                                                #{{ $pengajuan->id }} - {{ $pengajuan->jenis->nama_surat ?? 'Unknown' }}
                                            </p>
                                            <div class="ml-2 flex-shrink-0 flex">
                                                @php
                                                    $statusClasses = [
                                                        'menunggu' => 'bg-blue-100 text-blue-700',
                                                        'menunggu_verifikasi' => 'bg-indigo-100 text-indigo-700',
                                                        'disetujui' => 'bg-blue-100 text-blue-700',
                                                        'ditolak' => 'bg-rose-100 text-rose-700',
                                                    ];
                                                    $statusClass = $statusClasses[$pengajuan->status] ?? 'bg-gray-100 text-gray-700';
                                                @endphp
                                                <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                                    @switch($pengajuan->status)
                                                        @case('menunggu')
                                                            Menunggu
                                                            @break
                                                        @case('menunggu_verifikasi')
                                                            Menunggu Verifikasi
                                                            @break
                                                        @case('disetujui')
                                                            Disetujui
                                                            @break
                                                        @case('ditolak')
                                                            Ditolak
                                                            @break
                                                        @default
                                                            {{ $pengajuan->status }}
                                                    @endswitch
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $pengajuan->tanggal_pengajuan instanceof \Carbon\Carbon ? $pengajuan->tanggal_pengajuan->format('d/m/Y') : $pengajuan->tanggal_pengajuan }}
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                {{ $pengajuan->pemohon->nama ?? 'Unknown' }}
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <a href="{{ route('warga.pengajuan.show', $pengajuan) }}"
                                               class="inline-flex items-center rounded-md border border-blue-200 bg-blue-50 px-3 py-1.5 text-xs font-medium text-blue-700 hover:bg-blue-100 transition">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="px-4 py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pengajuan</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai dengan mengajukan surat pertama Anda.</p>
                        <div class="mt-6">
                            <a href="{{ route('administrasi') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Ajukan Surat
                            </a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection