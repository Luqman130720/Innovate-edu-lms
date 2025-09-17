<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::guard('operator')->user();
        $title = 'Profil';
        return view(
            'operator::profile.edit',

            compact(
                'user',
                'title',
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'degree' => 'required|string|max:10',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'postal_code' => 'nullable|string|max:10',
            'country' => 'nullable|string',
            'phone_number' => 'nullable|string|max:15',
            'about' => 'nullable|string',
            'place_of_birth' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'religion' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        $user = User::findOrFail($id);
        $user->nip = $request->input('nip');
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->degree = $request->input('degree');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->province = $request->input('province');
        $user->postal_code = $request->input('postal_code');
        $user->country = $request->input('country');
        $user->phone_number = $request->input('phone_number');
        $user->about = $request->input('about');
        $user->place_of_birth = $request->input('place_of_birth');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender = $request->input('gender');
        $user->religion = $request->input('religion');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('operator.profile.edit')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function edit_teacher()
    {
        $user = Auth::guard('teacher')->user();
        $title = 'Profil';
        return view(
            'teacher::profile.edit',

            compact(
                'user',
                'title',
            )
        );
    }

    public function update_teacher(Request $request, $id)
    {
        $request->validate([
            'nip' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'degree' => 'required|string|max:10',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'postal_code' => 'nullable|string|max:10',
            'country' => 'nullable|string',
            'phone_number' => 'nullable|string|max:15',
            'about' => 'nullable|string',
            'place_of_birth' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'religion' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        $user = User::findOrFail($id);
        $user->nip = $request->input('nip');
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->degree = $request->input('degree');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->province = $request->input('province');
        $user->postal_code = $request->input('postal_code');
        $user->country = $request->input('country');
        $user->phone_number = $request->input('phone_number');
        $user->about = $request->input('about');
        $user->place_of_birth = $request->input('place_of_birth');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender = $request->input('gender');
        $user->religion = $request->input('religion');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('teacher.profile.edit')->with('success', 'Data pengguna berhasil diperbarui.');
    }


    public function edit_student()
    {
        $student = Auth::guard('student')->user();
        $title = 'Profil';
        return view(
            'student::profile.edit',

            compact(
                'student',
                'title',
            )
        );
    }

    public function update_student(Request $request, $id)
    {
        $request->validate([
            'nis' => 'nullable|string|max:50|unique:students,nis,' . $id,
            'nisn' => 'nullable|string|max:50|unique:students,nisn,' . $id,
            'full_name' => 'required|string|max:255',
            'classroom_id' => 'nullable|exists:classrooms,id',
            'gender' => 'nullable|in:L,P',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'religion' => 'nullable|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $student = Student::findOrFail($id);
        $student->nis = $request->input('nis');
        $student->nisn = $request->input('nisn');
        $student->full_name = $request->input('full_name');
        $student->classroom_id = $request->input('classroom_id');
        $student->gender = $request->input('gender');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->place_of_birth = $request->input('place_of_birth');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->postal_code = $request->input('postal_code');
        $student->country = $request->input('country');
        $student->phone_number = $request->input('phone_number');
        $student->emergency_contact = $request->input('emergency_contact');
        $student->email = $request->input('email');
        $student->religion = $request->input('religion');

        if ($request->filled('password')) {
            $student->password = bcrypt($request->input('password'));
            $student->must_change_password = false; // jika password diubah
        }

        if ($request->hasFile('profile_picture')) {
            if ($student->profile_picture) {
                Storage::disk('public')->delete($student->profile_picture);
            }

            $student->profile_picture = $request->file('profile_picture')->store('students/profile_pictures', 'public');
        }

        $student->save();

        return redirect()->route('student.profile.edit')->with('success', 'Profil siswa berhasil diperbarui.');
    }
}
