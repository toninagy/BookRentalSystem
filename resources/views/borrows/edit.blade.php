@extends('layouts.base')

@section('content')
<h2>Edit rental details</h2>
<form action="/borrows/{{ $borrow['id'] }}" method="post">

@method('put')
@csrf

<div class="form-group">
    <label for="deadline">Rental deadline:</label>
    <input type="datetime-local" name="deadline" class="form-control @error('deadline') is-invalid @enderror" id="deadline" value="{{ old('deadline', $borrow['deadline']) }}"></input>
    <div class="input-group-addon"></div>
    @error('released_at')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Rental status</label>

    <select name="status" id="status" class="form-control">
        <?php $status = ['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED'] ?>
        @foreach ($status as $s)
        <option value="{{ $s }}" @if ($s == $borrow['status']) selected @endif >{{ $s }}</option>
        @endforeach
    </select>
</div>

<input type="hidden" name="reader_id" value="{{$borrow['reader_id']}}">
<input type="hidden" name="book_id" value="{{$borrow['book_id']}}">

<div class="form-group">
    <br>
    <button type="submit" class="btn btn-primary">Update rental details</button>
</div>

</form>
@endsection
