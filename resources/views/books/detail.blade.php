@extends('layouts.base')

@section('content')

      <a href="{{ route('books.edit', $book->id) }}"  class="btn btn-primary">Edit book details</a>
      <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete book</button>
      </form>
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
          </p>
        </a>
        <img src="{{ $book->cover_image }}"/>
      </div>
@endsection
