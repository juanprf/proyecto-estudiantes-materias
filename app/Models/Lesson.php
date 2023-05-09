<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{

    use HasFactory;

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_lessons')->withTimestamps();
    }
}
