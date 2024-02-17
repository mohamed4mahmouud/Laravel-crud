@extends('layouts.main')

@section('title','Edit')
<body>

      @section('content')
      <div class="container mt-4">
        <h2>Edit User</h2>
        <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    @endsection
</body>
