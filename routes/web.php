<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function() {

Route::post('/upload', [ImageController::class, 'upload'])->name('images.upload');
Route::get('/search', [ImageController::class, 'search'])->name('images.search');
Route::get('/sort', [ImageController::class, 'sort'])->name('images.sort');

Route::get('/test', function () {
    return view('welcomeeeeee');
});
Route::get('/', [ImageController::class, 'index'])->name('index');
Route::post('/', [ImageController::class, 'upload'])->name('upload');
});

Route::get("/signUp", [UserController::class, 'index'])->name('signUp.index');
Route::post("/confirm", [UserController::class, 'show'])->name('signUp.create');
Route::post("/complete", [UserController::class, 'store'])->name('signUp.store');
Route::get('/complete', function(){
    return view('signUp.complete');
});
Route::get('/detail/{id}', [DetailController::class, 'show'])->name('detail.show');
Route::middleware("auth")->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post("/detail/{id}", [DetailController::class, 'store'])->name('detail.add');
    Route::delete("/detail/{id}", [DetailController::class, 'delete'])->name('detail.delete');
    Route::get('/detail/{imageId}/edit/{commentId}', [CommentController::class, 'edit'])->name('commentEdit.edit');
    Route::post('/detail/{imageId}/edit/{commentId}', [CommentController::class, 'update'])->name('commentEdit.update');
    Route::delete('/detail/{imageId}/edit/{commentId}', [CommentController::class, 'destroy'])->name('commentEdit.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
