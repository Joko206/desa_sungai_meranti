<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LogKegiatanUserGlobal
{
    public function handle(Request $request, Closure $next)
    {
        file_put_contents(storage_path('logs/debug.txt'), "masuk handle LogKegiatanUserGlobal\n", FILE_APPEND);
        $response = $next($request);
        $user = Auth::user();
        $nama = $user ? $user->nama : '-';
        $log = sprintf(
            "[%s] Nama: %s | IP: %s | URL: %s | UserAgent: %s",
            Carbon::now('Asia/Jakarta')->toDateTimeString(),
            $nama,
            $request->ip(),
            $request->fullUrl(),
            $request->userAgent()
        );
        $logPath = storage_path('logs/activity_user.txt');
        file_put_contents($logPath, $log . "\n", FILE_APPEND);
        return $response;
    }
}
