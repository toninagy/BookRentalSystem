@extends('layouts.base')

@section('content')
<div class="row">

    <form action="/search" method="POST" role="search">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="query" placeholder="Search book by title or author" aria-describedby="search-button">
            <button class="btn btn-outline-secondary" type="submit" id="search-button">Submit</button>
          </div>
    </form>

    @foreach ($books as $book)
    <div class="col-sm-3 my-3">
        <div class="card h-100">
            <img src="{{ $book->image_url }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $book['authors'] }}</h5>
                <p class="card-text">{{ $book['description'] }}</p>
                <a href="{{ route('books.details', $book['id']) }}" class="btn btn-primary">Book details</a>
                @auth
                @if (!Auth::user()->is_librarian)
                <a href="{{ route('books.index', $book['id']) }}" class="btn btn-primary">Borrow</a>
                @endif
                @endauth
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
