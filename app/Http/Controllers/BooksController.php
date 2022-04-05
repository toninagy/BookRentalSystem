<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
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
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        $genres = Genre::all();
        return view('books.edit', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function details(Book $book) {
        return view('books.detail', [
            'book' => $book
        ]);
    }

    public function create(Book $book)
    {
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        $genres = Genre::all();
        return view('books/create', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function update(Book $book, BookFormRequest $request) {
        $validated_data = $request->validated();
        $book->update($validated_data);
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function store(BookFormRequest $request)
    {
        $validated_data = $request->validated();
        Book::create($validated_data);
        return redirect()->route('books.index');
    }

    public function search()
    {
        $query = Request::input('query');
        $book = Book::where('title','LIKE','%'.$query.'%')->orWhere('authors','LIKE','%'.$query.'%')->get();
        if(count($book) > 0)
            return view('books/list')->withDetails($book)->withQuery($query);
        else return view ('index'); //TODO
    }
}
