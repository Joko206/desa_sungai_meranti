<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminJamKerjaBaru
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        if ($user && $user->role && strtolower($user->role->nama_role) === 'admin') {
            $now = Carbon::now('Asia/Jakarta');
            // TESTING: jam kerja hanya 10 menit dari sekarang
            $start = Carbon::now('Asia/Jakarta')->addMinutes(10);
            $end = Carbon::now('Asia/Jakarta')->addMinutes(11);
            if ($now->lt($start) || $now->gt($end)) {
                // Jika di luar jam kerja
                return response()->view('errors.outside-working-hours', [], 403);
            }
        }
        return $next($request);
    }
}
