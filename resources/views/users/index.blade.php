@extends('layouts.main')
@section('title','Home')
<body>

    @section('content')
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Posts Counts</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->posts_count }} posts</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        @auth
                        @if($user->id == Auth::id())
                        <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2">Delete</button>
                        </form>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" ><button class="btn btn-primary m-2">Edit</button></a>
                        @endif
                        @endauth
                        <a href="{{ route('users.show', ['user'=> $user->id]) }}" ><button class="btn btn-success m-2">Show</button></a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
</body>
</html>
