@extends('layouts.base')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            Rental requests with pending status:
            <tr>
                <th>Reader ID</th>
                <th>Book ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            @if($borrow->status=='PENDING')
            <tr>
              <td>{{ $borrow->reader_id }}</td>
              <td>{{ $borrow->book_id }}</td>
              <td><a href="{{ route('borrows.edit', $borrow['id']) }}" class="btn btn-primary" style="background-color: green">Rental details</a>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
