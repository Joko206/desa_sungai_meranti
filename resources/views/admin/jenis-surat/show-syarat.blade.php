{{-- View untuk Menampilkan Syarat (Array Sederhana) --}}
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Syarat Pengajuan Surat</h5>
        <button class="btn btn-sm btn-outline-primary" onclick="editSyarat()">
            <i class="fas fa-edit"></i> Edit Syarat
        </button>
    </div>
    <div class="card-body">
        @if($jenisSurat->syarat && is_array($jenisSurat->syarat) && count($jenisSurat->syarat) > 0)
            <h6 class="text-primary mb-3">
                <i class="fas fa-list-check"></i> Daftar Syarat
            </h6>
            <div class="row">
                @foreach($jenisSurat->syarat as $index => $syarat)
                <div class="col-md-6 mb-2">
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill me-3">{{ $index + 1 }}</span>
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>{{ $syarat }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted py-4">
                <i class="fas fa-inbox fa-3x mb-3"></i>
                <p>Belum ada syarat yang tersedia</p>
                <button class="btn btn-primary" onclick="editSyarat()">
                    <i class="fas fa-plus"></i> Tambah Syarat
                </button>
            </div>
        @endif
    </div>
</div>

<script>
function editSyarat() {
    // Logic untuk membuka modal edit syarat
    alert('Edit syarat functionality will be implemented here');
}
</script>