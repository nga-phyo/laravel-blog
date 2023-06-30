
@extends('navgation.navbar')


@section('title', 'MyPost-Home')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center mt-4">
            <div class="col-6">

                @foreach ($myposts as $mypost)
                <li> {{ $mypost->title }}</li>
                @endforeach
                
            </div>
        </div>
    </div>

@endsection