@extends('layouts.base')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Genre name</th>
                <th>Genre style</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
              <td>{{ $book->title }}</td>
              <td>{{ $book->authors }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
