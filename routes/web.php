<?php

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
use App\Http\Controllers\ArticleController;
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});



Route::get('/blog', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/blog/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/blog', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/blog/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/admin', [ArticleController::class, 'admin'])->name('admin.dashboard');
Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
Route::put('/admin/articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

