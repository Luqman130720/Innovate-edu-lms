<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('teacher')->user();
        $assignments = Assignment::with(['classroom', 'subject.teacher', 'classroom'])
        ->whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->get();
        $title = 'Tugas Siswa';
        return view(
            'teacher::assignments.index',
            compact(
                'user',
                'assignments',
                'title',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::guard('teacher')->user();
        $classrooms = Classroom::where('homeroom_teacher_id', $user->id)->get();
        $subjects = Subject::where('teacher_id', $user->id)->get();
        $title = 'Tugas Siswa';
        return view(
            'teacher::assignments.create',
            compact(
                'user',
                'classrooms',
                'subjects',
                'title',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'task_date' => 'required|date',
            'task_time' => 'required',
            'deadline_date' => 'required|date',
            'deadline_time' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png,xlsx|max:5120', // Maks 5MB
            'file_link' => 'nullable|url',
            'description' => 'nullable|string'
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $originalFileName = $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('assignments', $originalFileName, 'public');
        }

        Assignment::create([
            'subject_id' => $request->subject,
            'title' => $request->title,
            'classroom_id' => $request->classroom_id,
            'task_date' => $request->task_date,
            'task_time' => $request->task_time,
            'deadline_date' => $request->deadline_date,
            'deadline_time' => $request->deadline_time,
            'file' => $filePath,
            'file_link' => $request->file_link,
            'description' => $request->description,
        ]);

        return redirect()->route('teacher.assignments.index')->with('success', 'Tugas berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::guard('teacher')->user();
        $assignment = Assignment::with([
            'classroom',
            'subject',
            'teacher',
        ])->findOrFail($id);

        $title = 'Detail Tugas Siswa';

        return view('teacher::assignments.show',
            compact(
                'user',
                'assignment',
                'title',
            ));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment, $id)
    {
        $content = Assignment::find($id);

        if (!$content) {
            return redirect()->back()->with('error', 'Konten tidak ditemukan.');
        }

        if ($content->file && file_exists(storage_path('app/public/' . $content->file))) {
            unlink(storage_path('app/public/' . $content->file));
        }

        $content->delete();

        return redirect()->route('teacher.assignments.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
