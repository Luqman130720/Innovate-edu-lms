<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::guard('teacher')->user();
        $totalSubjects = Subject::where('teacher_id', $user->id)->count();
        $teacherAssignments = Assignment::whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        });

        $totalAssignments = $teacherAssignments->count();
        $totalClassrooms = $teacherAssignments->distinct('classroom_id')->count('classroom_id');

        // Query utama: assignments yang dimiliki oleh guru yang login
        // Menggunakan withCount untuk submissions
        $assignments = Assignment::with(['subject', 'classroom.students'])
            ->withCount('submissions')
            ->whereHas('subject', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            });

        // --- Logika Filter ---
        if ($request->filled('subject_id')) {
            $assignments->whereHas('subject', function ($query) use ($request) {
                $query->where('id', $request->subject_id);
            });
        }

        if ($request->filled('assignment_title')) {
            $assignments->where('title', 'like', '%' . $request->assignment_title . '%');
        }

        if ($request->filled('classroom_id')) {
            $assignments->whereHas('classroom', function ($query) use ($request) {
                $query->where('id', $request->classroom_id);
            });
        }

        $assignments = $assignments->get();

        // Logika filter status pengumpulan (collection_status)
        if ($request->filled('collection_status')) {
            $assignments = $assignments->filter(function ($assignment) use ($request) {
                $totalStudents = $assignment->classroom->students->count();
                $submittedCount = $assignment->submissions_count;

                if ($request->collection_status === 'completed') {
                    return $totalStudents > 0 && $submittedCount === $totalStudents;
                } elseif ($request->collection_status === 'in_progress') {
                    return $submittedCount > 0 && $submittedCount < $totalStudents;
                } elseif ($request->collection_status === 'not_started') {
                    return $submittedCount === 0;
                }
                return true;
            });
        }

        // --- Akhir Logika Filter ---

        $assignments = $assignments->sortByDesc('created_at');

        $subjects = Subject::where('teacher_id', $user->id)->get();
        $classrooms = Classroom::whereHas('assignments.subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->get();

        $title = 'Penilaian Tugas';
        return view(
            'teacher::submissions.index',
            compact(
                'user',
                'assignments',
                'title',
                'subjects',
                'classrooms',
                'totalSubjects',
                'totalAssignments',
                'totalClassrooms'
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

    public function evaluations(Submission $submission)
    {
        $user = Auth::guard('student')->user(); // langsung student
        $submissions = $user->submissions()
            ->with('assignment.subject', 'assignment.classroom')
            ->get();

        $title = 'Daftar Penilaian';

        return view('student::assignments.evaluations', compact('user', 'submissions', 'title'));
    }
}
