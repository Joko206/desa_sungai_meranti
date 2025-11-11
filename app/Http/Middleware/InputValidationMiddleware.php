<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class InputValidationMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Sanitize input data
        $this->sanitizeInput($request);
        
        return $next($request);
    }
    
    /**
     * Sanitize all input data
     */
    private function sanitizeInput(Request $request): void
    {
        // Sanitize all input data
        $sanitized = [];
        
        foreach ($request->all() as $key => $value) {
            if (is_string($value)) {
                // Remove potential XSS and injection attempts
                $sanitized[$key] = $this->sanitizeString($value);
            } elseif (is_array($value)) {
                // Recursively sanitize arrays
                $sanitized[$key] = $this->sanitizeArray($value);
            } else {
                $sanitized[$key] = $value;
            }
        }
        
        // Replace the request data with sanitized data
        $request->replace($sanitized);
    }
    
    /**
     * Sanitize string input
     */
    private function sanitizeString(string $value): string
    {
        // Remove null bytes
        $value = str_replace(chr(0), '', $value);
        
        // Remove potential script tags and dangerous characters
        $value = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $value);
        $value = preg_replace('/<iframe[^>]*>.*?<\/iframe>/is', '', $value);
        $value = preg_replace('/javascript:/i', '', $value);
        $value = preg_replace('/on\w+\s*=/i', '', $value);
        
        // Remove SQL injection patterns
        $value = preg_replace('/(\'\s*OR\s*\'|UNION\s+SELECT|INSERT\s+INTO|UPDATE\s+\w+|DELETE\s+FROM|DROP\s+TABLE)/i', '', $value);
        
        // Remove directory traversal attempts
        $value = str_replace(['../', '..\\', '....//', '.....///'], '', $value);
        
        // Remove control characters
        $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $value);
        
        // Trim whitespace
        $value = trim($value);
        
        return $value;
    }
    
    /**
     * Sanitize array input
     */
    private function sanitizeArray(array $array): array
    {
        $sanitized = [];
        
        foreach ($array as $key => $value) {
            if (is_string($value)) {
                $sanitized[$key] = $this->sanitizeString($value);
            } elseif (is_array($value)) {
                $sanitized[$key] = $this->sanitizeArray($value);
            } else {
                $sanitized[$key] = $value;
            }
        }
        
        return $sanitized;
    }
}