<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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
})->name('home');

Route::resource('books', BooksController::class);

Route::get('/books/{book}/details', [BooksController::class, 'details'])->name('books.details');

Route::view('/about', 'about')->name('about');

// Route::get('/projects/{project}/show', [ProjectController::class, 'show'] )->name('projects.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
