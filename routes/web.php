<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageController::class, 'index'])->name('index');
Route::post('/upload', [ImageController::class, 'upload'])->name('upload');

Route::get('/test', function () {
    return view('welcomeeeeee');
});

Route::get("/signUp", [UserController::class, 'index'])->name('signUp.index');
Route::post("/confirm", [UserController::class, 'show'])->name('signUp.create');
Route::post("/complete", [UserController::class, 'store'])->name('signUp.store');
Route::get('/complete', function(){
    return view('signUp.complete');
});
