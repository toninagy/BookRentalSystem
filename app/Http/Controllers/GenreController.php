<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    public function list()
    {
        if(!Auth::user()->is_librarian) {
            return view('index');
        }
        $genres = Genre::all();
        return view('genres/list', [
            'genres' => $genres
        ]);
    }
}
