@extends('layouts.base')

@section('content')
<h2>New genre</h2>
<form action="{{ route('genres.store') }}" method="post">

@csrf

<?php $nameField='name'; ?>
<div class="form-group">
    <label for="name">Genre name</label>
    <input name="{{ $nameField }}" type="text" class="form-control @error($nameField) is-invalid @enderror" id="{{ $nameField }}" value="{{ old($nameField, '') }}">

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
        //FIXME
        <option {{ old($g) == $g ? "selected" : "" }} value="{{ $g }}">{{ $g }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <br>
    <button type="submit" class="btn btn-primary">Add new genre</button>
</div>

</form>
@endsection
