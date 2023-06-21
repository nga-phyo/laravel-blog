
@extends('navgation.navbar')


@section('title','Home Page')

@section('content')


  
<div class="container">
       <div class="row justify-content-center align-items-center mt-5">
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
              

                     @foreach ($posts as $post)

                    
                    <h3><a href="/post/show/{{ $post->id }}">{{ $post->title }}</a></h3> 
                     <h5> {{ $post->body }}</h5>
                    <i>{{ $post->created_at->diffForHumans() }} </i>by Mark
                     
                    
                    <div class="d-flex justify-content-end">
                            <form action="/post/delete/{{ $post->id }}" method="POST">

                                   @method('DELETE')
                            
                            @csrf

                            <button type="submit" class="btn btn-outline-danger" onclick=" return confirm('Are you sure!')">Delete</button>
                            <a href="/post/edit/{{ $post->id }}" class="btn btn-outline-info">Edit</a>
                            
                            </form>

                    </div>
                     <hr>


                     @endforeach

                     {{ $posts->links() }}
              </div>
       </div>
</div>





@endsection
