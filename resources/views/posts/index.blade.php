



@extends('layouts.master')

@section('title', 'Home Page')


@section('text')

         <h1>Show all Data</h1>
    
<div class="container mt-5">


  <div class="row justify-content-end">
    <div class="col-5">
       <form action="/posts">
        <div class="input-group mb-3">


<div class="input-group mb-3">
  <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search....">
  <button class="btn btn-outline-secondary" type="button" id="button-addon2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg>
  </button>
</div>


      
       </form>
    </div>
  </div>


   <div class="row justify-content-end">
    <div class="col-12">
     
      {{-- session()->has('success') --}}
      {{-- session()->get('success') --}}
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      @endif


    @if(count($post) > 0)


    @foreach($post as $post)
    <div>
         <a href="/posts/show/{{ $post->id }}"> <h2> {{ $post->title }}</h2></a>
         @if($post->images()->exists()) 

         <img src="{{ $post->images[0]->path }}" width="300px" height="220px">
         @endif 
         {{-- <img src="{{ isset($post->images[0]) ? $post->images[0]->path : '' }}" width="300px" height="220px"><br> <br> --}}

          <i>{{ $post->created_at->diffForHumans() }} </i>/ <b>{{$post->user->name}}</b>
          

          @php
          $category_ids = DB::table('category_post')
          ->where('post_id', $post->id)
          ->get()
          ->pluck('category_id')
          ->toArray();
          $categories = \App\Models\Category::whereIn('id', $category_ids)->get();
          @endphp
          @foreach ($categories as $category) 
          {{-- @foreach ($post->category()->get() as $category) --}}
          {{-- @foreach ($post->category as $category) --}}
 
          <span class="badge text-bg-info">{{$category->name}}</span>
         
        

          @endforeach

     

           @if($post->isOwnPost())
          <div class="d-flex justify-content-end">
            <a href="/posts/edit/{{ $post->id }}" class="btn btn-outline-success">Edit</a>

            <form action="/posts/destroy/{{ $post->id }}" method="POST">
    
                @csrf
                @method('DELETE')
    
                <button type="submit" onclick="return confirm('are you sure')" class="btn btn-outline-danger ms-2">Delete</button>
            
            </form>
        
          </div>

          @endif
     
        
   


      </div>
      <hr>
      

   @endforeach  

    @else 

      No Post

    @endif

  
    </div>
   </div>

        

   
       
     



   

      </div>



</ul>


@endsection

 