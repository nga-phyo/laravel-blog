

@extends('navgation.navbar')

@section('title','CatHome Page')


@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        @foreach ($cats as $cat)
                            

                        <form action="/cat/delete/{{ $cat->id }}" method="POST">
                            @csrf
                            {{ $cat->cat_name }}  

                          <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure')">Delete</button>
                          <a href="/cat/edit/{{ $cat->id }}" class="btn btn-success btn-sm">Edit</a>
                          <br><br>
                        </form>
                           

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection