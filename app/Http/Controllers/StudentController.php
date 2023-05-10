<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentStoreRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('lessons')->get();
        return inertia('Student/Index',[
            'students' => $students,
        ]);
    }
    
    public function create()
    {
        return inertia('Student/Create');
    }
    
    public function store(StudentStoreRequest $request)
    {
        return DB::transaction(function()use($request){
            $student = new Student($request->only('name','email'));
            $student->password = bcrypt('123456');
            $student->save();
            return redirect()->route('student.show',$student->id);
        });
    }

    public function show(Student $student)
    {
        return inertia('Student/Show',[
            'student' => $student,
            'lessons' => Lesson::whereNotIn('id',$student->lessons->pluck('id')->toArray())->get(),
        ]);
    }

    public function edit(Student $student)
    {
        return inertia('Student/Edit',[
            'student' => $student,
        ]);
    }

    public function update(StudentUpdateRequest $request, Student $student)
    {
        return DB::transaction(function()use($request,$student){
            $student->fill($request->only('name','email'));
            $student->save();
            return redirect()->route('student.show',$student->id);
        });
    }




    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'El estudiante ha sido eliminado exitosamente.');
    }


}
