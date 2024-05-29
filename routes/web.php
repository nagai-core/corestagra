<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageController::class, 'index'])->name('index');
Route::post('/upload', [ImageController::class, 'upload'])->name('upload');

// Route::get("/signUp", [UserController::class, 'index'])->name('signUp.index');
// Route::post("/confirm", [UserController::class, 'show'])->name('signUp.create');
// Route::post("/complete", [UserController::class, 'store'])->name('signUp.store');
Route::get('/complete', function(){
    return view('signUp.complete');
});

Route::middleware("auth")->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/test', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
