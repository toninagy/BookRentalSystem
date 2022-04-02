@extends('layouts.base')

@section('content')
<div class="container">
    @if(isset($details))
        <p> Search results for "<b> {{ $query }} </b>" :</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author(s)</th>
                <th>Release date</th>
                <th>Description</th>
                <th>In stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $book)
            <tr>
              <td>{{ $book->title }}</td>
              <td>{{ $book->authors }}</td>
              <td>{{ substr($book->released_at, 0, 7) }}</td>
              <td>{{ $book->description }}</td>
              @if ($book->in_stock > 0)
              <td style="color: green">Yes</td>
              @else
              <td style="color: red">No</td>
              @endif
              <td><a href="{{ route('books.details', $book['id']) }}" class="btn btn-primary" style="background-color: green">Book details</a>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
