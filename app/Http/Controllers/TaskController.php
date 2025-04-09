<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = []; // 仮データ or DynamoDBから取得
        return view('welcome', compact('tasks'));
    }

    public function aiCommand(Request $request)
    {
        $command = $request->input('ai_input');
        // OpenAIに投げて処理（後で作る）
        return back()->with('message', 'Command sent to AI!');
    }
}
