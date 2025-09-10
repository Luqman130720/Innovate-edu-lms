<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Icebreaking extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'platform',
        'game_link',
        'instructions',
        'classroom_id',
        'subject_id',
        'date',
        'start_time',
        'end_time',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
