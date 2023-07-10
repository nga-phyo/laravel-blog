

@extends('navgation.navbar')
 


@section('title','Create Page')

@section('content')

    {{-- @if ($errors->any())

            @foreach($errors->all() as $error)
                    <li style="color: red">
                        {{ $error }}
                    </li>
            @endforeach
    @endif --}}
    
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-6">

                <div class="card">
                    <div class="card-header">
                        <h3>Create A Post</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST">

                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                            @csrf
        
                            <label for="">Title</label>
                                <input type="text" name="title" class="form-control">
                                
                                    @error('title')
                                        <div style="color:red"> {{ $message }}</div>
                                    @enderror
                                <br>
                            
                            <label for="">Body</label>
                                <textarea name="body" class="form-control" >
                                
        
                                </textarea>

                                @error('body')
                                        <div style="color:red"> {{ $message }}</div>
                                @enderror
                              <br>
        
                                <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection