@extends('layouts.base')

@section('content')
<div class="row">

    <div class="card-body">
        <div class="card h-100" style="background-color: #f5d67a; border-radius: 10px; border: 2px solid #f7c531">
            <p class="text-center text-white" style="font-weight: bold"> Number of users: {{ DB::table('users')->count()}}</p>
            <p class="text-center text-white" style="font-weight: bold"> Number of genres: {{ DB::table('genres')->count()}}</p>
            <p class="text-center text-white" style="font-weight: bold"> Number of books: {{ DB::table('books')->count()}}</p>
            <p class="text-center text-white" style="font-weight: bold"> Number of active book rentals: {{ DB::table('borrows')->where('status','=','ACCEPTED')->count()}}</p>
        </div>
    </div>

    <form action="/search" method="POST" role="search">
        @csrf
        <div class="input-group mb-3" style="margin: auto; width: 500px;">
            <input type="text" class="form-control" name="query" placeholder="Search book by title or author" aria-describedby="search-button">
            <button class="btn text-white" style="background-color: #f7c531" type="submit" id="search-button">Submit</button>
          </div>
    </form>
    @if(isset($details))
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
                    <a href="{{ route('genres.filter', $genre['id']) }}" class="btn text-white" style="background-color: #f7c531">{{$genre->name}}</a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
