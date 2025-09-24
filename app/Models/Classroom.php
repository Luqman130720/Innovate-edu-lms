<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    protected $fillable = [
        'class_code',
        'class_name',
        'grade_level',
        'homeroom_teacher_id',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }

    public function homeroomTeacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'homeroom_teacher_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
