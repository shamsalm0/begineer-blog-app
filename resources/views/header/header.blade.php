<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar container  mt-5 navbar-expand-lg bg-warning-subtle rounded">
  <div class="container-fluid bg-warning-subtle d-flex justify-between">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{request()->routeIs('posts.index')?'active':''}}" href="{{route('posts.index')}}">posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts.create')}}">Create</a>
        </li>
     
      </ul>
     
 
    </div>
  
  </div>
  <div class="collapse navbar-collapse">
    @auth
    <ul class="navbar-nav d-flex">
      <li class="nav-item">
        <a class="nav-link " aria-disabled="true"> 
          {{Auth::user()->name}}
         </a>
         
      </li>
   
   <form action="{{route('auth.signout')}}" method="post">
    @csrf
   <button class="nav-item" type="submit"><li class="nav-item">logout</li></button>
   </form>
   
   
  </ul>
  @else
  <ul class="navbar-nav d-flex">
    <li class="nav-item">
      <a class="nav-link " href="{{route('auth.login')}}" aria-disabled="true"> 
        Sign In
       </a>
       
    </li>
 
    <li class="nav-item">
      <a class="nav-link " href="{{route('auth.register')}}" aria-disabled="true"> 
        Sign Up
       </a>
       
    </li>
 
 
</ul>

  @endauth
  </div>
</nav>
</body>
</html>
