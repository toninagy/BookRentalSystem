@extends('layouts.base')

@section('content')
      @auth
      @if (Auth::user()->is_librarian)
      <div class="mt-5">
      <a href="{{ route('books.edit', $book->id) }}"  class="btn text-white" style="background-color: #f7c531">Edit book details</a>
      <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete book</button>
      </form>
      </div>
      @endif
      @endauth
      <div class="list-group mt-5" style="background-color: #f7ebc6; border-radius: 10px; border: 2px solid #f7c531; padding: 20px; box-shadow: 5px 10px 8px #888888;">
        <div class="text-white" style="border-bottom: 2px solid #f7c531; background-color: #f7c531; padding: 10px; border-radius: 10px;">
          <p class="d-flex justify-content-between align-items-center">
            <span>
                <h2>Title: {{ $book->title }}</h2>
                <h3>{{ substr($book->released_at, 0, 10) }}</h3>
                <h4>Author(s): {{ $book->authors }}</h4>
                <h4>Genre(s): {{ $genre[0]->name }}</h4>
            </span>
          </p>
        </div>
        <div>
          <p class="d-flex justify-content-between align-items-center">
            <span>
              <p>Description: {{ $book->description }}</p>
              <p>Pages: {{ $book->pages }}</p>
              <p>Language code: {{ $book->language_code }}</p>
              <p>ISBN: {{ $book->isbn }}</p>
              <p>In stock: {{ $book->in_stock }}</p>
              <p>Number of available books: {{ $book->in_stock - $borrowCount }}</p>
            </span>
            @auth
            @if (!Auth::user()->is_librarian)
            @if($book->in_stock > 0)
            @if($is_borrowed == null || $is_borrowed->isEmpty() || $is_borrowed[0]->status == 'RETURNED')
            @if($is_borrowed != null && $is_borrowed->isNotEmpty() && $is_borrowed[0]->status == 'RETURNED')
            <form action="/borrows/{{ $is_borrowed[0]->id }}" method="post">
            @method('put')
            <p style="background-color: #8bacdb">You have already borrowed this book! Click the below button to borrow it again!</p>
            <input type="hidden" name="request_processed_at" value={{$is_borrowed[0]->request_processed_at}}>
            <input type="hidden" name="request_managed_by" value={{$is_borrowed[0]->request_managed_by}}>
            <input type="hidden" name="deadline" value={{$is_borrowed[0]->deadline}}>
            <input type="hidden" name="returned_at" value={{$is_borrowed[0]->returned_at}}>
            <input type="hidden" name="return_managed_by" value={{$is_borrowed[0]->return_managed_by}}>
            </form>
            @else
            <form action="/books/{{ $book['id'] }}/borrow" method="post">
            @endif
            @csrf
            <input type="hidden" name="reader_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <input type="hidden" name="status" value="PENDING">
            <div class="form-group">
                <button type="submit" class="btn text-white" style="background-color: #f7c531">Borrow this book!</button>
            </div>
            </form>
            @else
            @if($is_borrowed[0]->status != 'REJECTED')
            <p style="background-color: #13c640">You borrowed this book! Status: {{ $is_borrowed[0]->status }}</p>
            @else
            <p style="background-color: #c66113">Unfortunately, your rental request has been rejected</p>
            @endif
            @endif
            @endif
            @if ($book->in_stock == 0)
            <p style="background-color: #be1d1d">Unfortunately this book is out of stock :(</p>
            @endif
            @endif
            @endauth
          </p>
        </div>
        <img src="{{ $book->cover_image }}"/>
      </div>
@endsection
