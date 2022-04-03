<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use App\Models\Genre;
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

    public function create(Book $book)
    {
        $genres = Genre::all();
        return view('books/create', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function store(BookFormRequest $request)
    {
        $validated_data = $request->validated();
        Book::create($validated_data);
        return redirect()->route('books.index');
    }

    public function search(){
        $query = Request::input('query');
        $book = Book::where('title','LIKE','%'.$query.'%')->orWhere('authors','LIKE','%'.$query.'%')->get();
        if(count($book) > 0)
            return view('books/list')->withDetails($book)->withQuery($query);
        else return view ('index');
    }
}
