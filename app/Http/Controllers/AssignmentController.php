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
    public function index(Request $request)
    {
        $user = Auth::guard('teacher')->user();
        $totalSubjects = Subject::where('teacher_id', $user->id)->count();
        $teacherAssignments = Assignment::whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        });

        $totalAssignments = $teacherAssignments->count();
        $totalClassrooms = $teacherAssignments->distinct('classroom_id')->count('classroom_id');

        // Assignments milik teacher
        $assignments = Assignment::with(['classroom', 'subject'])
            ->whereHas('subject', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            });

        // Filter tambahan
        if ($request->filled('classroom_id')) {
            $assignments->where('classroom_id', $request->classroom_id);
        }

        if ($request->filled('subject_id')) {
            $assignments->where('subject_id', $request->subject_id);
        }

        if ($request->filled('title')) {
            $assignments->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('deadline_start')) {
            $assignments->whereDate('deadline_date', '>=', $request->deadline_start);
        }

        if ($request->filled('deadline_end')) {
            $assignments->whereDate('deadline_date', '<=', $request->deadline_end);
        }

        if ($request->filled('has_file')) {
            $assignments->whereNotNull('file');
        }

        $assignments = $assignments->get();

        // Ambil data classrooms yang ada assignments-nya untuk teacher ini
        $classrooms = Classroom::whereHas('assignments.subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->get();

        // Ambil subjects milik teacher
        $subjects = Subject::where('teacher_id', $user->id)->get();

        $title = 'Tugas Siswa';
        return view('teacher::assignments.index', compact(
            'user',
            'assignments',
            'title',
            'classrooms',
            'subjects',
            'totalSubjects',
            'totalAssignments',
            'totalClassrooms'
        ));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::guard('teacher')->user();
        $totalSubjects = Subject::where('teacher_id', $user->id)->count();
        $teacherAssignments = Assignment::whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        });

        $totalAssignments = $teacherAssignments->count();
        $totalClassrooms = $teacherAssignments->distinct('classroom_id')->count('classroom_id');

        // Ambil semua subject teacher beserta kelasnya
        $subjects = Subject::where('teacher_id', $user->id)
            ->with('classroom')
            ->get();

        // Ambil semua classroom unik dari subject
        $classrooms = $subjects->pluck('classroom')->unique('id')->values();

        $title = 'Tugas Siswa';
        return view('teacher::assignments.create', compact(
            'user',
            'classrooms',
            'subjects',
            'title',
            'totalSubjects',
            'totalAssignments',
            'totalClassrooms'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id', // ubah dari 'subject'
            'title' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'task_date' => 'required|date',
            'task_time' => 'required',
            'deadline_date' => 'required|date',
            'deadline_time' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png,xlsx|max:5120',
            'file_link' => 'nullable|url',
            'description' => 'nullable|string'
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $originalFileName = $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('assignments', $originalFileName, 'public');
        }

        Assignment::create([
            'subject_id' => $request->subject_id, // ubah dari $request->subject
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
        $totalSubjects = Subject::where('teacher_id', $user->id)->count();
        $teacherAssignments = Assignment::whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        });

        $totalAssignments = $teacherAssignments->count();
        $totalClassrooms = $teacherAssignments->distinct('classroom_id')->count('classroom_id');
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
                'totalSubjects',
                'totalAssignments',
                'totalClassrooms'
            )
        );
    }

    public function showSubmissions(Assignment $assignment)
    {
        $user = Auth::guard('teacher')->user();
        $totalSubjects = Subject::where('teacher_id', $user->id)->count();
        $teacherAssignments = Assignment::whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        });

        $totalAssignments = $teacherAssignments->count();
        $totalClassrooms = $teacherAssignments->distinct('classroom_id')->count('classroom_id');
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
                'totalSubjects',
                'totalAssignments',
                'totalClassrooms'
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
    public function studentAssignmentsIndex()
    {
        $user = Auth::guard('student')->user();

        // Ambil tugas sesuai kelas siswa dan yang belum dikumpulkan
        $assignments = Assignment::with(['classroom', 'subject', 'teacher'])
            ->where('classroom_id', $user->classroom_id)
            ->whereDoesntHave('submissions', function ($query) use ($user) {
                $query->where('student_id', $user->id);
            })
            ->get();

        $title = 'Daftar Tugas';
        return view('student::assignments.index', compact('user', 'assignments', 'title'));
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
