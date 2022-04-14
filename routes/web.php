<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GenreController;
use App\Models\Genre;
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
    $genres = Genre::all();
    return view('index', [
        'genres' => $genres
    ]);
})->name('index');

Route::resource('books', BooksController::class);

Route::get('/books/{book}/details', [BooksController::class, 'details'])->name('books.details');
Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/books/{book}/borrow', [BooksController::class, 'borrow'])->name('books.borrow')->middleware('auth');

Auth::routes();

Route::any('/search', [BooksController::class, 'search'])->name('search');

Route::get('/genres/{genre}/filter', [GenreController::class, 'filter'])->name('genres.filter');
Route::resource('genres', GenreController::class);
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit')->middleware('auth');
Route::any('/genres/list', [GenreController::class, 'list'])->name('genres.list')->middleware('auth');
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create')->middleware('auth');

Route::resource('borrows', BorrowController::class);
Route::any('/borrows/list', [BorrowController::class, 'list'])->name('borrows.list')->middleware('auth');
Route::any('/borrows/{borrow}/edit', [BorrowController::class, 'edit'])->name('borrows.edit')->middleware('auth');
