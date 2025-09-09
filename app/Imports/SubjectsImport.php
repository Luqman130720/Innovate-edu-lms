<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Facades\Log;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\User;

class SubjectsImport implements ToModel, WithHeadingRow
{
    public function __construct()
    {
        HeadingRowFormatter::default('none'); // biar header tidak diubah
    }

    public function model(array $row)
    {
        $classroom = Classroom::where('class_code', $row['Kode Kelas'])->first();
        $teacher   = User::where('nip', $row['Guru Pengampu (Nip)'])->first();

        // Skip kalau subject_code sudah ada
        if (Subject::where('subject_code', $row['Kode Mapel'])->exists()) {
            return null;
        }

        if ($classroom && $teacher) {
            return new Subject([
                'subject_code' => $row['Kode Mapel'],
                'subject_name' => $row['Nama Mapel'],
                'class_id'     => $classroom->id,
                'teacher_id'   => $teacher->id,
            ]);
        }

        return null;
    }
}
