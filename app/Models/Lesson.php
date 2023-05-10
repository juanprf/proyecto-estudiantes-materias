<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $with = [
        
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class,'student_lessons','lesson_id','student_id')->orderBy('students.name');
    }
}
