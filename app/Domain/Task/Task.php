<?php

namespace App\Domain\Task;

class Task
{
    private int $id;
    private string $name;
    private bool $completed;

    public function __construct(int $id, string $name, bool $completed = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->completed = $completed;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function complete(): void
    {
        $this->completed = true;
    }

    public function incomplete(): void
    {
        $this->completed = false;
    }

    public function rename(string $name): void
    {
        $this->name = $name;
    }
} 