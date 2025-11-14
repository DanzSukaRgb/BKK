<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek role
        if (Auth::user()->role !== 'perusahaan') {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
