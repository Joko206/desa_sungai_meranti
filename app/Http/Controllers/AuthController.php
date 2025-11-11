<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDesa;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Services\NotificationService;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $r)
    {
        if ($r->isJson() && count($r->all()) === 0) {
            return response()->json(['message' => 'Data tidak boleh kosong'], 400);
        }

        try {
            $r->validate([
                'nik' => 'required|string|size:16|unique:user_desa,nik',
                'nama' => 'required|string',
                'alamat' => 'required|string|min:10',
                'no_hp' => 'required|string|regex:/^[0-9]{10,15}$/',
                'email' => 'required|email|unique:user_desa,email',
                'password' => 'required|min:6'
            ]);

            // Default role "warga"
            $role = Role::where('nama_role', 'warga')->first();
            if (!$role) {
                return response()->json(['success' => false, 'message' => 'Role warga tidak ditemukan'], 500);
            }

            // Jika kode rahasia ada, set role admin
            if ($r->filled('kode_rahasia')) {
                $kodeBenar = env('ADMIN_SECRET_CODE');
                if ($r->kode_rahasia !== $kodeBenar) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Kode rahasia tidak valid, gagal membuat akun admin',
                    ], 403);
                }
                $adminRole = Role::where('nama_role', 'admin')->first();
                if ($adminRole) {
                    $role = $adminRole;
                }
            }

            try {
                $user = UserDesa::create([
                    'nik' => $r->nik,
                    'nama' => $r->nama,
                    'alamat' => $r->alamat,
                    'no_hp' => $r->no_hp,
                    'email' => $r->email,
                    'password' => $r->password,
                    'role_id' => $role->id,
                ]);
            } catch (QueryException $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menyimpan data user. Pastikan data valid dan tidak melanggar batasan database.',
                ], 400);
            }

            // For web registration, log the user in and redirect
            if (!$r->isJson()) {
                Auth::login($user);

                // Send welcome email
                $notificationService = app(NotificationService::class);
                $notificationService->sendWelcomeEmail($user);

                $roleName = $role->nama_role ?? 'warga';
                $dashboardRoute = $roleName === 'admin' ? 'admin.dashboard' : 'warga.dashboard';
                $successMessage = $roleName === 'admin'
                    ? 'Registrasi berhasil sebagai admin! Selamat datang ' . $user->nama
                    : 'Registrasi berhasil! Selamat datang ' . $user->nama;
                $redirectTarget = $this->determineRoleRedirectUrl($r, $roleName, $dashboardRoute);

                return redirect()->to($redirectTarget)->with('success', $successMessage);
            }

            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil',
                'token' => $token,
                'user' => [
                    'nik' => $user->nik,
                    'nama' => $user->nama,
                    'email' => $user->email,
                    'role_id' => $user->role_id
                ]
            ], 201);

        } catch (ValidationException $e) {
            if (!$r->isJson()) {
                return back()->withErrors($e->errors())->withInput();
            }
            return response()->json([
                'message' => 'Data validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function login(Request $r)
    {
        if ($r->isJson() && count($r->all()) === 0) {
            return response()->json(['message' => 'Data tidak boleh kosong'], 400);
        }

        try {
            $validated = $r->validate([
                'nik' => 'required',
                'password' => 'required'
            ]);

            $user = UserDesa::with('role')->where('nik', $validated['nik'])->first();

            if (!$user || !Hash::check($validated['password'], $user->password)) {
                // Handle web form submission
                if (!$r->isJson()) {
                    return back()->withErrors([
                        'nik' => 'NIK atau password salah'
                    ])->withInput($r->only('nik'));
                }
                
                return response()->json([
                    'message' => 'NIK atau password salah',
                    'errors' => ['nik' => ['Credentials incorrect']]
                ], 422);
            }

            // Handle web form submission
            if (!$r->isJson()) {
                Auth::login($user);
                
                // Redirect based on user role
                $roleName = $user->role ? $user->role->nama_role : 'warga';
                $dashboardRoute = $roleName === 'admin' ? 'admin.dashboard' : 'warga.dashboard';
                $redirectTarget = $this->determineRoleRedirectUrl($r, $roleName, $dashboardRoute);

                return redirect()->to($redirectTarget)->with('success', 'Selamat datang, ' . $user->nama . '!');
            }

            // Handle API login
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'token' => $token,
                'user' => [
                    'nik' => $user->nik,
                    'nama' => $user->nama,
                    'email' => $user->email,
                    'role_id' => $user->role_id
                ]
            ]);
        } catch (ValidationException $e) {
            if (!$r->isJson()) {
                return back()->withErrors($e->errors())->withInput();
            }
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        try {
            // Handle web logout
            if (!$request->isJson()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('success', 'Berhasil logout');
            }

            // Handle API logout
            $user = $request->user();
            if ($user && $user->currentAccessToken()) {
                $user->currentAccessToken()->delete();
            }

            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout gagal, silakan coba lagi.',
            ], 500);
        }
    }

    public function user(Request $request)
    {
        try {
            $user = $request->user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'user' => [
                    'nik' => $user->nik,
                    'nama' => $user->nama,
                    'email' => $user->email,
                    'role_id' => $user->role_id
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data user.',
            ], 500);
        }
    }

    protected function determineRoleRedirectUrl(Request $request, string $roleName, string $dashboardRouteName): string
    {
        $intendedUrl = $request->session()->pull('url.intended');

        if ($intendedUrl) {
            $path = parse_url($intendedUrl, PHP_URL_PATH) ?? '/';
            $normalizedPath = '/' . ltrim($path, '/');

            $allowedPrefixes = match ($roleName) {
                'admin' => ['/admin'],
                default => ['/warga'],
            };

            foreach ($allowedPrefixes as $prefix) {
                if (Str::startsWith($normalizedPath, $prefix)) {
                    return $intendedUrl;
                }
            }
        }

        return route($dashboardRouteName);
    }

    // Password Reset Methods
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        // Placeholder implementation - replace with actual email sending
        return redirect()->route('login')->with('success', 'Link reset password telah dikirim ke email Anda');
    }

    public function showResetPasswordForm($token = null)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        // Placeholder implementation - replace with actual password reset logic
        return redirect()->route('login')->with('success', 'Password berhasil diupdate');
    }

    // New OTP-based Password Reset Methods
    public function showForgotPasswordSearchEmail()
    {
        return view('auth.forgot-password-search');
    }

    public function searchEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = UserDesa::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan dalam sistem')->withInput();
        }

        // Redirect to confirmation page with user data
        return redirect()->route('password.confirmation')
            ->with('user', $user);
    }

    public function showForgotPasswordConfirmation(Request $request)
    {
        $user = $request->session()->get('user');
        if (!$user) {
            return redirect()->route('password.search-email')
                ->with('error', 'Sesi telah berakhir, silakan cari email lagi');
        }

        return view('auth.forgot-password-confirmation', compact('user'));
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = UserDesa::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan')->withInput();
        }

        // Here you would generate and send OTP via email
        // For now, we'll generate a 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Store OTP in session for verification
        $request->session()->put('otp', $otp);
        $request->session()->put('otp_email', $request->email);
        $request->session()->put('otp_expires', now()->addMinutes(5));

        // Store email in session for OTP page
        $request->session()->put('email', $request->email);

        try {
            // Send the email using Mailable class
            Mail::to($request->email)->send(new \App\Mail\OtpMail($otp, $user->nama));
            
            return redirect()->route('password.verify-otp')
                ->with('success', 'Kode OTP telah dikirim ke email Anda');
        } catch (Exception $e) {
            // If email sending fails, still allow user to proceed for development
            return redirect()->route('password.verify-otp')
                ->with('warning', 'Kode OTP: ' . $otp . ' (Mode Development - Email tidak terkirim)');
        }
    }

    public function showForgotPasswordOtp(Request $request)
    {
        $email = $request->session()->get('email');
        if (!$email) {
            return redirect()->route('password.search-email')
                ->with('error', 'Sesi telah berakhir, silakan cari email lagi');
        }

        return view('auth.forgot-password-otp', compact('email'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string|size:6'
        ]);

        // Get stored OTP data from session
        $storedOtp = $request->session()->get('otp');
        $storedEmail = $request->session()->get('otp_email');
        $otpExpires = $request->session()->get('otp_expires');

        // Check if OTP exists and hasn't expired
        if (!$storedOtp || !$storedEmail || !$otpExpires) {
            return back()->with('error', 'Kode OTP telah expired. Silakan minta kode baru.')->withInput();
        }

        if (now()->isAfter($otpExpires)) {
            return back()->with('error', 'Kode OTP telah expired. Silakan minta kode baru.')->withInput();
        }

        // Verify email and OTP match
        if ($request->email !== $storedEmail || $request->otp !== $storedOtp) {
            return back()->with('error', 'Kode OTP tidak valid')->withInput();
        }

        // ✅ OTP valid → izinkan pengguna lanjut reset password
        $request->session()->put('otp_verified', true);


        // Clear OTP from session and redirect to password change
        $request->session()->forget(['otp', 'otp_expires']);

        return redirect()->route('password.change')
            ->with('success', 'OTP berhasil diverifikasi')
            ->with('email', $request->email);
    }

    public function showForgotPasswordChange(Request $request)
    {
        // Cek apakah OTP sudah diverifikasi
    if (!$request->session()->get('otp_verified')) {
        return redirect()->route('password.search-email')
            ->with('error', 'Sesi telah berakhir, silakan mulai dari awal');
    }

    // Ambil email yang sudah diverifikasi
    $email = $request->session()->get('otp_email');
    
    return view('auth.forgot-password-change', compact('email'));
    }

    public function changePassword(Request $request)
    {
        // Pastikan OTP sudah diverifikasi
        if (!$request->session()->get('otp_verified')) {
            return redirect()->route('password.search-email')
                ->with('error', 'Sesi telah berakhir, silakan mulai dari awal');
        }

        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        // Ambil email dari session (bukan dari user input)
        $email = $request->session()->get('otp_email');

        try {
            $user = UserDesa::where('email', $email)->first();
            
            if (!$user) {
                return back()->with('error', 'Email tidak ditemukan')->withInput();
            }

            // Update password (let the model's mutator handle the hashing)
            $user->update([
                'password' => $request->password
            ]);

            // Hapus semua session terkait reset password
            $request->session()->forget(['otp_verified', 'otp_email']);

            return redirect()->route('login')
                ->with('success', 'Password berhasil diubah. Silakan login dengan password baru.');

        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengubah password. Silakan coba lagi.')
                        ->withInput();
        }
    }

}
