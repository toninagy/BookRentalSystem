@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User data') }}</div>

                <div class="card-body">
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    @if(Auth::user()->is_librarian)
                    <p>Role: Librarian</p>
                    @else
                    <p>Role: Reader</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
