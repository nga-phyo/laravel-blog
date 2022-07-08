




@extends('layouts.design')

@section('title', 'Home Page')


@section('text')

         <h1>Show all Data</h1>

    
<div class="container mt-5">


  <div class="row justify-content-end">
    <div class="col-5">
       <form action="">
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
     
      
      @forelse ($category as $category)

      <div>

        <a href="/categories/show/{{ $category->id }}"> <h2> {{ $category->name }}</h2></a>

         <i>{{ $category->created_at->diffForHumans() }} </i>/<b>admin</b>


         <div class="d-flex justify-content-end">
           <a href="/categories/edit/{{ $category->id }}" class="btn btn-outline-success">Edit</a>

           <form action="/categories/destroy/{{ $category->id }}" method="POST">
   
               @csrf
               @method('DELETE')
   
               <button type="submit" onclick="return confirm('are you sure')" class="btn btn-outline-danger ms-2">Delete</button>
           
           </form>
       
         </div>

         <hr>
     
      @empty
      No Category 
      @endforelse


    </div>
   </div>

        

   
       
     


  {{-- {{ $work->links() }} --}}

   

      </div>



</ul>


@endsection

 