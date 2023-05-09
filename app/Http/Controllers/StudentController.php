<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{

        public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }



        public function show($id)
    {
        $student = Student::find($id);
        return view('students.show',  ['student' => $student]);
    }



        public function create()
    {
        return view('students.create');
    }



        public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6',
        ]);

        // Crear un nuevo estudiante con los datos del formulario
        $student = new Student();
        $student->email = $validatedData['email'];
        $student->password = Hash::make($validatedData['password']);
        $student->save();

        // Redireccionar a la página de detalles del estudiante
        return redirect()->route('students.show', ['student' => $student]);
    }




        public function edit($id)
    {
        $student = Student::find($id);

        if ($student) {
            return view('students.edit', ['student' => $student]);
        }

        return redirect()->route('students.index')->with('error', 'El estudiante que intentas editar no existe.');
    }




        public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:students,email,'.$id,
            'password' => 'required|min:8',
        ]);

        $student = Student::find($id);

        if ($student) {
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->save();
            return redirect()->route('students.index')->with('success', 'El estudiante ha sido actualizado exitosamente.');
        }

        return redirect()->route('students.index')->with('error', 'El estudiante que intentas actualizar no existe.');
    }




        public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'El estudiante ha sido eliminado exitosamente.');
        }

        return redirect()->route('students.index')->with('error', 'El estudiante que intentas eliminar no existe.');
    }


}
