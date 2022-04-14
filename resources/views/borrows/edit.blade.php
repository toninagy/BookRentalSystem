@extends('layouts.base')

@section('content')

<?php $now = Carbon\Carbon::now() ?>
@if($borrow['deadline'] != null && $borrow['deadline']<$now)
<br>
<h3 style="color:#ff0000">Rental is late! Returnal deadline: {{$borrow['deadline']}}</h3>
@endif
<br>
<h4>Rental details</h4>
<form action="/borrows/{{ $borrow['id'] }}" method="post">

@method('put')
@csrf

<div style="background-color:rgb(212, 83, 83);">
    <span>
        <p>Title: {{ $book[0]->title }}</p>
        <p>Authors: {{ $book[0]->authors }}</p>
        <p>Release date: {{ substr($book[0]->released_at, 0, 10) }}</p>
        <a href="{{ route('books.details', $book[0]['id']) }}" class="btn btn-primary">Book details</a>
    </span>
</div>
<br>
<h4>Reader details</h4>
<div style="background-color:rgb(212, 83, 184);">
    <span>
        <p>Name: {{ $user[0]->name }}</p>
        <p>Rental request created at: {{ $borrow['created_at'] }}</p>
        <p>Rental status: {{ $borrow['status'] }}</p>
        @if($borrow['status'] != 'PENDING')
        <p>Request processed at: {{ $borrow['request_processed_at']}}</p>
        <p>Request managed by: {{ $borrow['request_managed_by']}}</p>
        @endif
        @if($borrow['status'] == 'RETURNED')
        <p>Returned at: {{ $borrow['returned_at']}}</p>
        <p>Request managed by: {{ $borrow['request_managed_by']}}</p>
        @endif
    </span>
</div>

@if(Auth::user()->is_librarian)
<h3>Edit rental details</h3>
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
        <?php $status = ['ACCEPTED', 'REJECTED', 'RETURNED'] ?>
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
@endif
@endsection
