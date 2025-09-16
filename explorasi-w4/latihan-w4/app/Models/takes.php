<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class takes extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'enroll_date',
        'student_id',
        'course_id',
    ];

    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo(students::class, 'student_id', 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(courses::class, 'course_id', 'course_id');
    }
}
