@extends('layouts.base')

@section('content')
<div class="row">

    <div class="card-body">
        <div class="card h-100">
            <p class="font-weight-bold"> Number of users: {{ DB::table('users')->count()}}</p>
            <p class="font-weight-bold"> Number of genres: {{ DB::table('genres')->count()}}</p>
            <p class="font-weight-bold"> Number of books: {{ DB::table('books')->count()}}</p>
            <p class="font-weight-bold"> Number of active book rentals: {{ DB::table('borrows')->where('status','=','ACCEPTED')->count()}}</p>
        </div>
    </div>

    <form action="/search" method="POST" role="search">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="query" placeholder="Search book by title or author" aria-describedby="search-button">
            <button class="btn btn-outline-secondary" type="submit" id="search-button">Submit</button>
          </div>
    </form>
    {{-- @if(isset($details))
    <p style="color:red">{{$details}}</p>
    @endif

    <table id="genreTable" class="table table-striped">
        <thead>
            <tr>
                <th>Filter books by genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
                <tr>
                <td>
            <a href="{{ route('genres.filter') }}" class="btn btn-primary" style="background-color: green">{{$genre->name}}</a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

</div>
@endsection
