<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('books', BooksController::class);

Route::get('/books/{book}/details', [BooksController::class, 'details'])->name('books.details');
Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create')->middleware('auth');

Auth::routes();

Route::any('/search', [BooksController::class, 'search'])->name('search');

Route::resource('genres', GenreController::class);
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit')->middleware('auth');
Route::any('/genres/list', [GenreController::class, 'list'])->name('genres.list')->middleware('auth');
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create')->middleware('auth');
