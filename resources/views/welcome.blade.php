<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-7 mx-auto">
        <div class="d-flex align-items-center mb-4">
            <h1 class="mb-0">AI ToDo App</h1>
            <span class="ms-2 fs-3">📝</span>
        </div>

        <!-- タスク一覧 -->
        <div class="card mb-4">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0">Today's Tasks</h2>
            </div>
            <ul class="list-group list-group-flush">
                @if(count($tasks) > 0)
                    @foreach($tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $task->title }}</strong><br>
                                <small class="text-muted">Due date: {{ $task->due_date }}</small>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-success">Complete</button>
                                <button class="btn btn-sm btn-danger ms-2">Delete</button>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item text-center py-4">
                        <p class="text-muted mb-0">No tasks yet. Try adding one below!</p>
                    </li>
                @endif
            </ul>
        </div>

        <!-- 自然文入力欄 -->
        <div class="card">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0">Command AI Assistant</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('ai.command') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ai_input" class="form-label">Type your command:</label>
                        <input type="text" name="ai_input" class="form-control" 
                               placeholder="Add 'Meeting' tomorrow at 9am">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit Command</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
