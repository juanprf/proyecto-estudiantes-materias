@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Vincular Estudiantes con Materias</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('student-lesson.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="student_id">Estudiante:</label>
                                <select class="form-control" name="student_id">
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="lesson_id">Materia:</label>
                                <select class="form-control" name="lesson_id">
                                    @foreach($lessons as $lesson)
                                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

