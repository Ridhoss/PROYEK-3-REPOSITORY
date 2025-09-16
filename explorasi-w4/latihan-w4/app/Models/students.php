<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'nim',
        'major',
        'entry_year',
        'user_id'
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany(courses::class, 'takes', 'student_id', 'course_id')
            ->withPivot('enroll_date')
            ->withTimestamps();
    }
}
