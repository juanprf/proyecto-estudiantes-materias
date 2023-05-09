@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Lesson Details') }}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="student" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>

                            <div class="col-md-6">
                                <input id="student" type="text" class="form-control" name="student" value="{{ $studentLesson->student->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lesson" class="col-md-4 col-form-label text-md-right">{{ __('Lesson') }}</label>

                            <div class="col-md-6">
                                <input id="lesson" type="text" class="form-control" name="lesson" value="{{ $studentLesson->lesson->title }}" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('student_lessons.index') }}" class="btn btn-primary">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
