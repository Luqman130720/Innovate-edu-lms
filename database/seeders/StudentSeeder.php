<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Classroom;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // ambil semua kelas yang sudah ada
        $classrooms = Classroom::pluck('id', 'class_code')->toArray();

        // buat 30 student random
        for ($i = 1; $i <= 30; $i++) {
            $classroomId = $faker->randomElement($classrooms);

            $gender = $faker->randomElement(['L', 'P']);
            $firstName = $gender === 'L' ? $faker->firstNameMale : $faker->firstNameFemale;
            $lastName = $faker->lastName;

            $profileFile = "studentProfileDefault.png"; // contoh file foto
            $destinationPath = 'profile_pictures/' . $profileFile;

            // kalau ada file di public/student{i}.png, copy ke storage
            $sourcePath = public_path($profileFile);
            if (file_exists($sourcePath)) {
                Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));
            }

            Student::create([
                'nis' => $faker->unique()->numerify('00######'),
                'nisn' => $faker->unique()->numerify('006#####'),
                'full_name' => $firstName . ' ' . $lastName,
                'classroom_id' => $classroomId,
                'gender' => $gender,
                'date_of_birth' => $faker->dateTimeBetween('2004-01-01', '2007-12-31')->format('Y-m-d'),
                'place_of_birth' => $faker->city,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'province' => $faker->state,
                'postal_code' => $faker->postcode,
                'country' => 'Indonesia',
                'phone_number' => $faker->phoneNumber,
                'emergency_contact' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'religion' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
                'profile_picture' => $destinationPath,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
