<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudenttLesson;
use App\Models\Student;
use App\Models\Lesson;

class StudentLessonController extends Controller
{


    public function index()
{
    // Obtener todos los registros de student_lessons de la base de datos
    $studentLessons = StudenttLesson::all();

    // Retornar la vista con los datos de student_lessons
    return view('student_lesson.index', compact('studentLessons'));
}



        public function create()
    {
        $students = Student::all();
        $lessons = Lesson::all();

        return view('student_lesson.create', compact('students', 'lessons'));
    }


        public function show(StudenttLesson $studentLesson)
    {
        // Obtener los datos de la relación de estudiante y materia
        $student = $studentLesson->student;
        $lesson = $studentLesson->lesson;

        // Pasar los datos a la vista
        return view('student_lesson.show', compact('studentLesson', 'student', 'lesson'));
    }



    public function store(Request $request)

    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'lesson_id' => 'required|exists:lessons,id'
        ]);

        $studentLesson = new StudenttLesson();
        $studentLesson->student_id = $request->student_id;
        $studentLesson->lesson_id = $request->lesson_id;
        $studentLesson->save();

        return redirect()->route('student-lesson.create')->with('success', 'Vinculación creada correctamente');
    }


}
