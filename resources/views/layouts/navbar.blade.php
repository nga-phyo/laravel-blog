<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('posts.home') }}">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (request()->path() == 'posts') active @endif " href="{{ route('posts.home')}}">Home</a>
                </li>
           

               
               <li class="nav-item">
                <a class="nav-link @if ( request()->path() == 'posts/create') active @endif" href="{{route('posts.create')}}">Create A Post</a>
            </li>
               
               <li class="nav-item">
                <a class="nav-link @if (request()->path() == 'my-posts') active @endif " href="/my-posts">My POst</a>
            </li>

     

            <li class="nav-item">
                <a class="nav-link @if (request()->path() == 'categories') active @endif " href="{{ route('categories.home') }}">Category</a>
            </li>
               


            @if(Auth::check())

               
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                   {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
          

            @else

            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>

            



            @endif
              

         
      

                

                
                
                


                </li>
            </ul>
        </div>
    </div>
</nav>
