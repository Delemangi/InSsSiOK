<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home-page');

Route::get('/dashboard', [PostController::class, 'my_posts'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('post-create');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('post-show');
Route::post('/posts', [PostController::class, 'store']);
Route::get('posts/edit/{slug}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit-post');
Route::post('/posts/update', [PostController::class, 'update']);
Route::post('/comments', [CommentController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
