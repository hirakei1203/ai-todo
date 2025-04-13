<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function findById(int $id): ?Task
    {
        // DBからデータを取得し、Taskエンティティに変換する実装
        // 今はダミーデータを返す
        return new Task($id, 'サンプルタスク');
    }

    public function findAll(): array
    {
        // すべてのタスクを取得する実装
        // 今はダミーデータを返す
        return [
            new Task(1, '買い物リストを作成する'),
            new Task(2, '週報を提出する'),
            new Task(3, '17時に会議の予定'),
        ];
    }

    public function save(Task $task): void
    {
        // タスクをDBに保存する実装
        // 今は何もしない
    }

    public function delete(int $id): void
    {
        // タスクをDBから削除する実装
        // 今は何もしない
    }
} 