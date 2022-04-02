@extends('layouts.base')

@section('content')

      <img src="{{ $book->cover_image }}"/>

      <a href="{{ route('books.edit', $book->id) }}"  class="btn btn-primary">Edit</a>
      <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      <a href="new-track.html" class="btn btn-primary">Add new book</a>
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action" style="background-color: #4aa786">
          <p class="d-flex justify-content-between align-items-center">
            <span>
                <h2>Title: {{ $book->title }}</h2>
                <h3>{{ $book->released_at }}</h3>
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
          </p>
        </a>
      </div>
@endsection
