<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\User;
use App\Models\Classroom;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil data guru yang sudah ada
        $teacher1 = User::where('nip', '197701012002111001')->first(); // Operator
        $teacher2 = User::where('nip', '197703032003123003')->first(); // Guru 1
        $teacher3 = User::where('nip', '197804042004124004')->first(); // Guru 2
        $teacher4 = User::where('nip', '197805052005125005')->first(); // Guru 3
        $teacher5 = User::where('nip', '197806062006126006')->first(); // Guru 4

        // Mengambil data kelas yang sudah ada
        $class1 = Classroom::where('class_code', 'CLASS10A')->first();
        $class2 = Classroom::where('class_code', 'CLASS10B')->first();
        $class3 = Classroom::where('class_code', 'CLASS10C')->first();

        Subject::create([
            'subject_code' => 'SUBJ001',
            'subject_name' => 'Matematika',
            'class_id' => $class1->id, // Kelas A
            'teacher_id' => $teacher2->id, // Guru 1
        ]);

        Subject::create([
            'subject_code' => 'SUBJ002',
            'subject_name' => 'Biologi',
            'class_id' => $class1->id, // Kelas A
            'teacher_id' => $teacher3->id, // Guru 2
        ]);

        Subject::create([
            'subject_code' => 'SUBJ003',
            'subject_name' => 'Kimia',
            'class_id' => $class2->id, // Kelas B
            'teacher_id' => $teacher4->id, // Guru 3
        ]);

        Subject::create([
            'subject_code' => 'SUBJ004',
            'subject_name' => 'Fisika',
            'class_id' => $class2->id, // Kelas B
            'teacher_id' => $teacher5->id, // Guru 4
        ]);

        Subject::create([
            'subject_code' => 'SUBJ005',
            'subject_name' => 'Bahasa Inggris',
            'class_id' => $class3->id, // Kelas C
            'teacher_id' => $teacher2->id, // Guru 1
        ]);
    }
}
