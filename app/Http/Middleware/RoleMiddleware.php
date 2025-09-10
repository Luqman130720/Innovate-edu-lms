<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, ...$roles)
    {

        $guards = ['student', 'teacher', 'operator'];
        $user = null;

        // Cari user dari guard yang login
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                break;
            }
        }
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                break;
            }
        }

        // dd(
        //     'Guards:',
        //     [
        //         'teacher' => Auth::guard('teacher')->check(),
        //         'student' => Auth::guard('student')->check(),
        //         'operator' => Auth::guard('operator')->check(),
        //     ],
        //     'User class:',
        //     get_class($user),
        //     'User role:',
        //     $user->role
        // );


        if (!$user) {
            return redirect('/')->withErrors('Unauthorized access. Please log in.');
        }

        // Cek role
        if (!in_array($user->role, $roles)) {
            return abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
