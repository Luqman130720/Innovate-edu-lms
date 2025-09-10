<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class VirtualClass extends Model
{
    use HasFactory;

    protected $table = 'virtual_classes';

    protected $fillable = [
        'teacher_id',
        'classroom_id',
        'subject_id',
        'agenda',
        'date',
        'start_time',
        'end_time',
        'virtual_class_link',
        'description',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
