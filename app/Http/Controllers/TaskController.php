<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // サンプルデータ（後でDynamoDBから取得するように変更）
        $tasks = [
            ['id' => 1, 'name' => '買い物リストを作成する', 'completed' => false],
            ['id' => 2, 'name' => '週報を提出する', 'completed' => false],
            ['id' => 3, 'name' => '17時に会議の予定', 'completed' => false],
        ];
        return view('welcome', compact('tasks'));
    }

    public function aiCommand(Request $request)
    {
        $command = $request->input('ai_input');
        // OpenAIに投げて処理（後で作る）
        return back()->with('message', 'AIにコマンドを送信しました！');
    }
}
