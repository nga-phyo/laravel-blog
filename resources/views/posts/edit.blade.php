
    @extends('navgation.navbar')

    @section('title','Edit Page')
    {{-- @if($errors->any())
        @foreach($errors->all() as $error)
           <li>
                {{ $error }}
           </li>
        @endforeachs
    @endif --}}

    @section('content')
           <div class="container">
            <div class="row justify-content-center align-items-center vh-100">
                    <div class="col-6">

                        <div class="card">
                            <div class="card-header">
                                Edit Page
                            </div>
                            <div class="card-body">
                                <form action="/post/update/{{ $post->id }}" method="POST">

                                
                                    @csrf

                                    <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">

                                            @error('title')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <br>

                                    <label for="">Body</label>
                                        <textarea name="body" class="form-control">
                                                {{ $post->body }}
                                        </textarea>

                                            @error('body')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <br>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                      <div class="float-end">
                                        <a href="/posts" class="btn btn-secondary">Cancle</a>
                                      </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
           </div>
    @endsection