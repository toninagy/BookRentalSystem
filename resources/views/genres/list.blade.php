@extends('layouts.base')

@section('content')
<div class="container">
    {{-- <a href="{{ route('genre.create') }}" class="btn btn-primary" style="background-color: green">Add new genre</a> --}}
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
