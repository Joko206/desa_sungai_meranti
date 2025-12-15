<div id="lockScreenModal" style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.7);align-items:center;justify-content:center;">
    <div style="background:#fff;padding:2rem 2.5rem;border-radius:1rem;box-shadow:0 2px 16px #0002;min-width:320px;text-align:center;">
        <h2 class="text-lg font-bold mb-2">Sesi Terkunci</h2>
        <p class="mb-4">Tidak ada aktivitas selama 120 detik.<br>Masukkan password untuk membuka kunci.</p>
        <form id="unlockForm">
            <input type="password" id="unlockPassword" name="password" class="border rounded px-3 py-2 w-full mb-3" placeholder="Password" required autofocus>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">Buka Kunci</button>
        </form>
        <div id="unlockError" class="text-red-600 mt-2" style="display:none;"></div>
    </div>
</div>
<script>
(function(){
    let idleTimer;
    let lockModal = document.getElementById('lockScreenModal');
    let unlockForm = document.getElementById('unlockForm');
    let unlockError = document.getElementById('unlockError');
    function resetIdle() {
        clearTimeout(idleTimer);
        if(lockModal.style.display === 'flex') return;
        idleTimer = setTimeout(showLock, 120000);
    }
    function showLock() {
        lockModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        document.getElementById('unlockPassword').focus();
    }
    function hideLock() {
        lockModal.style.display = 'none';
        document.body.style.overflow = '';
        unlockError.style.display = 'none';
        document.getElementById('unlockPassword').value = '';
        resetIdle();
    }
    ['mousemove','keydown','mousedown','touchstart'].forEach(evt => {
        window.addEventListener(evt, resetIdle, true);
    });
    resetIdle();
    unlockForm.onsubmit = function(e){
        e.preventDefault();
        unlockError.style.display = 'none';
        fetch('/unlock-session', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ password: document.getElementById('unlockPassword').value })
        })
        .then(r => r.json())
        .then(res => {
            if(res.success){
                hideLock();
            }else{
                unlockError.textContent = res.message || 'Password salah!';
                unlockError.style.display = 'block';
            }
        })
        .catch(()=>{
            unlockError.textContent = 'Terjadi error. Coba lagi.';
            unlockError.style.display = 'block';
        });
    };
})();
</script>
