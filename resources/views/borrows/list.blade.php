@extends('layouts.base')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            Rental requests with pending status:
            <tr>
                @if(Auth::user()->is_librarian)
                <th>Reader ID</th>
                @endif
                <th>Book ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            @if($borrow->status=='PENDING')
            <tr>
              @if(Auth::user()->is_librarian)
              <td>{{ $borrow->reader_id }}</td>
              @endif
              <td>{{ $borrow->book_id }}</td>
              <td><a href="{{ route('borrows.edit', $borrow['id']) }}" class="btn btn-primary" style="background-color: green">Rental details</a>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <table class="table table-striped">
        <thead>
            Accepted and in-time rentals:
            <tr>
                @if(Auth::user()->is_librarian)
                <th>Reader ID</th>
                @endif
                <th>Book ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            <?php $now = Carbon\Carbon::now() ?>
            @if($borrow->status=='ACCEPTED' && $borrow->deadline>$now)
            <tr>
              @if(Auth::user()->is_librarian)
              <td>{{ $borrow->reader_id }}</td>
              @endif
              <td>{{ $borrow->book_id }}</td>
              <td><a href="{{ route('borrows.edit', $borrow['id']) }}" class="btn btn-primary" style="background-color: green">Rental details</a>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <table class="table table-striped">
        <thead>
            Accepted late rentals:
            <tr>
                @if(Auth::user()->is_librarian)
                <th>Reader ID</th>
                @endif
                <th>Book ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            <?php $now = Carbon\Carbon::now() ?>
            @if($borrow->status=='ACCEPTED' && $borrow->deadline<$now)
            <tr>
              @if(Auth::user()->is_librarian)
              <td>{{ $borrow->reader_id }}</td>
              @endif
              <td>{{ $borrow->book_id }}</td>
              <td><a href="{{ route('borrows.edit', $borrow['id']) }}" class="btn btn-primary" style="background-color: green">Rental details</a>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <table class="table table-striped">
        <thead>
            Rejected rental requests:
            <tr>
                @if(Auth::user()->is_librarian)
                <th>Reader ID</th>
                @endif
                <th>Book ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            @if($borrow->status=='REJECTED')
            <tr>
              @if(Auth::user()->is_librarian)
              <td>{{ $borrow->reader_id }}</td>
              @endif
              <td>{{ $borrow->book_id }}</td>
              <td><a href="{{ route('borrows.edit', $borrow['id']) }}" class="btn btn-primary" style="background-color: green">Rental details</a>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <table class="table table-striped">
        <thead>
            Returned rentals:
            <tr>
                @if(Auth::user()->is_librarian)
                <th>Reader ID</th>
                @endif
                <th>Book ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            @if($borrow->status=='RETURNED')
            <tr>
              @if(Auth::user()->is_librarian)
              <td>{{ $borrow->reader_id }}</td>
              @endif
              <td>{{ $borrow->book_id }}</td>
              <td><a href="{{ route('borrows.edit', $borrow['id']) }}" class="btn btn-primary" style="background-color: green">Rental details</a>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
