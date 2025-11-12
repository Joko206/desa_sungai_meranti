{{-- Rejection Modal Component --}}
<div id="rejectionModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full transform transition-all duration-300 scale-95 opacity-0" id="rejectionModalContent">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Tolak Pengajuan</h3>
                    </div>
                    <button id="closeRejectionModalBtn" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-6">
                <div class="bg-gradient-to-r from-red-50 to-rose-50 rounded-xl p-6 border border-red-100">
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-red-800">Berikan Alasan Penolakan</h4>
                    </div>
                    <p class="text-sm text-red-700 mb-6">Alasan yang jelas akan membantu pemohon memahami dan memperbaiki pengajuannya.</p>

                    <form id="rejectionForm">
                        <div class="mb-6">
                            <label for="rejectionReason" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Alasan Penolakan
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <textarea id="rejectionReason" name="alasan" rows="6" required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 resize-none bg-white shadow-sm"
                                          placeholder="Contoh: Dokumen KTP tidak lengkap, alamat tidak sesuai dengan kartu keluarga, atau persyaratan lainnya belum terpenuhi..."></textarea>
                                <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                    <span id="charCount">0</span>/500 karakter
                                </div>
                            </div>
                            <div class="mt-3 text-xs text-gray-600 flex items-center">
                                <svg class="w-3 h-3 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Alasan yang jelas akan membantu pemohon memperbaiki pengajuannya
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                            <button type="button" id="cancelRejectionBtn" class="px-6 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-[1.02]">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Batal
                            </button>
                            <button type="submit" id="submitRejectionBtn" class="px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span id="submitRejectionBtnText">Tolak Pengajuan</span>
                                <div id="rejectionSpinner" class="hidden inline-block ml-2 w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rejectionModal = document.getElementById('rejectionModal');
    const rejectionModalContent = document.getElementById('rejectionModalContent');
    const closeBtn = document.getElementById('closeRejectionModalBtn');
    const cancelBtn = document.getElementById('cancelRejectionBtn');
    const form = document.getElementById('rejectionForm');
    const textarea = document.getElementById('rejectionReason');
    const charCount = document.getElementById('charCount');
    const submitBtn = document.getElementById('submitRejectionBtn');
    const submitBtnText = document.getElementById('submitRejectionBtnText');
    const rejectionSpinner = document.getElementById('rejectionSpinner');

    let currentPengajuanId = null;
    let onSuccessCallback = null;

    // Show rejection modal
    window.showRejectionModal = function(pengajuanId, callback = null) {
        currentPengajuanId = pengajuanId;
        onSuccessCallback = callback;

        // Reset form
        form.reset();
        charCount.textContent = '0';
        charCount.className = 'text-gray-400';

        // Show modal with animation
        rejectionModal.classList.remove('hidden');
        setTimeout(() => {
            rejectionModalContent.classList.remove('scale-95', 'opacity-0');
            rejectionModalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Focus on textarea
        setTimeout(() => textarea.focus(), 300);
    };

    // Hide modal function
    function hideModal() {
        rejectionModalContent.classList.remove('scale-100', 'opacity-100');
        rejectionModalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            rejectionModal.classList.add('hidden');
            currentPengajuanId = null;
            onSuccessCallback = null;
        }, 300);
    }

    // Event listeners
    closeBtn.addEventListener('click', hideModal);
    cancelBtn.addEventListener('click', hideModal);

    // Character count
    textarea.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;

        // Color coding for character count
        if (count > 450) {
            charCount.className = 'text-red-500 font-semibold';
        } else if (count > 400) {
            charCount.className = 'text-yellow-500 font-semibold';
        } else {
            charCount.className = 'text-gray-400';
        }

        // Prevent typing beyond limit
        if (count > 500) {
            this.value = this.value.substring(0, 500);
            charCount.textContent = '500';
            charCount.className = 'text-red-500 font-bold';
        }
    });

    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const alasan = textarea.value.trim();

        // Validation
        if (!alasan) {
            window.showConfirmationModal({
                title: 'Error',
                message: 'Alasan penolakan tidak boleh kosong!',
                type: 'danger',
                confirmText: 'OK'
            });
            textarea.focus();
            return;
        }

        if (alasan.length < 10) {
            window.showConfirmationModal({
                title: 'Error',
                message: 'Alasan penolakan minimal 10 karakter agar pemohon dapat memahami dengan jelas!',
                type: 'danger',
                confirmText: 'OK'
            });
            textarea.focus();
            return;
        }

        // Show loading state
        submitBtn.disabled = true;
        submitBtnText.textContent = 'Memproses...';
        rejectionSpinner.classList.remove('hidden');

        try {
            const response = await fetch(`/admin/pengajuan/${currentPengajuanId}/reject`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ alasan })
            });

            const result = await response.json();

            if (result.success) {
                hideModal();
                window.showConfirmationModal({
                    title: 'Berhasil!',
                    message: 'Pengajuan berhasil ditolak dengan alasan yang diberikan!',
                    type: 'success',
                    confirmText: 'OK',
                    cancelText: null,
                    onConfirm: () => {
                        if (onSuccessCallback) {
                            onSuccessCallback();
                        } else {
                            location.reload();
                        }
                    }
                });
            } else {
                window.showConfirmationModal({
                    title: 'Error',
                    message: 'Error: ' + result.message,
                    type: 'danger',
                    confirmText: 'OK'
                });
            }
        } catch (error) {
            window.showConfirmationModal({
                title: 'Error',
                message: 'Terjadi kesalahan saat menolak pengajuan',
                type: 'danger',
                confirmText: 'OK'
            });
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitBtnText.textContent = 'Tolak Pengajuan';
            rejectionSpinner.classList.add('hidden');
        }
    });

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !rejectionModal.classList.contains('hidden')) {
            hideModal();
        }
    });

    // Close on backdrop click
    rejectionModal.addEventListener('click', function(e) {
        if (e.target === rejectionModal) {
            hideModal();
        }
    });
});
</script>