@extends('layouts.main')
@section('title', 'show')
<body>
    @section('content')
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    @foreach ($posts as $post)
                        <p class="card-text">{{ $post->body }}</p>
                    @endforeach
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Go Home</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
