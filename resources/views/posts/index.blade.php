@extends('layouts.main')
@section('title','Posts')


@section('content')
<div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Writer</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->user->name }}</td>
                @if($post->image)
                    <td><img src="/storage/{{ $post->image }}" alt="Post Image" width="100"></td>
                @else
                    <td>No image available</td>
                @endif

                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    @auth
                        @if ($post->user_id === auth()->id())
                    <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2">Delete</button>
                        </form>
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}"><button class="btn btn-primary m-2">Edit</button></a>
                        @endif
                        @endauth
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
@endsection
