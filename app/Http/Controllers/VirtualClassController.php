<?php

namespace App\Http\Controllers;

use App\Models\VirtualClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Subject;

class VirtualClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('teacher')->user();
        $virtualClasses = VirtualClass::with(['classroom', 'subject.teacher', 'classroom'])
            ->whereHas('subject', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            })->get();
        $title = 'Kelas Virtual - Online';

        return view(
            'teacher::virtual-class.index',

            compact(
                'user',
                'virtualClasses',
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
        $classrooms = Classroom::all();
        $subjects = Subject::where('teacher_id', $user->id)->get();
        $title = 'Kelas Virtual - Online';
        return view(
            'teacher::virtual-class.create',

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
            'classroom_id' => 'required|integer|exists:classrooms,id',
            'subject' => 'required|integer|exists:subjects,id',
            'agenda' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'virtual_class_link' => 'required|url',
            'description' => 'nullable|string',
        ]);

        VirtualClass::create([
            'classroom_id' => $request->input('classroom_id'),
            'subject_id' => $request->input('subject'),
            'agenda' => $request->input('agenda'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'virtual_class_link' => $request->input('virtual_class_link'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('teacher.virtual-class.index')->with('success', 'Kelas virtual berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VirtualClass $virtualClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VirtualClass $virtualClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VirtualClass $virtualClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VirtualClass $virtualClass, $id)
    {
        $virtualClass = VirtualClass::findOrFail($id);
        $virtualClass->delete();
        return redirect()->route('teacher.virtual-class.index')->with('success', 'Kelas virtual berhasil dihapus.');
    }


    public function studentVirtualClassIndex()
    {
        $user = Auth::guard('student')->user();
        $virtualClasses = VirtualClass::with(['classroom', 'subject.teacher', 'classroom'])
            ->whereHas('subject', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            })->get();
        $title = 'Kelas Virtual - Online';

        return view(
            'student::virtual-class.index',

            compact(
                'user',
                'virtualClasses',
                'title',
            )
        );
    }
}
