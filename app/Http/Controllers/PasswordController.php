<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangeForm()
    {
        // Tentukan guard mana yang sedang login
        if (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.index')
                ->with('forcePasswordModal', 'teacher');
        }

        if (Auth::guard('student')->check()) {
            return redirect()->route('student.index')
                ->with('forcePasswordModal', 'student');
        }

        return redirect('/')->withErrors('Unauthorized access. Please log in.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ambil user yang login (teacher atau student)
        $user = Auth::guard('teacher')->user() ?? Auth::guard('student')->user();

        if (!$user) {
            return redirect('/')->withErrors('Unauthorized access. Please log in.');
        }

        // Update password dan tandai sudah ganti
        $user->password = Hash::make($request->password);
        $user->must_change_password = false;
        $user->save();

        // Hapus session modal
        session()->forget('forcePasswordModal');

        // Logout user dari semua guard yang mungkin aktif
        Auth::guard('teacher')->logout();
        Auth::guard('student')->logout();

        // Redirect ke login page
        return redirect('/')->with('success', 'Password berhasil diperbarui. Silakan login dengan password baru.');
    }
}
