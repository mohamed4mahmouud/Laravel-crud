@extends('layouts.main')

@section('title','Edit')

<body>
    @section('content')
    <div class="container mt-4">
        <h2>Edit Post</h2>
        <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" >
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <input type="text" name="body" id="body" class="form-control" value="{{ $post->body }}" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    @endsection
</body>
