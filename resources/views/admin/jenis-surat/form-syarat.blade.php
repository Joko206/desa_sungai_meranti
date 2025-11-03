{{-- Form Input Nama Syarat (Sederhana) --}}
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Syarat Pengajuan Surat</h5>
        <small class="text-muted">Tambahkan syarat-syarat yang diperlukan untuk pengajuan surat ini</small>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Nama Syarat</label>
            <div id="syaratContainer">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="nama_syarat[]" placeholder="Masukkan nama syarat (contoh: KTP Asli)">
                    <button type="button" class="btn btn-outline-danger" onclick="removeInput(this)">Hapus</button>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-primary" onclick="addSyarat()">
                <i class="fas fa-plus"></i> Tambah Syarat
            </button>
        </div>
    </div>
</div>

<script>
function addSyarat() {
    const container = document.getElementById('syaratContainer');
    const newInput = document.createElement('div');
    newInput.className = 'input-group mb-2';
    newInput.innerHTML = `
        <input type="text" class="form-control" name="nama_syarat[]" placeholder="Masukkan nama syarat">
        <button type="button" class="btn btn-outline-danger" onclick="removeInput(this)">Hapus</button>
    `;
    container.appendChild(newInput);
}

function removeInput(button) {
    const inputGroups = button.parentElement.parentElement.querySelectorAll('.input-group');
    
    // Minimal harus ada 1 input
    if (inputGroups.length > 1) {
        const inputGroup = button.parentElement;
        inputGroup.remove();
    } else {
        // Jika hanya 1 input, clear valuenya
        const input = button.parentElement.querySelector('input');
        input.value = '';
    }
}
</script>