{{-- Loading Modal Component --}}
<div id="loadingModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="loadingModalContent">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-center gap-3">
                    <div id="loadingModalIcon" class="w-10 h-10 rounded-full flex items-center justify-center">
                        <!-- Icon will be set dynamically -->
                    </div>
                    <h3 id="loadingModalTitle" class="text-lg font-semibold text-gray-900">Memproses...</h3>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-8">
                <div class="text-center">
                    <!-- Main Spinner -->
                    <div class="relative mb-6">
                        <div class="animate-spin rounded-full h-16 w-16 border-4 border-gray-200 border-t-blue-600 mx-auto"></div>
                        <!-- Secondary spinner for more visual interest -->
                        <div class="absolute inset-0 animate-spin rounded-full h-16 w-16 border-4 border-transparent border-r-green-500 mx-auto" style="animation-duration: 1.5s; animation-direction: reverse;"></div>
                    </div>

                    <p id="loadingModalMessage" class="text-gray-600 mb-4">Sedang memproses permintaan Anda...</p>

                    <!-- Progress Steps (optional) -->
                    <div id="loadingSteps" class="hidden space-y-3">
                        <div class="flex items-center gap-3 text-sm">
                            <div id="step1" class="w-2 h-2 rounded-full bg-gray-300"></div>
                            <span id="step1Text" class="text-gray-500">Memvalidasi data</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <div id="step2" class="w-2 h-2 rounded-full bg-gray-300"></div>
                            <span id="step2Text" class="text-gray-500">Membuat dokumen</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <div id="step3" class="w-2 h-2 rounded-full bg-gray-300"></div>
                            <span id="step3Text" class="text-gray-500">Menyimpan berkas</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <div id="step4" class="w-2 h-2 rounded-full bg-gray-300"></div>
                            <span id="step4Text" class="text-gray-500">Mengirim notifikasi</span>
                        </div>
                    </div>

                    <!-- Progress Bar (optional) -->
                    <div id="progressContainer" class="hidden mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div id="progressBar" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2" id="progressText">0% selesai</p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                <div class="text-center">
                    <p class="text-xs text-gray-500" id="loadingModalFooter">
                        Harap tunggu sebentar, proses ini mungkin memerlukan waktu beberapa detik...
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Loading Modal JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const loadingModal = document.getElementById('loadingModal');
    const loadingModalContent = document.getElementById('loadingModalContent');

    let currentCallback = null;
    let progressInterval = null;
    let currentStep = 0;
    let isAutoProgress = false;

    // Show loading modal
    window.showLoadingModal = function(options = {}) {
        const {
            title = 'Memproses...',
            message = 'Sedang memproses permintaan Anda...',
            type = 'default',
            showSteps = false,
            showProgress = false,
            autoProgress = false,
            estimatedTime = null,
            onShown = null
        } = options;

        // Set content
        document.getElementById('loadingModalTitle').textContent = title;
        document.getElementById('loadingModalMessage').textContent = message;

        // Set icon based on type
        const iconEl = document.getElementById('loadingModalIcon');
        iconEl.innerHTML = getLoadingIcon(type);
        iconEl.className = `w-10 h-10 rounded-full flex items-center justify-center ${getLoadingIconClasses(type)}`;

        // Handle steps
        const stepsEl = document.getElementById('loadingSteps');
        if (showSteps) {
            stepsEl.classList.remove('hidden');
            resetSteps();
        } else {
            stepsEl.classList.add('hidden');
        }

        // Handle progress
        const progressEl = document.getElementById('progressContainer');
        if (showProgress) {
            progressEl.classList.remove('hidden');
            resetProgress();
            isAutoProgress = autoProgress;
            if (autoProgress) {
                startAutoProgress();
            }
        } else {
            progressEl.classList.add('hidden');
        }

        // Set footer message
        const footerEl = document.getElementById('loadingModalFooter');
        if (estimatedTime) {
            footerEl.textContent = `Estimasi waktu: ${estimatedTime} detik`;
        } else {
            footerEl.textContent = 'Harap tunggu sebentar, proses ini mungkin memerlukan waktu beberapa detik...';
        }

        // Show modal with animation
        loadingModal.classList.remove('hidden');
        setTimeout(() => {
            loadingModalContent.classList.remove('scale-95', 'opacity-0');
            loadingModalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Call onShown callback
        if (onShown && typeof onShown === 'function') {
            onShown();
        }
    };

    // Hide loading modal
    window.hideLoadingModal = function() {
        loadingModalContent.classList.remove('scale-100', 'opacity-100');
        loadingModalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            loadingModal.classList.add('hidden');
            resetAll();
        }, 300);
    };

    // Show success and hide loading
    window.showSuccessAndHideLoading = function(message = 'Berhasil!', callback = null) {
        document.getElementById('loadingModalTitle').textContent = 'Berhasil!';
        document.getElementById('loadingModalMessage').textContent = message;
        document.getElementById('loadingModalIcon').innerHTML = `
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        `;
        document.getElementById('loadingModalIcon').className = 'w-10 h-10 rounded-full bg-green-100 flex items-center justify-center';

        // Hide steps and progress
        document.getElementById('loadingSteps').classList.add('hidden');
        document.getElementById('progressContainer').classList.add('hidden');

        setTimeout(() => {
            hideLoadingModal();
            if (callback && typeof callback === 'function') {
                callback();
            }
        }, 2000);
    };

    // Update progress
    window.updateLoadingProgress = function(progress, step = null, stepMessage = null) {
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');

        if (progressBar && progressText) {
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${progress}% selesai`;
        }

        if (step !== null) {
            updateStep(step, stepMessage);
        }
    };

    // Update step
    window.updateLoadingStep = function(step, message = null) {
        updateStep(step, message);
    };

    // Helper functions
    function getLoadingIcon(type) {
        const icons = {
            default: `<div class="animate-spin rounded-full h-6 w-6 border-2 border-gray-300 border-t-blue-600"></div>`,
            success: `<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>`,
            warning: `<svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>`,
            danger: `<svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>`
        };
        return icons[type] || icons.default;
    }

    function getLoadingIconClasses(type) {
        const classes = {
            default: 'bg-blue-100',
            success: 'bg-green-100',
            warning: 'bg-yellow-100',
            danger: 'bg-red-100'
        };
        return classes[type] || classes.default;
    }

    function resetSteps() {
        for (let i = 1; i <= 4; i++) {
            const stepEl = document.getElementById(`step${i}`);
            const textEl = document.getElementById(`step${i}Text`);
            if (stepEl) stepEl.className = 'w-2 h-2 rounded-full bg-gray-300';
            if (textEl) textEl.className = 'text-gray-500';
        }
        currentStep = 0;
    }

    function resetProgress() {
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        if (progressBar) progressBar.style.width = '0%';
        if (progressText) progressText.textContent = '0% selesai';
        if (progressInterval) {
            clearInterval(progressInterval);
            progressInterval = null;
        }
    }

    function resetAll() {
        resetSteps();
        resetProgress();
        currentCallback = null;
        isAutoProgress = false;
    }

    function updateStep(step, message = null) {
        // Mark previous steps as completed
        for (let i = 1; i < step; i++) {
            const stepEl = document.getElementById(`step${i}`);
            const textEl = document.getElementById(`step${i}Text`);
            if (stepEl) stepEl.className = 'w-2 h-2 rounded-full bg-green-500';
            if (textEl) textEl.className = 'text-green-600';
        }

        // Mark current step as active
        const currentStepEl = document.getElementById(`step${step}`);
        const currentTextEl = document.getElementById(`step${step}Text`);
        if (currentStepEl) currentStepEl.className = 'w-2 h-2 rounded-full bg-blue-500 animate-pulse';
        if (currentTextEl) {
            currentTextEl.className = 'text-blue-600 font-medium';
            if (message) currentTextEl.textContent = message;
        }

        currentStep = step;
    }

    function startAutoProgress() {
        let progress = 0;
        progressInterval = setInterval(() => {
            progress += Math.random() * 15; // Random progress increment
            if (progress > 95) progress = 95; // Cap at 95% until completion

            updateLoadingProgress(Math.round(progress));
        }, 500);
    }

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !loadingModal.classList.contains('hidden')) {
            // Don't allow closing loading modal with escape
            e.preventDefault();
        }
    });
});
</script>