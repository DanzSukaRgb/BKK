<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerusahaanMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->isPerusahaan()) {
            abort(403, 'Hanya perusahaan yang dapat mengakses halaman ini');
        }

        return $next($request);
    }
}