<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class MustChangePassword
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil user dari semua guard
        $user = Auth::guard('student')->user()
            ?? Auth::guard('teacher')->user()
            ?? Auth::guard('operator')->user();


        // Jika belum login
        if (!$user) {
            return redirect('/')->withErrors('Unauthorized access. Please log in.');
        }

        // Lanjutkan request
        return $next($request);
    }
}
