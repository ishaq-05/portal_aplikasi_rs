<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('superadmin.login');
        }

        if (!auth()->user()->is_super_admin) {
            abort(403, 'Anda tidak memiliki akses ke halaman Super Admin.');
        }

        return $next($request);
    }
}
