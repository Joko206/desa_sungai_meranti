<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            throw new AccessDeniedHttpException('Authentication required');
        }
        
        $user = Auth::user();
        
        // Get user role from relationship (support roleModel or role)
        $roleObj = $user->roleModel ?? $user->role ?? null;
        if (!$roleObj) {
            throw new AccessDeniedHttpException('User role not found');
        }
        $userRole = $roleObj->nama_role;
        
        if (!in_array($userRole, $roles)) {
            throw new AccessDeniedHttpException(
                'Access denied. Required role: ' . implode(' or ', $roles) .
                ', User role: ' . $userRole
            );
        }
        
        return $next($request);
    }
}
