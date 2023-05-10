<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    protected $hidden = [
        'password'
    ];

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class,'student_lessons','student_id','lesson_id')->orderBy('lessons.name');
    }
}

