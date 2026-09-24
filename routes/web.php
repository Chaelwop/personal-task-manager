<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])
    ->name('tasks.complete');

Route::resource('tasks', TaskController::class);