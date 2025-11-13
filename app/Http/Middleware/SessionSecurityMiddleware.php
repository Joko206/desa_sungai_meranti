<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SessionSecurityMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if session is already started
        if (!Session::isStarted()) {
            // Configure secure session options
            $this->configureSecureSession($request);
        }
        
        // Regenerate session ID periodically for security
        if ($this->shouldRegenerateSession()) {
            Session::regenerate(true);
        }
        
        // Check for session fixation attempts
        $this->checkSessionFixation($request);
        
        return $next($request);
    }
    
    /**
     * Configure secure session options
     */
    private function configureSecureSession(Request $request): void
    {
        // Configure secure cookie options
        $secure = $request->secure() || config('app.env') === 'production';
        $httpOnly = true;
        $sameSite = 'lax'; // or 'strict' for more security
        
        config([
            'session.lifetime' => 120, // 2 hours
            'session.expire_on_close' => false,
            'session.encrypt' => true,
            'session.secure' => $secure,
            'session.http_only' => $httpOnly,
            'session.same_site' => $sameSite,
        ]);
    }
    
    /**
     * Check if session should be regenerated
     */
    private function shouldRegenerateSession(): bool
    {
        $lastRegeneration = session('session_regenerated_at');
        
        if (!$lastRegeneration) {
            session(['session_regenerated_at' => now()]);
            return false;
        }
        
        // Regenerate session every 30 minutes
        if (now()->diffInMinutes($lastRegeneration) >= 30) {
            session(['session_regenerated_at' => now()]);
            return true;
        }
        
        return false;
    }
    
    /**
     * Check for session fixation attempts
     */
    private function checkSessionFixation(Request $request): void
    {
        $currentSessionId = session()->getId();
        $originalSessionId = $request->header('X-Session-Original-Id');
        
        // If original session ID is present but different from current, this is a fixation attempt
        if ($originalSessionId && $originalSessionId !== $currentSessionId) {
            // Log potential security event
            Log::warning('Session fixation attempt detected', [
                'original_id' => $originalSessionId,
                'current_id' => $currentSessionId,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->url(),
            ]);
            
            // Invalidate session and regenerate
            session()->invalidate();
            session()->regenerate(true);
        }
        
        // Add original session ID header for future checks
        if (!$originalSessionId) {
            session(['session_original_id' => $currentSessionId]);
        }
    }
    
    /**
     * Set secure session configuration for the response
     */
    public static function setSecureSessionConfig(): void
    {
        // Additional security configurations
        ini_set('session.cookie_httponly', 1);
        ini_set('session.cookie_secure', config('app.env') === 'production' ? 1 : 0);
        ini_set('session.cookie_samesite', 'Lax');
        ini_set('session.use_strict_mode', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_lifetime', 7200); // 2 hours
        ini_set('session.gc_maxlifetime', 7200);
    }
}