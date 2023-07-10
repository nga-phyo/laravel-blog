
@extends('navgation.navbar')


@section('title','Home Page')

@section('content')


  
<div class="container">

    {{-- start alert message --}}

              <div class="row">
                     <div class="col mt-5">
                            <div class="col-10">
                                   @if(session()->has('success'))
                                   <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          {{ session()->get('success') }}
                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                   </div>
                                   @endif

                            </div>
                     </div>
              </div>
    {{-- end alert message --}}

       <div class="row mt-4">
           {{-- start photo upload --}}
              <div class="col-8">

                     @if(count($posts) > 0)

                     @foreach ($posts as $post)

                     <div class="card mb-4" style="background-color:whitesmoke">
                            
                            <img src="https://guidetoiceland.imgix.net/910729/x/0/midnight-sun-in-iceland-how-covid-19-may-influence-your-chance-to-experience-it-12-jpg?ixlib=php-3.3.0" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('post.show',['id' => $post->id]) }}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <i>{{ $post->created_at->toFormattedDateString() }} <b>({{$post->created_at->diffForHumans()}})</b> </i> by <b>{{ $post->user->name }}</b>
                            
                           

                             {{-- @if(Auth::check() && $post->user_id == Auth::user()->id) --}}
                            @if($post->isOwnPost())
                            
                            <div class="d-flex mt-3">
                                  <form action="{{ route('post.delete',['id' => $post->id]) }}" method="POST">
      
                                         @method('DELETE')
                                  
                                  @csrf
      
                                  <button type="submit" class="btn btn-outline-danger" onclick=" return confirm('Are you sure!')">Delete</button>
                                  <a href="{{ route('post.edit', $post->id)}}" class="btn btn-outline-info">Edit</a>
                                  
                                  </form>
                                  
                          </div>

                            @endif

                            <div class="d-flex justify-content-end">
                                   <a href="#" class="btn btn-primary" >Read More</a>
                                   </div>
                            </div>
                            
                     </div>
                     

                     @endforeach

                     @else

                     No Post

                     @endif
                   
              </div>
       
           {{-- end photo upload --}}


      {{-- start sidebar --}}
              <div class="col-4">

                            <form>
       
                            <div class="input-group mb-4">
                                   <input type="text" name="search" value="{{ request('search')}}" class="form-control" placeholder="Search..." aria-describedby="button-addon2">
                                   <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
       
                            </form>
                    
               

                     <div class="list-group">
                     <a href="#" class="list-group-item bg-secondary" aria-current="true">
                     The current link item
                     </a>
                     <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                     <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                     <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                     <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                      </div>

                     <div class="list-group mt-5">
                     <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                     The current link item
                     </a>
                     <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                     <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                     <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                     <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                      </div>

              </div>
      {{-- end sidebar --}}

       </div>

   
</div>





@endsection
