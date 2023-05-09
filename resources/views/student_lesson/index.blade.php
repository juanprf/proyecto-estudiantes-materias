@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Lessons') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Student') }}</th>
                                <th scope="col">{{ __('Lesson') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentLessons as $studentLesson)
                            <tr>
                                <th scope="row">{{ $studentLesson->id }}</th>
                                <td>{{ $studentLesson->student->name }}</td>
                                <td>{{ $studentLesson->lesson->name }}</td>
                                <td>
                                    <a href="{{ route('student_lessons.show', $studentLesson->id) }}" class="btn btn-primary">{{ __('View') }}</a>
                                    <form action="{{ route('student_lessons.destroy', $studentLesson->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('student_lessons.create') }}" class="btn btn-success">{{ __('Create Student Lesson') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
