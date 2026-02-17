<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greet', [GreetController::class, 'greet']);

Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

