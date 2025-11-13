@extends('layout.app')

@section('title', 'Ganti Password - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-900 via-emerald-800 to-teal-700 flex items-center justify-center pt-20" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container mx-auto px-8">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full mb-6">
                    <svg class="w-10 h-10 text-green-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-bold text-white mb-4">Ganti Password</h2>
                <p class="text-xl text-green-100">
                    Buat password baru yang kuat dan mudah diingat
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20">
                @if(session('success'))
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.change.post') }}" id="changePasswordForm">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- New Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                    </svg>
                                </div>
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    required 
                                    minlength="6"
                                    class="w-full pl-10 pr-12 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                    placeholder="Minimal 6 karakter"
                                >
                                <button type="button" onclick="togglePassword('password')" 
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                                    <svg id="toggle-password-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                <div class="flex items-center space-x-2 text-sm">
                                    <div class="flex-1 bg-gray-200 rounded-full h-2">
                                        <div id="passwordStrength" class="bg-gray-200 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                    </div>
                                    <span id="passwordStrengthText" class="text-gray-500 whitespace-nowrap">Lemah</span>
                                </div>
                            </div>
                            @error('password')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                    </svg>
                                </div>
                                <input 
                                    type="password" 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    required 
                                    class="w-full pl-10 pr-12 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                    placeholder="Ulangi password baru"
                                >
                                <button type="button" onclick="togglePassword('password_confirmation')" 
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                                    <svg id="toggle-password-confirmation-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                <div id="passwordMatch" class="flex items-center space-x-2 text-sm">
                                    <svg id="matchIcon" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span id="matchText" class="text-gray-500">Password belum cocok</span>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Requirements -->
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="text-sm font-medium text-blue-800 mb-2">Persyaratan Password:</h4>
                            <ul class="text-sm text-blue-700 space-y-1">
                                <li class="flex items-center space-x-2">
                                    <svg id="req-length" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span>Minimal 6 karakter</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <svg id="req-match" class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span>Password dan konfirmasi harus sama</span>
                                </li>
                            </ul>
                        </div>

                        <div class="pt-4">
                            <button type="submit" id="changeBtn" class="w-full bg-green-500 hover:bg-green-400 text-white py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-xl disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                <svg class="w-6 h-6 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span id="changeBtnText">Ganti Password</span>
                                <div id="changeSpinner" class="hidden inline-block ml-2 w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="text-center pt-6">
                    <p class="text-green-100">
                        Ingat password lama?
                        <a href="{{ route('login') }}" class="text-yellow-300 hover:text-yellow-200 font-semibold underline underline-offset-2">
                            Kembali ke login
                        </a>
                    </p>
                </div>
            </div>

            <div class="text-center mt-10">
                <p class="text-green-200 text-sm">
                    Ada masalah?
                    <a href="#" class="text-yellow-300 hover:text-yellow-200 underline">Hubungi support</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const changeBtn = document.getElementById('changeBtn');
    const passwordStrength = document.getElementById('passwordStrength');
    const passwordStrengthText = document.getElementById('passwordStrengthText');
    const passwordMatch = document.getElementById('passwordMatch');
    const matchIcon = document.getElementById('matchIcon');
    const matchText = document.getElementById('matchText');
    const reqLength = document.getElementById('req-length');
    const reqMatch = document.getElementById('req-match');

    // Password strength checker
    function checkPasswordStrength(password) {
        let strength = 0;
        let strengthText = 'Lemah';
        let strengthColor = 'bg-red-400';
        
        if (password.length >= 6) strength += 25;
        if (password.length >= 8) strength += 25;
        if (/[A-Z]/.test(password)) strength += 25;
        if (/[0-9]/.test(password)) strength += 15;
        if (/[^A-Za-z0-9]/.test(password)) strength += 10;
        
        if (strength >= 75) {
            strengthText = 'Kuat';
            strengthColor = 'bg-green-400';
        } else if (strength >= 50) {
            strengthText = 'Sedang';
            strengthColor = 'bg-yellow-400';
        } else if (strength >= 25) {
            strengthText = 'Lemah';
            strengthColor = 'bg-red-400';
        }
        
        return { strength, strengthText, strengthColor };
    }

    // Update password requirements
    function updateRequirements(password, confirmPassword) {
        // Length requirement
        if (password.length >= 6) {
            reqLength.className = 'w-4 h-4 text-green-500';
            reqLength.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>';
        } else {
            reqLength.className = 'w-4 h-4 text-gray-400';
            reqLength.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
        }
        
        // Match requirement
        if (confirmPassword.length > 0 && password === confirmPassword) {
            reqMatch.className = 'w-4 h-4 text-green-500';
            reqMatch.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>';
        } else {
            reqMatch.className = 'w-4 h-4 text-gray-400';
            reqMatch.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
        }
    }

    // Real-time validation
    function validatePasswords() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        // Check password strength
        const strengthResult = checkPasswordStrength(password);
        passwordStrength.style.width = strengthResult.strength + '%';
        passwordStrength.className = 'h-2 rounded-full transition-all duration-300 ' + strengthResult.strengthColor;
        passwordStrengthText.textContent = strengthResult.strengthText;
        
        // Check password match
        if (confirmPassword.length === 0) {
            matchIcon.className = 'w-4 h-4 text-gray-400';
            matchIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
            matchText.textContent = 'Password belum cocok';
            matchText.className = 'text-gray-500';
        } else if (password === confirmPassword) {
            matchIcon.className = 'w-4 h-4 text-green-500';
            matchIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>';
            matchText.textContent = 'Password cocok';
            matchText.className = 'text-green-600';
        } else {
            matchIcon.className = 'w-4 h-4 text-red-500';
            matchIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
            matchText.textContent = 'Password tidak cocok';
            matchText.className = 'text-red-500';
        }
        
        // Update requirements
        updateRequirements(password, confirmPassword);
        
        // Enable/disable submit button
        const isValid = password.length >= 6 && password === confirmPassword;
        changeBtn.disabled = !isValid;
    }

    // Event listeners
    passwordInput.addEventListener('input', validatePasswords);
    confirmPasswordInput.addEventListener('input', validatePasswords);

    // Form submission
    document.getElementById('changePasswordForm').addEventListener('submit', function() {
        changeBtn.disabled = true;
        document.getElementById('changeBtnText').textContent = 'Mengubah...';
        document.getElementById('changeSpinner').classList.remove('hidden');
    });
});

function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const toggleIcon = document.getElementById('toggle-' + fieldId + '-icon');
    
    if (field.type === 'password') {
        field.type = 'text';
        toggleIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
        `;
    } else {
        field.type = 'password';
        toggleIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        `;
    }
}
</script>
@endsection