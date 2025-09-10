<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function loginTeacher(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('teacher')->attempt($credentials, $request->filled('remember'))) {
            $user = Auth::guard('teacher')->user();

            // Cek apakah wajib ganti password
            if ($user->must_change_password) {
                session(['forcePasswordModal' => 'teacher']);
            }

            return redirect()->intended('/teacher');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }


    public function loginOperator(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('Login attempt:', $credentials);

        if (Auth::guard('operator')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/operator');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }


    public function loginStudent(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('nisn', 'password');

        if (Auth::guard('student')->attempt($credentials, $request->filled('remember'))) {
            $user = Auth::guard('student')->user();

            // Cek apakah wajib ganti password
            if ($user->must_change_password) {
                // Set session untuk modal
                session(['forcePasswordModal' => 'student']);
            }

            return redirect()->intended('/student');
        }

        return back()->withErrors(['nisn' => 'NISN atau password salah.']);
    }


    public function logout(Request $request)
    {
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        } elseif (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
        } elseif (Auth::guard('operator')->check()) {
            Auth::guard('operator')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil logout. Sampai jumpa!');
    }
}
