<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', [
            'books' => $books,
          ]);
    }

    public function show(Book $book)
    {
        return view('books.detail', [
            'book' => $book
        ]);
    }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book
        ]);
    }

    public function details(Book $book) {
        return view('books.detail', [
            'book' => $book
        ]);
    }
}
