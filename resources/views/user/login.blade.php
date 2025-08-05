@extends('user/master')

@section('content')

<div class="container mt-5">
  @if (session('msg'))
    <div class="alert alert-danger">
        {{ session('msg') }}
    </div>
@endif
  <h1>Login Page</h1>
  <br>
<form method="post" action="{{route('usersession')}}">
  @csrf
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email"/>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="pwd"/>
  </div>

  <!-- <div class="col">
      <a href="#!">Forgot password?</a>
  </div> -->

  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="{{route('user.create')}}">Register</a></p>
  </div>
</form>
</div>
@endsection