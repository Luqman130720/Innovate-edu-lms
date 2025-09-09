<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            TeacherSeeder::class,
            ClassroomSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            // tambahkan seeder lain di sini
        ]);
    }
}
