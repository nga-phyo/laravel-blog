
@extends('navgation.navbar')


@section('title','Home Page')

@section('content')


  
<div class="container">

       <div class="row justify-content-end mt-4">
              <div class="col-4">
                    <form >

                     <div class="input-group mb-3">
                            <input type="text" name="search" value="{{ request('search')}}" class="form-control" placeholder="Search..." aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                     </div>

                    </form>
              </div>
       </div>

       <div class="row justify-content-center align-items-center">
              <div class="col-12">


              {{-- @if(session('success'))

                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>

              @endif --}}

              @if(session()->has('success'))

                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>

              @endif
              
              @if(count($posts) > 0)

                     @foreach ($posts as $post)

                    
                    <h3><a href="/post/show/{{ $post->id }}">{{ $post->title }}</a></h3> 
                     <h5> {{ $post->body }}</h5>
                      {{-- <i>{{ $post->created_at->diffForHumans() }} </i> by <b>{{ $post->user()->first()->name }}</b> --}}
                      <i>{{ $post->created_at->diffForHumans() }} </i> by <b>{{ $post->user->name }}</b>
                     
                    
                      {{-- @if(Auth::check() && $post->user_id == Auth::user()->id) --}}
                      @if($post->isOwnPost())
                      <div class="d-flex justify-content-end">
                            <form action="/post/delete/{{ $post->id }}" method="POST">

                                   @method('DELETE')
                            
                            @csrf

                            <button type="submit" class="btn btn-outline-danger" onclick=" return confirm('Are you sure!')">Delete</button>
                            <a href="/post/edit/{{ $post->id }}" class="btn btn-outline-info">Edit</a>
                            
                            </form>

                    </div>
                      @endif
                     <hr>


                     @endforeach


              @else

              No Post

        @endif
                     {{ $posts->links() }}
              </div>
       </div>
</div>





@endsection
