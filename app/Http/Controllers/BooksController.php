<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Request;

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

    public function search(){
        $query = Request::input('q');
        $book = Book::where('title','LIKE','%'.$query.'%')->orWhere('authors','LIKE','%'.$query.'%')->get();
        if(count($book) > 0)
            return view('books/list')->withDetails($book)->withQuery($query);
        else return view ('index');
    }
}
