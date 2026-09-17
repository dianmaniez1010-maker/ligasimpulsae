<?php

namespace App\Http\Middleware;

Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN apakah user adalah admin (is_admin == true)
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Jika bukan admin, tendang balik ke halaman login atau tampilkan error 403
        abort(403, 'Akses Ditolak! Halaman ini hanya untuk Administrator.');
    }
}