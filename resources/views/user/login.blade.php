@extends('user/master')

@section('content')
<div class="container mt-5">
  <h1>Login Page</h1>
<form>
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" class="form-control" />
    <label class="form-label">Email address</label>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" class="form-control" />
    <label class="form-label">Password</label>
  </div>

  <!-- <div class="col">
      <a href="#!">Forgot password?</a>
  </div> -->

  <!-- Submit button -->
  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
  </div>
</form>
</div>
@endsection