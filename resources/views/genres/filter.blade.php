@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Book title</th>
                <th>Authors</th>
                <th>Release date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
              <td>{{ $book->title }}</td>
              <td>{{ $book->authors }}</td>
              <td>{{ substr($book->released_at, 0, 10) }}</td>
              <td>{{ $book->description }}</td>
              <td><a href="{{ route('books.details', $book['id']) }}" class="btn text-white" style="background-color: #f7c531">Book details</a>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
