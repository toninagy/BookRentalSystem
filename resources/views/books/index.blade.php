@extends('layouts.base')

@section('content')
<div class="row">

    <div class="card-body">
        <div class="card h-100">
            <p class="font-weight-bold"> Number of genres: {{ DB::table('genres')->count()}}</p>
            <p class="font-weight-bold"> Number of books: {{ DB::table('books')->count()}}</p>
            <p class="font-weight-bold"> Number of active book rentals: {{ DB::table('borrows')->count()}}</p>
        </div>
    </div>

    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search book"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>

    @foreach ($books as $book)
    <div class="col-sm-3 my-3">
        <div class="card h-100">
            <img src="{{ $book->image_url }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $book['authors'] }}</h5>
                <p class="card-text">{{ $book['description'] }}</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="{{ route('books.details', $book['id']) }}" class="btn btn-primary">Open</a>
                <a href="{{ route('books.index', $book['id']) }}" class="btn btn-primary">Borrow</a>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
