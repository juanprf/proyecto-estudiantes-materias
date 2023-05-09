<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
        public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }


        public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.show', ['lesson' => $lesson]);
    }


        public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lessons.edit', compact('lesson'));
    }

    
    
        public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->name = $request->input('name');
        $lesson->save();
        return redirect()->route('lessons.index');
    }



        public function destroy($id)
    {
        $lesson = Lesson::find($id);

        if ($lesson) {
            $lesson->delete();
            return redirect()->route('lessons.index')->with('success', 'La lección ha sido eliminada exitosamente.');
        }

        return redirect()->route('lessons.index')->with('error', 'La lección que intentas eliminar no existe.');
    }

}
