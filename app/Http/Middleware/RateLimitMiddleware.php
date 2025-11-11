<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $limit = '60,1', string $key = null): Response
    {
        // Parse rate limit configuration (attempts,minutes)
        [$attempts, $minutes] = explode(',', $limit, 2);
        $attempts = (int) $attempts;
        $minutes = (int) $minutes;
        
        // Create rate limit key
        $rateLimitKey = $this->getRateLimitKey($request, $key);
        
        // Check if rate limit exceeded
        if (RateLimiter::tooManyAttempts($rateLimitKey, $attempts)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);
            
            return response()->json([
                'success' => false,
                'message' => 'Terlalu banyak percobaan. Silakan coba lagi dalam ' . $seconds . ' detik.',
                'retry_after' => $seconds
            ], 429, [
                'X-RateLimit-Limit' => $attempts,
                'X-RateLimit-Remaining' => 0,
                'X-RateLimit-Reset' => now()->addSeconds($seconds)->timestamp,
                'Retry-After' => $seconds
            ]);
        }
        
        // Add rate limit headers
        $response = $next($request);
        
        $remaining = $attempts - RateLimiter::attempts($rateLimitKey);
        $response->headers->add([
            'X-RateLimit-Limit' => $attempts,
            'X-RateLimit-Remaining' => max(0, $remaining),
            'X-RateLimit-Reset' => now()->addMinutes($minutes)->timestamp,
        ]);
        
        return $response;
    }
    
    /**
     * Generate rate limit key based on request
     */
    private function getRateLimitKey(Request $request, ?string $key = null): string
    {
        // Priority: explicit key, then user ID, then IP
        if ($key) {
            return $key;
        }
        
        if ($request->user()) {
            return 'user_' . $request->user()->id;
        }
        
        return 'ip_' . $request->ip();
    }
}