<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Submission;
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

        return view(
            'teacher::assignments.show',
            compact(
                'user',
                'assignment',
                'title',
            )
        );
    }

    public function showSubmissions(Assignment $assignment)
    {
        $user = Auth::guard('teacher')->user();
        $students = $assignment->classroom->students;
        $title = 'Detail Tugas Siswa';
        $submissions = Submission::where('assignment_id', $assignment->id)
            ->with('student')
            ->get()
            ->keyBy('student_id');

        return view(
            'teacher::submissions.show',

            compact(
                'assignment',
                'students',
                'submissions',
                'title',
                'user',
            )
        );
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


    // Student Pages
    //Materials
    public function studentAssignmentsIndex()
    {
        $user = Auth::guard('student')->user();
        $assignments = Assignment::with(['classroom', 'subject', 'teacher'])->get();
        $title = 'Daftar Tugas';
        return view(
            'student::assignments.index',

            compact(
                'user',
                'assignments',
                'title',
            )
        );
    }
    public function studentAssignmentsShow($id)
    {
        $user = Auth::guard('student')->user();
        $title = 'Detail Tugas';

        $assignment = Assignment::with(['subject', 'classroom', 'classroom.students'])->findOrFail($id);

        $students = $assignment->classroom->students; // collection of Student

        $submissions = Submission::where('assignment_id', $assignment->id)
            ->with('student')
            ->get()
            ->keyBy('student_id'); // key by student_id

        return view(
            'student::assignments.show',

            compact(
                'user',
                'assignment',
                'title',
                'students',
                'submissions',
            )
        );
    }



    public function studentAssignmentsSubmit(Request $request, Assignment $assignment)
    {
        $request->validate([
            'assignment_file' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png',
        ]);

        // Simpan file ke storage/app/public/submissions
        $path = $request->file('assignment_file')->store('submissions', 'public');

        // Ambil ID student dari guard 'student'
        $studentId = Auth::guard('student')->user()->id;

        // Update kalau sudah pernah submit, kalau belum create baru
        Submission::updateOrCreate(
            [
                'assignment_id' => $assignment->id,
                'student_id'    => $studentId,
            ],
            [
                'file'         => $path,
                'submitted_at' => now(),
            ]
        );

        return back()->with('success', 'Tugas berhasil dikirim.');
    }
}
