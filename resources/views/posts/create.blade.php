@extends('layouts.main')
 @section('title','Form Create post')
<body>

    @section('content')


<form method="POST" action="{{ route('posts.store') }}" class="form-inline"  enctype="multipart/form-data">
   @csrf
    <div class="form-group mr-2">
        <label for="title" class="mr-2">Title:</label>
        <input type="text" name="title" id="title" class="form-control form-control-sm" value="{{ old('title') }}" >
    </div>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group mr-2">
        <label for="Body" class="mr-2">Body:</label>
        <input type="text" name="body" id="Body" class="form-control form-control-sm" value="{{ old('body') }}">
    </div>

    @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div  class="form-group mr-2">
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
    </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection


</body>
</html>

