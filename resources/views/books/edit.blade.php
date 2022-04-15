@extends('layouts.base')

@section('content')
<div style="padding: 40px; margin: auto; width: 700px;">
<h2>Edit book</h2>
<form action="/books/{{ $book['id'] }}" method="post">

@method('put')
@csrf

<?php $nameField='title'; ?>
<div class="form-group">
    <label for="title">Book title</label>
    <input name="{{ $nameField }}" type="text" class="form-control @error($nameField) is-invalid @enderror" id="{{ $nameField }}" placeholder=""
        value="{{ old($nameField, $book[$nameField]) }}"
    >

    @error($nameField)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="authors">Authors</label>
    <textarea name="authors" class="form-control @error('authors') is-invalid @enderror" id="authors">{{ old('authors', $book['authors'])}}</textarea>

    @error('authors')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="released_at">Released at:</label>
    <input type="date" name="released_at" class="form-control @error('released_at') is-invalid @enderror" id="released_at" value="{{ old('released_at', $book['released_at']) }}"></input>
    <div class="input-group-addon"></div>
    @error('released_at')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="pages">Pages</label>
    <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" id="pages" rows="3" value="{{ old('pages', $book['pages']) }}"></input>

    @error('pages')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="isbn">ISBN</label>
    <textarea name="isbn" class="form-control @error('isbn') is-invalid @enderror" id="isbn" rows="3">{{ old('isbn', $book['isbn'])}}</textarea>

    @error('isbn')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<br>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', $book['description'])}}</textarea>

    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<p>Genre</p>
<div class="form-group d-flex flex-wrap">
    @foreach ($genres as $genre)
    <div class="custom-control custom-switch col-sm-2">
        <input
            type="radio"
            name="genres"
            id="genre-{{ $genre->id }}"
            value="{{ $genre->id }}"
            class="custom-control-input"
            @if($book['genres'] == $genre['id']) checked @endif
        >
        <label class="custom-control-label" for="genre-{{ $genre->id }}">{{ $genre->id }}</label>
      </div>
    @endforeach

</div>
<br>
<div class="form-group">
    <label for="in_stock">In stock</label>
    <input type="number" name="in_stock" type="text" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" placeholder="" value="{{ old('in_stock', $book['in_stock']) }}">

    @error('in_stock')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn text-white" style="background-color: #f7c531">Update book</button>
</div>

</form>
</div>
@endsection
