<?php

namespace App\Domain\Task;

interface TaskRepositoryInterface
{
    public function findById(int $id): ?Task;
    public function findAll(): array;
    public function save(Task $task): void;
    public function delete(int $id): void;
} 