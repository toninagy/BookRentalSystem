@extends('layouts.base')

@section('content')
      @auth
      @if (Auth::user()->is_librarian)
      <a href="{{ route('books.edit', $book->id) }}"  class="btn btn-primary">Edit book details</a>
      <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete book</button>
      </form>
      @endif
      @endauth
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action" style="background-color: #4aa786">
          <p class="d-flex justify-content-between align-items-center">
            <span>
                <h2>Title: {{ $book->title }}</h2>
                <h3>{{ substr($book->released_at, 0, 7) }}</h3>
                <h4>Author(s): {{ $book->authors }}</h4>
            </span>
          </p>
        </a>

        <a href="#" class="list-group-item list-group-item-action" style="background-color: #ab7969">
          <p class="d-flex justify-content-between align-items-center">
            <span>
              <p>Description: {{ $book->description }}</p>
              <p>Pages: {{ $book->pages }}</p>
              <p>Language code: {{ $book->language_code }}</p>
              <p>ISBN: {{ $book->isbn }}</p>
              <p>In stock: {{ $book->in_stock }}</p>
            </span>
            @auth
            @if (!Auth::user()->is_librarian)
            @if($book->in_stock > 0)
            @if($is_borrowed == null || $is_borrowed->isEmpty())
            <form action="/books/{{ $book['id'] }}/borrow" method="post">
            @csrf
            <input type="hidden" name="reader_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <input type="hidden" name="status" value="PENDING">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Borrow this book!</button>
            </div>
            </form>
            @else
            <p style="background-color: #13c640">You borrowed this book! Status: {{ $is_borrowed[0]->status }}</p>
            @endif
            @endif
            @if ($book->in_stock == 0)
            <p style="background-color: #be1d1d">Unfortunately this book is out of stock :(</p>
            @endif
            @endif
            @endauth
          </p>
        </a>
        <img src="{{ $book->cover_image }}"/>
      </div>
@endsection
