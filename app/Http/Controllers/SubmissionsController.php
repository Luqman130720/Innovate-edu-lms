<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('teacher')->user();
        $submissions = Submission::with(['assignment.subject', 'student'])->latest()->get();
        $title = 'Penilaian Tugas';

        return view(
            'teacher::submissions.index',

            compact(
                'user',
                'submissions',
                'title',
            )
        );
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
    public function show(Submission $submissions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submissions)
    {
        //
    }

    public function updateScore(Request $request, Submission $submission)
    {
        $request->validate([
            'score' => 'nullable|integer|min:0|max:100',
            'feedback' => 'nullable|string',
        ]);

        $submission->update([
            'score' => $request->score,
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'Penilaian berhasil disimpan.');
    }



    // Student Methods
    // Untuk siswa melihat semua nilai

    public function evaluations()
    {
        $user = Auth::guard('student')->user(); // langsung student
        $submissions = $user->submissions()
            ->with('assignment.subject', 'assignment.classroom')
            ->get();

        $title = 'Daftar Penilaian';

        return view('student::assignments.evaluations', compact('user', 'submissions', 'title'));
    }
}
