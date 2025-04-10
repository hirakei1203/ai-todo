@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">タスク一覧</h2>
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                
                @if(count($tasks) > 0)
                    <ul class="list-group">
                        @foreach($tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $task['name'] }}
                                <div>
                                    <button class="notion-btn notion-btn-success btn-sm me-2">完了</button>
                                    <button class="notion-btn notion-btn-danger btn-sm">削除</button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center my-4">タスクがありません。AIコマンドを使って追加してみましょう。</p>
                @endif
            </div>
        </div>

        <!-- AIコマンドフォーム -->
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="mb-0">AIにコマンドを送信</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('ai.command') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ai_input" class="form-label">あなたの指示</label>
                        <textarea class="form-control" id="ai_input" name="ai_input" rows="3" placeholder="例：今週の水曜日までに報告書を書くタスクを追加して"></textarea>
                    </div>
                    <button type="submit" class="notion-btn notion-btn-primary">送信</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 