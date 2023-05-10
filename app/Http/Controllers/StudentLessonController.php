<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudenttLesson;
use App\Models\Student;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class StudentLessonController extends Controller
{
    public function store(Student $student, Lesson $lesson)
    {
        return DB::transaction(function()use($student,$lesson){
            $student->lessons()->sync($lesson->id,false);
            return redirect()->back()->with('success', 'Asignación realiada correctamente');
        });
    }

    public function studentDestroy(Student $student, Lesson $lesson)
    {
        return DB::transaction(function()use($student,$lesson){
            if($student->lessons()->where('lesson_id',$lesson->id)->exists()){
                $student->lessons()->detach($lesson->id);
                return redirect()->back()->with('success', 'Asignación eliminada correctamente');
            }
            return redirect()->back()->with('success', 'La asignación ya no se encuentra activa');
        });
    }

    public function lessonDestroy(Student $student, Lesson $lesson)
    {
        return DB::transaction(function()use($student,$lesson){
            if($lesson->students()->where('student_id',$student->id)->exists()){
                $lesson->students()->detach($student->id);
                return redirect()->back()->with('success', 'Asignación eliminada correctamente');
            }
            return redirect()->back()->with('success', 'La asignación ya no se encuentra activa');
        });
    }

}
