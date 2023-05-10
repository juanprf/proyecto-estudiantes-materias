@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">{{ $lesson->name }}</div>
                    <div class="card-body">
                        <p>ID: {{ $lesson->id }}</p>

                        <a href="{{ route('lesson.edit', $lesson->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('lesson.destroy', $lesson->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
