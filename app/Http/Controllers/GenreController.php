<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreFormRequest;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Support\Facades\Request;

class GenreController extends Controller
{
    public function filter()
    {
        $query = Request::input('query');
        $books = Book::where('genre','=',$query)->get();
        return view('genres/filter', [
            'books' => $books
        ]);
    }

    public function show()
    {
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        $genres = Genre::all();
        return view('genres/list', [
            'genres' => $genres
        ]);
    }

    public function edit(Genre $genre)
    {
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        return view('genres.edit', [
            'genre' => $genre
        ]);
    }

    public function create(Genre $genre)
    {
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        return view('genres/create', [
            'genre' => $genre
        ]);
    }

    public function update(Genre $genre, GenreFormRequest $request) {
        $validated_data = $request->validated();
        $genre->update($validated_data);
        return redirect()->route('genres.list');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.list');
    }

    public function store(GenreFormRequest $request)
    {
        $validated_data = $request->validated();
        Genre::create($validated_data);
        return redirect()->route('genres.list');
    }
}
