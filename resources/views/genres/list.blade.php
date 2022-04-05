@extends('layouts.base')

@section('content')
<div class="container">
    <a href="{{ route('genres.create') }}" class="btn btn-primary" style="background-color: green">Add new genre</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Genre name</th>
                <th>Genre style</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
            <tr>
              <td>{{ $genre->name }}</td>
              <td>{{ $genre->style }}</td>
              <td><a href="{{ route('genres.edit', $genre['id']) }}" class="btn btn-primary" style="background-color: green">Edit genre</a>
              @auth
              @if (Auth::user()->is_librarian)
                <form action="{{ route('genres.destroy', $genre['id']) }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete genre</button>
                </form>
              @endif
              @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
