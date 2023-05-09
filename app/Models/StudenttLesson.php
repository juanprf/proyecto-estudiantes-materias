<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudenttLesson extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'lesson_id'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
