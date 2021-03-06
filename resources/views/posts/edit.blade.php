



         
@extends('layouts.master')

@section('title', 'Create post')  




@section('text') 

<div class="container mt-5">

  <div class="card">
      <div class="card-header"><h3>Now Create a post here!</h3>
      </div>
      <div class="card-body">


<form action="/posts/update/{{ $post->id }}" method="POST">
    @csrf
   

<div class="mb-3">
<label for="" class="form-lable">Title</label>
<input class="form-control" type="text" name="title">
</div>

<div class="mb-3">
  <label class="form-label">Post Cateory</label>
  <select name="category_ids[]" class="form-select @error('category_ids') is-invalid @enderror" multiple>
      <option value="">-- select --</option>
      @foreach ($category as $category)
      <option value="{{ $category->id }}" 
          @if (in_array($category->id, old('category_ids', $oldCategoryIds)))
              selected
          @endif
          >{{ $category->name }}</option>
      @endforeach
  </select>
  @error('category_ids')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

 

<div class="mb-3">

<label for="" class="form-label">Body</label>
<textarea class="form-control" rows="5"  name="body">

</textarea>

              

</form>

<div class="d-flex justify-content-between mt-3">

<button type="submit" class="btn btn-outline-primary">Edit</button>
<a href="/works" class="btn btn-outline-warning">Edit</a>
</div>
</div>



</div>

      </div>
  </div>
  
@endsection 


 
