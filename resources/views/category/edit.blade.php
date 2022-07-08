



      
@extends('layouts.design')

@section('title', 'Create post')  




@section('text') 

<div class="container mt-5">

  <div class="card">
      <div class="card-header"><h3>Now Create a post here!</h3>
      </div>
      <div class="card-body">


<form action="/categories/update/{{ $category->id }}" method="POST">
    @csrf

<div class="mb-3">
<label for="" class="form-lable">name</label>
<input class="form-control" type="text" name="name" value="{{ old('name' , $category->name) }}">




</div>

<div class="d-flex justify-content-between mt-3">

    <button type="submit" class="btn btn-outline-primary">create</button> 
   
   <a href="/categories" class="btn btn-outline-warning">cancle</a>
   </div>


</form>


</div>

</div>

      </div>
  </div>
  
@endsection  

