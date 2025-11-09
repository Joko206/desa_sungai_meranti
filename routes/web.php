<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminPengajuanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaDashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FileController;

// Home Route

Route::get('/', function () {
    // Check if user is authenticated
    if (Auth::check()) {
        $user = Auth::user();
        // Redirect based on user role
        $userRole = $user->role ? $user->role->nama_role : 'warga';
        if ($userRole === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('warga.dashboard');
        }
    }
    // Show home page for unauthenticated users
    return view('home');
})->name('home');

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('forgot-password.post');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('reset-password.post');

// Public Routes
Route::get('/administrasi', [PengajuanController::class, 'listjenis'])->name('administrasi');
Route::get('/tutorial-pengajuan', function() {
    return view('warga.tutorial-pengajuan');
})->name('warga.tutorial-pengajuan');
Route::view('/penduduk', 'home')->name('penduduk');
Route::view('/profil', 'home')->name('profil');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Pengajuan Routes
    Route::get('pengajuan/create', [PengajuanController::class, 'showcreate'])->name('pengajuan.create');
    Route::post('pengajuan/create', [PengajuanController::class, 'addPengajuan'])->name('pengajuan.create.post');


    // Warga Routes
    Route::middleware('role:warga')->group(function () {
        Route::get('/warga/dashboard', [WargaDashboardController::class, 'index'])->name('warga.dashboard');
        Route::get('/warga/jenis-surat', [WargaDashboardController::class, 'jenisSurat'])->name('warga.jenis-surat');
        Route::get('/warga/syarat/{jenisSurat}', [WargaDashboardController::class, 'syarat'])->name('warga.syarat');
        Route::get('/warga/pengajuan/{pengajuan}', [WargaDashboardController::class, 'show'])->name('warga.pengajuan.show');
        Route::post('/warga/pengajuan/{pengajuan}/batal', [WargaDashboardController::class, 'cancel'])->name('warga.pengajuan.cancel');
        Route::get('/warga/file/lihat/{pengajuanId}/{label}', [FileController::class, 'previewFile'])->name('warga.file.preview');
    });

    // Admin Routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

    Route::prefix('admin')->middleware('role:admin')->group(function () {
        // Template serving route with CORS headers for Office Online preview
        Route::get('/templates/{filename}', function($filename) {
            $path = 'templates/' . $filename;
            
            if (!Storage::disk('public')->exists($path)) {
                abort(404);
            }
            
            $filePath = Storage::disk('public')->path($path);

            return response()->file($filePath, [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS',
                'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept, Authorization',
            ]);
        })->name('admin.templates.download');
        
        // Secure file serving routes for private documents
        Route::get('/file/lihat/{pengajuanId}/{label}', [FileController::class, 'previewFile'])->name('admin.file.preview');
        Route::get('/file/download/{pengajuanId}/{label}', [FileController::class, 'downloadFile'])->name('admin.file.download');


        // Admin Pengajuan Routes
        Route::get('/pengajuan', [AdminPengajuanController::class, 'index'])->name('admin.pengajuan.index');
        Route::get('/pengajuan/{id}', [AdminPengajuanController::class, 'show'])->name('admin.pengajuan.show');
        Route::post('/pengajuan/{id}/approve', [AdminPengajuanController::class, 'approve'])->name('admin.pengajuan.approve');
        Route::post('/pengajuan/{id}/reject', [AdminPengajuanController::class, 'reject'])->name('admin.pengajuan.reject');        
        // Admin Jenis Surat Routes
        Route::get('/jenis-surat', [JenisSuratController::class, 'adminIndex'])->name('admin.jenis-surat.index');
        Route::post('/jenis-surat', [JenisSuratController::class, 'AddLetter'])->name('admin.jenis-surat.store');
        Route::get('/jenis-surat/{jenisSurat}', [JenisSuratController::class, 'adminShow'])->name('admin.jenis-surat.show');
        Route::put('/jenis-surat/{jenisSurat}', [JenisSuratController::class, 'update'])->name('admin.jenis-surat.update');
        Route::delete('/jenis-surat/{jenisSurat}', [JenisSuratController::class, 'adminDestroy'])->name('admin.jenis-surat.destroy');
        Route::patch('/jenis-surat/{jenisSurat}/toggle-status', [JenisSuratController::class, 'adminToggleStatus'])->name('admin.jenis-surat.toggle-status');
        
        // Bulk Operations Routes
        Route::patch('/jenis-surat/bulk-toggle-status', [JenisSuratController::class, 'bulkToggleStatus'])->name('admin.jenis-surat.bulk-toggle-status');
        Route::delete('/jenis-surat/bulk-delete', [JenisSuratController::class, 'bulkDelete'])->name('admin.jenis-surat.bulk-delete');
    });
});

// API Routes for Admin (must be after web routes)
Route::prefix('api/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard-stats', [AdminDashboardController::class, 'dashboardStats']);
    Route::get('/recent-pengajuan', [AdminDashboardController::class, 'recentPengajuan']);
});


