@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="font-weight: bold; border: 2px solid #f7c531; background-color: #f5d67a; padding: 10px; border-radius: 10px; box-shadow: 5px 10px 8px #888888;">
                <div class="card-header text-white" style="text-align: center; background-color: #f7c531">{{ __('User data') }}</div>

                <div class="card-body text-white">
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
