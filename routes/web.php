<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('anggota', AnggotaController::class)->parameters([
    'anggota' => 'anggota'
]);

Route::resource('article', ArticleController::class)->parameters([
    'article' => 'article'
]);

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

Route::resource('categories', CategoryController::class);

Route::resource('buku', BukuController::class)->parameters([
    'buku' => 'buku'
]);

require __DIR__.'/auth.php';
