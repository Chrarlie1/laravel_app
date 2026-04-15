<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('greet');
});

Route::get('/greet', [GreetController::class, 'greet']);

Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

Route::resource('tasks', TaskController::class);

