<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Cari kelas
        $classroom = Classroom::where('class_code', $row['kelas'])->first();

        // Skip jika nis atau nisn sudah ada
        if (
            Student::where('nis', $row['nis_sekolah'])->exists() ||
            Student::where('nisn', $row['nisn'])->exists()
        ) {
            return null; // skip
        }

        return new Student([
            'nis' => $row['nis_sekolah'],
            'nisn' => $row['nisn'],
            'full_name' => $row['nama'],
            'classroom_id' => $classroom?->id,
            'gender' => ($row['jenis_kelamin'] === 'L') ? 'L' : 'P',
            'date_of_birth' => !empty($row['Tanggal Lahir'])
                ? Carbon::parse($row['Tanggal Lahir'])->format('Y-m-d')
                : null,
            'place_of_birth' => $row['tempat_lahir'],
            'address' => $row['alamat'],
            'city' => null,
            'province' => null,
            'postal_code' => null,
            'country' => 'Indonesia',
            'phone_number' => null,
            'emergency_contact' => null,
            'email' => $row['email'],
            'religion' => $row['agama'],
            'profile_picture' => $row['foto_profil'] ?? null,
            'password' => Hash::make($row['password'] ?? $row['nisn']),
            'role' => 'student',
        ]);
    }
}
