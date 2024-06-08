<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('user.dashboard')}}">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('user.dashboard')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
<a href="{{route('user.dashboard')}}" class="btn btn-info mb-2">New Post</a>

@if (count($posts) > 0 ) 
<div class="row">
    @foreach($posts as $post)
  <div class="col-sm-6 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$post->name}}</h5>
        <hr>
        <img src="{{asset('storage/images/'. $post->image) }}" alt="img">
        <hr>
        @foreach ($post->tags as $tag)
        #{{$tag->tag}}
        @endforeach
      </div>
    </div>
  </div>
  @endforeach
</div>
@else
<h3>There are no new posts.</h3>
@endif

</div>

</body>

</html>