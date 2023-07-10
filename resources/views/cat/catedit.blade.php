
@extends('navgation.navbar')


@section('title','CatEdit Page')


@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-6">
            
           
              {{-- <form action="/cat/update/{{ $cat->id }}" method="POST"> --}}
              <form action="{{ route('cat.update', $cat->id )}}" method="POST">
                 @csrf
                 <div class="card">
                    <div class="card-header">
                       Edit Category!
                    </div>
                    <div class="card-body">
                        <label for="">Category Name</label>
                        <input type="text" name="cat_name" class="form-control"><br>
    
                        <button class="btn btn-success float-end">Update</button>
                    </div>
                   </div>
              </form>
           

        </div>
    </div>
</div>

@endsection