

@extends('navgation.navbar')

@section('title','CatHome Page')


@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center mt-5">

          <div class="col-5">
            <a href="cat/create" class="btn btn-info"> <i class="fa-solid fa-plus"></i> Create Cagetory</a>
          </div>

            <div class="col-5">
                <form>
                    <div class="input-group mb-4">
                           <input type="text" name="search" class="form-control" placeholder="Search..." aria-describedby="button-addon2">
                           <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
             
        
            
            <div class="col-10">
                @if(session()->has('yes'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session()->get('yes') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>

              

                <div class="col-10 mt-3">
                    <table class="table">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cat_Name</th>
                                <th>Created_Up</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                          @if(count($cats) > 0)
                                @foreach ($cats as $cat)
                                <tr>
                                    <td> {{ $cat->id }} </td>
                                    <td> {{ $cat->cat_name}} </td>
                                    <td> {{ $cat->created_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="cat/edit/{{ $cat->id }}" class="btn btn-success me-2"> <i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                            <form action="cat/delete/{{ $cat->id }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Are you Sure!')"> <i class="fa-solid fa-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @else
                                    <tr>
                                        <td> No Category </td>
                                    </tr>
                                @endif

                        </tbody>
                        

                    </table>
                </div>

              
               
           
        </div>
    </div>

@endsection