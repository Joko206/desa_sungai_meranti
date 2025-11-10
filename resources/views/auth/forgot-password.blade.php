@extends('layout.app')

@section('title', 'Forgot Password - Desa Sungai Meranti')

@section('content')
<div class="min-h-screen bg-blue-900 flex items-center justify-center pt-20" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('Desa-teluk-Meranti-1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container mx-auto px-8">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-5xl font-bold text-white mb-4">Lupa Password?</h2>
                <p class="text-xl text-blue-100">
                    Masukkan email Anda untuk mendapatkan link reset password
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20">
                @if(session('success'))
                    <div class="mb-6 rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-blue-700">
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

                <form method="POST" action="{{ route('password.email') }}" id="forgotForm">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    required 
                                    autofocus
                                    value="{{ old('email') }}"
                                    class="w-full pl-10 pr-4 py-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                    placeholder="nama@email.com"
                                >
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" id="submitBtn" class="w-full bg-yellow-400 hover:bg-yellow-300 text-blue-900 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg class="w-6 h-6 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span id="submitBtnText">Kirim Link Reset</span>
                                <div id="submitSpinner" class="hidden inline-block ml-2 w-4 h-4 border-2 border-blue-900 border-t-transparent rounded-full animate-spin"></div>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="text-center pt-6">
                    <p class="text-blue-100">
                        Ingat password Anda?
                        <a href="{{ route('login') }}" class="text-yellow-300 hover:text-yellow-200 font-semibold underline underline-offset-2">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </div>

            <div class="text-center mt-10">
                <p class="text-blue-200 text-sm">
                    Tidak menerima email?
                    <a href="#" class="text-yellow-300 hover:text-yellow-200 underline">Hubungi admin desa</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('forgotForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    const submitBtnText = document.getElementById('submitBtnText');
    const submitSpinner = document.getElementById('submitSpinner');
    
    submitBtn.disabled = true;
    submitBtnText.textContent = 'Mengirim...';
    submitSpinner.classList.remove('hidden');
});
</script>
@endsection