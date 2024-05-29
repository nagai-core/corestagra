<?php

// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get("/signUp", [UserController::class, 'index'])->name('signUp.index');
// Route::post("/confirm", [UserController::class, 'show'])->name('signUp.create');
// Route::post("/complete", [UserController::class, 'store'])->name('signUp.store');
Route::get('/complete', function(){
    return view('signUp.complete');
});

Route::middleware("auth")->group(function() {
    Route::get('/test', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
