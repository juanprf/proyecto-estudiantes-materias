<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_lessons')->withTimestamps();
    }
}
