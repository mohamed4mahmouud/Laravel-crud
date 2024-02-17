@extends('layouts.main')
 @section('title','Form Create User')
<body>

    @section('content')


<form method="POST" action="{{ route('users.store') }}" class="form-inline">
   @csrf
    <div class="form-group mr-2">
        <label for="username" class="mr-2">Username:</label>
        <input type="text" name="username" id="username" class="form-control form-control-sm" >
    </div>
    <div class="form-group mr-2">
        <label for="email" class="mr-2">Email:</label>
        <input type="email" name="email" id="email" class="form-control form-control-sm">
    </div>

    <div>
        <a href="{{ route('auth.social') }}">Login with facebook</a>
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection


</body>
</html>
