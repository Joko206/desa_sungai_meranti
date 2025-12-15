<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastActivity = Session::get('last_activity');
            $currentTime = time();
            
            // Get session lifetime from config (in minutes)
            $sessionLifetime = config('session.lifetime') * 60; // Convert to seconds
            
            if ($lastActivity && ($currentTime - $lastActivity > $sessionLifetime)) {
                // Session has expired due to inactivity
                Auth::logout();
                Session::flush();
                
                return redirect()->route('login')
                    ->with('error', 'Sesi Anda telah berakhir karena tidak aktif. Silakan login kembali.');
            }
            
            // Update last activity time
            Session::put('last_activity', $currentTime);
        }
        
        return $next($request);
    }
}
