<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdnjs.com/libraries/select2" rel="stylesheet" />
    <link href="https://cdnjs.com/libraries/select2-bootstrap-css" rel="stylesheet" />
    <link href="https://cdnjs.com/libraries/select2?ref=driverlayer.com/web" rel="stylesheet" />
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('admin.dashboard')}}">Navbar</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">Home</a>
      </li>
      <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <!-- <a class="nav-link" method="post" href="{{route('logout')}}">Logout</a> -->
      </li>
    </ul>
  </div>
</nav>

    <div class="container mt-5">
        <form action="{{route('set.post')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-6 mb-2">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="firtName" name="name" >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6 mb-2">
                <label for="exampleInputEmail1">Tag</label>
                <select class="selectpicker" name="tag_id[]" multiple data-live-search="true">
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tag}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-6 mb-2 mt-3">
                <label for="profilePic">Image</label>
                <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror-file" value="{{ old('image') }}" id="profilePic" name="image" >
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>
    $(".tag").select2({
    tags: true,
})
</script>


</body>

</html>