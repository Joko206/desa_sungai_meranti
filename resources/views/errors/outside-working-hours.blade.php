@extends('layout.app')

@section('title', 'Akses Ditolak - Luar Jam Kerja')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50">
    <div class="bg-white p-8 rounded shadow text-center">
        <h1 class="text-2xl font-bold text-red-600 mb-4">Akses Ditolak</h1>
        <p class="text-gray-700 mb-2">Fitur admin hanya dapat diakses pada jam kerja:</p>
        <p class="text-blue-700 font-semibold mb-4">08:00 - 16:00 WIB</p>
        <a href="/" class="text-blue-600 underline">Kembali ke Beranda</a>
    </div>
</div>
@endsection
