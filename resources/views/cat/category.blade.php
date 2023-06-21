
@extends('navgation.navbar')


@section('title','Category Page')


@section('content')

   <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-6">
                
               
                  <form action="/cat/store" method="POST">
                     @csrf
                     <div class="card">
                        <div class="card-header">
                           Create Category!
                        </div>
                        <div class="card-body">
                            <label for="">Category Name</label>
                            <input type="text" name="cat_name" class="form-control"><br>
        
                            <button class="btn btn-primary float-end">Create</button>
                        </div>
                       </div>
                  </form>
               

            </div>
        </div>
   </div>

@endsection