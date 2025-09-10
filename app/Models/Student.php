<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'nis',
        'nisn',
        'full_name',
        'classroom_id',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'phone_number',
        'emergency_contact',
        'email',
        'religion',
        'profile_picture',
        'password',
        'role',
        'must_change_password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getAuthIdentifierName()
    {
        return 'nisn';
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
