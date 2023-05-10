<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lesson\LessonStoreRequest;
use App\Http\Requests\Lesson\LessonUpdateRequest;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('students')->get();
        return inertia('Lesson/Index',[
            'lessons' => $lessons,
        ]);
    }

    public function create()
    {
        return inertia('Lesson/Create');
    }

    public function store(LessonStoreRequest $request)
    {
        return DB::transaction(function()use($request){
            $lesson = new Lesson($request->only('name'));
            $lesson->save();
            return redirect()->route('lesson.show',$lesson->id);
        });
    }

    public function show(Lesson $lesson)
    {
        return inertia('Lesson/Show', [
            'lesson' => $lesson->load('students'),
            'students' => Student::whereNotIn('id',$lesson->students->pluck('id')->toArray())->get(),
        ]);
    }

    public function edit(Lesson $lesson)
    {
        return inertia('Lesson/Edit',[
            'lesson' => $lesson
        ]);
    }

    
    
    public function update(LessonUpdateRequest $request, Lesson $lesson)
    {
        return DB::transaction(function()use($request,$lesson){
            $lesson->fill($request->only('name'));
            $lesson->save();
            return redirect()->route('lesson.show',$lesson->id);
        });
    }



    public function destroy($id)
    {
        $lesson = Lesson::find($id);

        if ($lesson) {
            $lesson->delete();
            return redirect()->route('lesson.index')->with('success', 'La lección ha sido eliminada exitosamente.');
        }

        return redirect()->route('lesson.index')->with('error', 'La lección que intentas eliminar no existe.');
    }

}
