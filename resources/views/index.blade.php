@extends('layouts.base')

@section('content')
<div class="row">

    <div class="card-body">
        <div class="card h-100">
            <p class="font-weight-bold"> Number of users: {{ DB::table('users')->count()}}</p>
            <p class="font-weight-bold"> Number of genres: {{ DB::table('genres')->count()}}</p>
            <p class="font-weight-bold"> Number of books: {{ DB::table('books')->count()}}</p>
            <p class="font-weight-bold"> Number of active book rentals: {{ DB::table('borrows')->count()}}</p>
        </div>
    </div>

    <div>TODO Genre list w links</div>
    <p>Filtered on selected genre: {{ Request::get('genre') }}</p>

    <form action="/search" method="POST" role="search">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="query" placeholder="Search book by title or author" aria-describedby="search-button">
            <button class="btn btn-outline-secondary" type="submit" id="search-button">Submit</button>
          </div>
    </form>

</div>
@endsection
