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
        // Only check for authenticated users and non-login/logout routes
        if (Auth::check() && !in_array($request->route()->getName(), ['login', 'logout', 'password.search-email', 'password.reset'])) {
            $lastActivity = Session::get('last_activity');
            $currentTime = time();
            
            // Get session lifetime in seconds from env or use default from config
            $sessionLifetimeSeconds = (int) env('SESSION_LIFETIME_SECONDS', config('session.lifetime') * 60);
            
            if ($lastActivity && ($currentTime - $lastActivity > $sessionLifetimeSeconds)) {
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
