 @extends('navgation.navbar')

{{-- 
@section('title')
 Register Page
@endsection --}}

@section('title','Register Page') 


@section('content')

   <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Register Page</h3>
                    </div>
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf

                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')

                            <div class="invalid-feedback">
                             {{ $message }}
                            </div>

                            @enderror
                            <br>
        
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">

                            @error('email')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <br>
        
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error ('password')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                            @enderror
                            <br>
        
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>

@endsection