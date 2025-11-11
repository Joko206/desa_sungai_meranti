<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Add security headers
        $this->addSecurityHeaders($response);
        
        return $response;
    }
    
    /**
     * Add security headers to response
     */
    private function addSecurityHeaders(Response $response): void
    {
        // Prevent XSS attacks
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        
        // Content Security Policy (CSP)
        $csp = $this->getContentSecurityPolicy();
        $response->headers->set('Content-Security-Policy', $csp);
        
        // HTTPS Strict Transport Security (HSTS)
        if (config('app.env') === 'production') {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }
        
        // Permissions Policy
        $response->headers->set('Permissions-Policy', 
            'geolocation=(), microphone=(), camera=(), payment=(), usb=(), magnetometer=(), gyroscope=(), speaker=(), fullscreen=(self), autoplay=(), clipboard-write=()'
        );
        
        // Prevent MIME type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        
        // Enable browser security features
        $response->headers->set('X-Frame-Options', 'DENY');
    }
    
    /**
     * Get Content Security Policy
     */
    private function getContentSecurityPolicy(): string
    {
        $csp = [];
        
        // Default source
        $csp[] = "default-src 'self'";
        
        // Scripts - allow self, inline (for Blade), and common CDNs
        $csp[] = "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://unpkg.com";
        
        // Styles - allow self, inline (for Tailwind), and external fonts
        $csp[] = "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net";
        
        // Images - allow self, data URIs, and external sources
        $csp[] = "img-src 'self' data: https: blob:";
        
        // Fonts - allow self and Google Fonts
        $csp[] = "font-src 'self' https://fonts.gstatic.com https://fonts.googleapis.com";
        
        // Connect - allow API calls to same origin and external APIs
        $csp[] = "connect-src 'self' https: wss:";
        
        // Media - allow audio and video from self
        $csp[] = "media-src 'self'";
        
        // Frames - deny all iframes
        $csp[] = "frame-src 'none'";
        
        // Object/embed - completely disable
        $csp[] = "object-src 'none'";
        
        // Base URI - restrict to self
        $csp[] = "base-uri 'self'";
        
        // Form actions - restrict to self
        $csp[] = "form-action 'self'";
        
        // Upgrade insecure requests
        if (config('app.env') === 'production') {
            $csp[] = "upgrade-insecure-requests";
        }
        
        return implode('; ', $csp);
    }
}