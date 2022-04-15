@extends('layouts.base')

@section('content')
<div class="row mt-5">

    <form action="/search" method="POST" role="search">
        @csrf
        <div class="input-group mb-3" style="margin: auto; width: 500px;">
            <input type="text" class="form-control" name="query" placeholder="Search book by title or author" aria-describedby="search-button">
            <button class="btn text-white" style="background-color: #f7c531" type="submit" id="search-button">Submit</button>
          </div>
    </form>

    @foreach ($books as $book)
    <div class="col-sm-3 my-3">
        <div class="card h-100" style="background-color: #f7ebc6; padding: 10px; border-radius: 10px; border: 2px solid #f7c531">
            <img src="{{ $book->image_url }}" class="card-img-top">
            <div class="card-body" style="justify-content: space-between">
                <h5 class="card-title">{{ $book['authors'] }}</h5>
                <p class="card-text">{{ $book['description'] }}</p>
                <a href="{{ route('books.details', $book['id']) }}" class="btn text-white" style="background-color: #f7c531">Book details</a>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
