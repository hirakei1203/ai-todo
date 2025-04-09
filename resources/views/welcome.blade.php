<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">AI ToDo App 📝</h1>

    <!-- タスク一覧 -->
    <h2>Today's Tasks</h2>
    <ul class="list-group mb-4">
        @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $task->title }}</strong><br>
                    <small class="text-muted">Due date: {{ $task->due_date }}</small>
                </div>
                <div>
                    <a href="#" class="btn btn-sm btn-success">Complete</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- 自然文入力欄 -->
    <form action="{{ route('ai.command') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ai_input" class="form-label">Command AI:</label>
            <input type="text" name="ai_input" class="form-control" placeholder="Add 'Meeting' tomorrow at 9am">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
