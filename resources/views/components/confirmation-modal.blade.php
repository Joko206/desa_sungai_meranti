{{-- Confirmation Modal Component --}}
<div id="confirmationModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div id="modalIcon" class="w-10 h-10 rounded-full flex items-center justify-center">
                            <!-- Icon will be set dynamically -->
                        </div>
                        <h3 id="modalTitle" class="text-lg font-semibold text-gray-900">Konfirmasi</h3>
                    </div>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-6">
                <p id="modalMessage" class="text-gray-600 leading-relaxed">Apakah Anda yakin ingin melanjutkan?</p>

                <!-- Optional Details Section -->
                <div id="modalDetails" class="hidden mt-4 p-3 bg-gray-50 rounded-lg">
                    <p id="modalDetailsText" class="text-sm text-gray-700"></p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                <div class="flex gap-3 justify-end">
                    <button id="cancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Batal
                    </button>
                    <button id="confirmBtn" class="px-4 py-2 text-sm font-medium text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Confirmation Modal JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('confirmationModal');
    const modalContent = document.getElementById('modalContent');
    const closeBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmBtn = document.getElementById('confirmBtn');

    let currentCallback = null;

    // Modal configuration
    window.showConfirmationModal = function(options = {}) {
        const {
            title = 'Konfirmasi',
            message = 'Apakah Anda yakin ingin melanjutkan?',
            details = null,
            type = 'default', // default, warning, danger, success
            confirmText = 'Konfirmasi',
            cancelText = 'Batal',
            onConfirm = null
        } = options;

        // Set content
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalMessage').textContent = message;
        document.getElementById('confirmBtn').textContent = confirmText;
        document.getElementById('cancelBtn').textContent = cancelText;

        // Set details if provided
        const detailsEl = document.getElementById('modalDetails');
        const detailsTextEl = document.getElementById('modalDetailsText');
        if (details) {
            detailsTextEl.textContent = details;
            detailsEl.classList.remove('hidden');
        } else {
            detailsEl.classList.add('hidden');
        }

        // Set styling based on type
        const modalIcon = document.getElementById('modalIcon');
        modalIcon.innerHTML = getIconForType(type);
        modalIcon.className = `w-10 h-10 rounded-full flex items-center justify-center ${getIconClasses(type)}`;

        confirmBtn.className = `px-4 py-2 text-sm font-medium text-white rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 ${getButtonClasses(type)}`;

        // Store callback
        currentCallback = onConfirm;

        // Show modal with animation
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Focus management
        confirmBtn.focus();
    };

    // Hide modal function
    function hideModal() {
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            currentCallback = null;
        }, 300);
    }

    // Event listeners
    closeBtn.addEventListener('click', hideModal);
    cancelBtn.addEventListener('click', hideModal);

    confirmBtn.addEventListener('click', function() {
        hideModal();
        if (currentCallback && typeof currentCallback === 'function') {
            currentCallback();
        }
    });

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            hideModal();
        }
    });

    // Close on backdrop click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideModal();
        }
    });

    // Helper functions
    function getIconForType(type) {
        const icons = {
            default: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>`,
            warning: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
            </svg>`,
            danger: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>`,
            success: `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>`
        };
        return icons[type] || icons.default;
    }

    function getIconClasses(type) {
        const classes = {
            default: 'bg-blue-100 text-blue-600',
            warning: 'bg-yellow-100 text-yellow-600',
            danger: 'bg-red-100 text-red-600',
            success: 'bg-green-100 text-green-600'
        };
        return classes[type] || classes.default;
    }

    function getButtonClasses(type) {
        const classes = {
            default: 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
            warning: 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500',
            danger: 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
            success: 'bg-green-600 hover:bg-green-700 focus:ring-green-500'
        };
        return classes[type] || classes.default;
    }
});
</script>