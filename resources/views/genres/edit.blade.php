@extends('layouts.base')

@section('content')
<h2>Edit genre</h2>
<form action="/genres/{{ $genre['id'] }}" method="post">

@method('put')
@csrf

<?php $nameField='name'; ?>
<div class="form-group">
    <label for="name">Genre name</label>
    <input name="{{ $nameField }}" type="text" class="form-control @error($nameField) is-invalid @enderror" id="{{ $nameField }}" value="{{ old($nameField, $genre[$nameField]) }}">

    @error($nameField)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="style">Genre style</label>

    <select name="style" id="style" class="form-control">
        <?php $genres = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'] ?>
        @foreach ($genres as $g)
        <option value="{{ $g }}" @if ($g == $genre['style']) selected @endif >{{ $g }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <br>
    <button type="submit" class="btn btn-primary">Update genre</button>
</div>

</form>
@endsection
