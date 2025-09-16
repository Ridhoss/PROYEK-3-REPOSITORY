<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_code',
        'course_name',
        'credits',
    ];

    public $timestamps = true;

    public function students()
    {
        return $this->belongsToMany(students::class, 'takes', 'course_id', 'student_id')
            ->withPivot('enroll_date')
            ->withTimestamps();
    }
}
