<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageController::class, 'index'])->name('index');

Route::post('/upload', [ImageController::class, 'upload'])->name('upload');

