<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('teacher')->user();
        $totalSubjects = Subject::where('teacher_id', $user->id)->count();
        $teacherAssignments = Assignment::whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        });

        $totalAssignments = $teacherAssignments->count();
        $totalClassrooms = $teacherAssignments->distinct('classroom_id')->count('classroom_id');
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
        $user = Auth::guard('teacher')->user();
        $totalSubjects = Subject::where('teacher_id', $user->id)->count();
        $teacherAssignments = Assignment::whereHas('subject', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        });

        $totalAssignments = $teacherAssignments->count();
        $totalClassrooms = $teacherAssignments->distinct('classroom_id')->count('classroom_id');
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
                'totalSubjects',
                'totalAssignments',
                'totalClassrooms'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $user = Auth::guard('teacher')->user();
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'publisher' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'classroom_id' => 'required|exists:classrooms,id',
        'subject_id' => 'required|exists:subjects,id',
        'file' => 'required|file|mimes:pdf,ppt,pptx,doc,docx,xls,xlsx|max:10240',
        'link' => 'nullable|url',
        'cover_image' => 'nullable|string',
    ]);

    $fileKontenPath = $request->file('file')->store('file_materials', 'public');

    $coverImagePath = null;
    $base64Image = $request->input('cover_image');

    if ($base64Image) {
        // Cek apakah data base64 adalah gambar default atau data gambar
        if (Str::startsWith($base64Image, 'assets/')) {
            // Jika itu path default, simpan path-nya saja
            $coverImagePath = $base64Image;
        } else {
            // Jika itu data base64, proses dan simpan gambarnya
            $base64Data = substr($base64Image, strpos($base64Image, ',') + 1);
            $imageData = base64_decode($base64Data);

            if ($imageData) {
                $fileName = 'cover_images/' . Str::uuid() . '.jpg';
                Storage::disk('public')->put($fileName, $imageData);
                $coverImagePath = $fileName;
            } else {
                // Jika decoding gagal, gunakan gambar default
                $coverImagePath = 'assets/dashboard/img/bg-profile.jpg';
            }
        }
    }

    Material::create([
        'title' => $request->title,
        'author' => $request->author,
        'publisher' => $request->publisher,
        'description' => $request->description,
        'classroom_id' => $request->classroom_id,
        'subject_id' => $request->subject_id,
        'teacher_id' => $user->id,
        'file' => $fileKontenPath,
        'link' => $request->link,
        'cover_image' => $coverImagePath,
    ]);

    return redirect()->route('teacher.materials.index')->with('success', 'Konten berhasil disimpan.');
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


    // Student Pages
    //Materials
    public function studentMaterialsIndex()
    {
        $user = Auth::guard('student')->user();

        $materials = Material::with(['classroom', 'subject', 'teacher'])
            ->where('classroom_id', $user->classroom_id)
            ->get();

        $title = 'Materi Pelajaran';

        return view(
            'student::materials.index',
            compact('user', 'materials', 'title')
        );
    }


    public function studentMaterialsShow($id)
    {
        $user = Auth::guard('student')->user();
        $title = 'Materi Pelajaran';
        $material = Material::with(['subject', 'classroom', 'teacher'])->findOrFail($id);
        return view(
            'student::materials.show',
            compact(
                'user',
                'material',
                'title'
            )
        );
    }
}
