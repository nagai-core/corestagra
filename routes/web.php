<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('welcomeeeeee');
});

Route::get("/signUp", [UserController::class, 'index']);
