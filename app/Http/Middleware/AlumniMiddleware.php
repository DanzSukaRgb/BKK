<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlumniMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'alumni') {
            return $next($request);
        }

        abort(403, 'Akses ditolak.');
    }
}