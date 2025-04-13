<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\UseCases\Task\CreateTaskUseCase;
use App\Application\UseCases\Task\EditTaskUseCase;
use App\Application\UseCases\Task\DeleteTaskUseCase;
use App\Infrastructure\Repositories\TaskRepository;

class TaskController extends Controller
{
    private TaskRepository $taskRepository;
    private CreateTaskUseCase $createTaskUseCase;
    private EditTaskUseCase $editTaskUseCase;
    private DeleteTaskUseCase $deleteTaskUseCase;

    public function __construct(
        TaskRepository $taskRepository,
        CreateTaskUseCase $createTaskUseCase,
        EditTaskUseCase $editTaskUseCase,
        DeleteTaskUseCase $deleteTaskUseCase
    ) {
        $this->taskRepository = $taskRepository;
        $this->createTaskUseCase = $createTaskUseCase;
        $this->editTaskUseCase = $editTaskUseCase;
        $this->deleteTaskUseCase = $deleteTaskUseCase;
    }

    public function index()
    {
        $tasks = $this->taskRepository->findAll();
        // ビューに渡すために配列に変換
        $tasksArray = array_map(function ($task) {
            return [
                'id' => $task->getId(),
                'name' => $task->getName(),
                'completed' => $task->isCompleted()
            ];
        }, $tasks);
        
        return view('welcome', ['tasks' => $tasksArray]);
    }

    public function aiCommand(Request $request)
    {
        $command = $request->input('ai_input');
        // OpenAIに投げて処理（後で作る）
        return back()->with('message', 'AIにコマンドを送信しました！');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->createTaskUseCase->execute($data);

        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました');
    }

    public function edit($id)
    {
        $task = $this->taskRepository->findById($id);
        
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'タスクが見つかりません');
        }
        
        return view('tasks.edit', [
            'task' => [
                'id' => $task->getId(),
                'name' => $task->getName(),
                'completed' => $task->isCompleted()
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'completed' => 'boolean',
        ]);

        $this->editTaskUseCase->execute($id, $data);

        return redirect()->route('tasks.index')->with('success', 'タスクが更新されました');
    }

    public function delete($id)
    {
        $task = $this->taskRepository->findById($id);
        
        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'タスクが見つかりません');
        }
        
        $this->deleteTaskUseCase->execute($id);

        return redirect()->route('tasks.index')->with('success', 'タスクが削除されました');
    }
}
