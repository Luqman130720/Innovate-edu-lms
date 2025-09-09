<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SubjectsImport;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $user = Auth::guard('operator')->user();
        return view(
            'operator::subject.index',

            compact(
                'user',
                'subjects',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $teachers = User::where('role', 'teacher')->get();
        $user = Auth::guard('operator')->user();
        return view(
            'operator::subject.create',

            compact(
                'user',
                'classrooms',
                'teachers',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject_code' => 'required|string|max:10|unique:subjects,subject_code',
            'subject_name' => 'required|string|max:255',
            'class_id' => 'required|exists:classrooms,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $subject = Subject::create($validatedData);

        return redirect()->route('operator.subjects.index')->with('success', 'Subject created successfully!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new SubjectsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data mata pelajaran berhasil diimpor!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('operator.subjects.index')->with('success', 'Mata pelajaran berhasil dihapus!');
    }
}
