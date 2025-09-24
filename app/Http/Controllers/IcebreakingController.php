<?php

namespace App\Http\Controllers;

use App\Models\Icebreaking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Subject;

class IcebreakingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Ice Breaking';
        $user = Auth::guard('teacher')->user();
        $icebreakings = Icebreaking::with(['classroom', 'subject.teacher'])
            ->whereHas('subject', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            })
            ->get();
        // dd($icebreakings);
        return view(
            'teacher::icebreaker.index',
            compact(
                'user',
                'title',
                'icebreakings',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Ice Breaking';
        $user = Auth::guard('teacher')->user();
        $classrooms = Classroom::where('homeroom_teacher_id', $user->id)->get();
        $subjects = Subject::where('teacher_id', $user->id)->get();
        return view(
            'teacher::icebreaker.create',
            compact(
                'title',
                'user',
                'classrooms',
                'subjects',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'platform' => 'required|string',
            'game_link' => 'required|url',
            'instructions' => 'nullable|string',
            'classroom_id' => 'required|exists:classrooms,id',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $icebreaking = new Icebreaking();
        $icebreaking->event_name = $request->event_name;
        $icebreaking->platform = $request->platform;
        $icebreaking->game_link = $request->game_link;
        $icebreaking->instructions = $request->instructions;
        $icebreaking->classroom_id = $request->classroom_id;
        $icebreaking->subject_id = $request->subject_id;
        $icebreaking->date = $request->date;
        $icebreaking->start_time = $request->start_time;
        $icebreaking->end_time = $request->end_time;

        $icebreaking->save();

        return redirect()->route('teacher.icebreaking.index')->with('success', 'Data Icebreaking berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Icebreaking $icebreaking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Icebreaking $icebreaking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Icebreaking $icebreaking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Icebreaking $icebreaking, $id)
    {
        $icebreaking = Icebreaking::findOrFail($id);

        $icebreaking->delete();

        return redirect()->route('teacher.icebreaking.index')->with('success', 'Data Icebreaking berhasil dihapus');
    }

    public function studentIcebreakingIndex()
    {
        $title = 'Ice Breaking';
        $user = Auth::guard('student')->user();

        $icebreakings = Icebreaking::with(['classroom', 'subject.teacher'])
            ->where('classroom_id', $user->classroom_id)
            ->get();

        return view(
            'student::icebreaker.index',
            compact(
                'user',
                'title',
                'icebreakings',
            )
        );
    }
}
