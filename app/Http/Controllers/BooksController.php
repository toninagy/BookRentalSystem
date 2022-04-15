<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Http\Requests\BorrowFormRequest;
use App\Models\Book;
use App\Models\Borrow;
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
        $genre = Genre::where('id','=',$book->genres)->get();
        return view('books.detail', [
            'book' => $book,
            'genre' => $genre
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
        $genre = Genre::where('id','=',$book->genres)->get();
        if(Auth::user()) {
            $is_borrowed = Borrow::where('reader_id','=',Auth::user()->id)->where('book_id','=',$book->id)->get();
        }
        else {
            $is_borrowed = null;
        }
        return view('books.detail', [
            'book' => $book,
            'is_borrowed' => $is_borrowed,
            'genre' => $genre
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
        $validated_data['genres'] = $request->input('genres')[0];
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
        $validated_data['genres'] = $request->input('genres')[0];
        Book::create($validated_data);
        return redirect()->route('books.index');
    }

    public function borrow(Book $book, BorrowFormRequest $request)
    {
        $validated_data = $request->validated();
        Borrow::create($validated_data);
        return redirect()->route('books.details', $book['id']);
    }

    public function search()
    {
        $query = Request::input('query');
        $book = Book::where('title','LIKE','%'.$query.'%')->orWhere('authors','LIKE','%'.$query.'%')->get();
        $no_results = "No results :(";
        if(count($book) > 0)
            return view('books/list')->withDetails($book)->withQuery($query);
        else return view ('index', [
            'genres' => Genre::all()
        ])->withDetails($no_results);
    }
}
