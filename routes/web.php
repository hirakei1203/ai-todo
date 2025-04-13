<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/ai-command', [TaskController::class, 'aiCommand'])->name('ai.command');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::delete('/tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');


