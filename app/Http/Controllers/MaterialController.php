<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Subject;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('teacher')->user();
        $materials = Material::with(['classroom', 'subject.teacher', 'classroom'])
            ->whereHas('subject', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            })->get();
        $title = 'Materi Pelajaran';
        // $materials = Material::with(['classroom', 'subject'])->get();
        return view(
            'teacher::materials.index',

            compact(
                'user',
                'materials',
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
        // $classrooms = Classroom::all();
        $classrooms = Classroom::where('homeroom_teacher_id', $user->id)->get();
        $subjects = Subject::where('teacher_id', $user->id)->get();
        $title = 'Materi Pelajaran';
        return view(
            'teacher::materials.create',

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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'classroom_id' => 'required|exists:classrooms,id',
            'subject_id' => 'required|exists:subjects,id',
            'file' => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120',
            'link' => 'nullable|url',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $originalFileName = $request->file('file')->getClientOriginalName();
        $fileKontenPath = $request->file('file')->storeAs('file_materials', $originalFileName, 'public');

        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');
        }

        Material::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'classroom_id' => $request->classroom_id,
            'subject_id' => $request->subject_id,
            'file' => $fileKontenPath,
            'link' => $request->link,
            'cover_image' => $coverImagePath,
        ]);

        return redirect()->route('teacher.materials.index')->with('success', 'konten belajar berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material, $id)
    {
        $content = Material::find($id);

        if (!$content) {
            return redirect()->back()->with('error', 'Konten tidak ditemukan.');
        }

        if (file_exists(storage_path('app/public/' . $content->file))) {
            unlink(storage_path('app/public/' . $content->file));
        }

        if ($content->cover_image && file_exists(storage_path('app/public/' . $content->cover_image))) {
            unlink(storage_path('app/public/' . $content->cover_image));
        }

        $content->delete();

        return redirect()->route('teacher.materials.index')->with('success_delete', 'Konten berhasil dihapus.');
    }
}
