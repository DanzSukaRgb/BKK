<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlumniMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->isAlumni()) {
            abort(403, 'Hanya alumni yang dapat mengakses halaman ini');
        }

        return $next($request);
    }
}
