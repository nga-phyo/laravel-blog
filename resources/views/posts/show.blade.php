
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
 
                            <h3>{{ $post->title }}</h3>
                            <p> {{ $post->body }}</p>
              
                            <a href="/posts" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
           </div>
    @endsection