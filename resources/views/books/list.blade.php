@extends('layouts.base')

@section('content')
<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Book details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $book)
            <tr>
              <td>Title: {{ $book->title }}</td>
              <td>Author(s): {{ $book->authors }}</td>
              <td>Description: {{ $book->description }}</td>
              <td>Pages: {{ $book->pages }}</td>
              <td>Language code: {{ $book->language_code }}</td>
              <td>ISBN: {{ $book->isbn }}</td>
              <td>In stock: {{ $book->in_stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
