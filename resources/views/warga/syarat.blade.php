{{-- Halaman Syarat untuk Warga (Format Sederhana) --}}
@extends('layout.app')

@section('title', 'Syarat Pengajuan Surat')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-list-check me-2"></i>
                        Syarat Pengajuan {{ $jenisSurat->nama_surat }}
                    </h4>
                    <p class="mb-0 mt-2">{{ $jenisSurat->deskripsi }}</p>
                </div>
                <div class="card-body">
                    @if($jenisSurat->syarat && is_array($jenisSurat->syarat) && count($jenisSurat->syarat) > 0)
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Perhatian:</strong> Siapkan semua dokumen berikut sebelum mengajukan surat ini.
                        </div>
                        
                        <div class="card border-warning">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="mb-0">
                                    <i class="fas fa-clipboard-list"></i> Daftar Syarat
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($jenisSurat->syarat as $index => $syarat)
                                    <div class="col-md-6 mb-3">
                                        <div class="card border-light bg-light">
                                            <div class="card-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="badge bg-primary rounded-circle me-3" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                                        {{ $index + 1 }}
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">
                                                            <i class="fas fa-file-alt text-primary me-2"></i>
                                                            {{ $syarat }}
                                                        </h6>
                                                        <small class="text-muted">
                                                            <i class="fas fa-check text-success me-1"></i>
                                                            Siapkan dokumen ini
                                                        </small>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fas fa-check-circle text-success" title="Syarat yang harus disiapkan"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Tips --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card border-info">
                                    <div class="card-header bg-info text-white">
                                        <h6 class="mb-0">
                                            <i class="fas fa-lightbulb"></i> Tips Pengajuan
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <ul class="mb-0">
                                            <li>Pastikan semua dokumen dalam kondisi baik dan terbaca</li>
                                            <li>Datang di jam kerja kantor desa (08:00 - 16:00 WIB)</li>
                                            <li>Bawa dokumen asli beserta fotocopy</li>
                                            <li>Siapkan bukti pembayaran jika ada biaya administrasi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <a href="{{ route('warga.pengajuan.create', ['jenis_surat_id' => $jenisSurat->id]) }}" class="btn btn-success btn-lg me-3">
                                    <i class="fas fa-file-medical"></i> Ajukan Surat Sekarang
                                </a>
                                <a href="{{ route('warga.jenis-surat') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Surat
                                </a>
                            </div>
                        </div>

                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-4x text-muted mb-4"></i>
                            <h5 class="text-muted">Belum ada informasi syarat yang tersedia</h5>
                            <p class="text-muted">Silakan hubungi petugas desa untuk informasi lebih lanjut.</p>
                            <div class="mt-4">
                                <a href="{{ route('warga.pengajuan.create', ['jenis_surat_id' => $jenisSurat->id]) }}" class="btn btn-primary me-3">
                                    <i class="fas fa-file-medical"></i> Ajukan Surat
                                </a>
                                <a href="{{ route('warga.jenis-surat') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Surat
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection