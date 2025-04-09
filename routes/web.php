<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/ai-command', [TaskController::class, 'aiCommand'])->name('ai.command');


