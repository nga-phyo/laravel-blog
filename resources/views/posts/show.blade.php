
    @extends('navgation.navbar')


    @section('title','Detai Page')

    @section('content')

           <div class="container">
            <div class="row justify-content-center align-items-center mt-5">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h1>Post Details</h1>
                        </div>
                        <div class="card-body">
 
                            <h2>{{ $post->title }}</h2>
                            <h5> {{ $post->body }}</h5>
                            <i>{{ $post->created_at->diffForHumans() }}</i> post by<b>  {{ $post->name }}</b><br><br>

              
                            <a href="/posts" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
           </div>
    @endsection