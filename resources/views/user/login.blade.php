@extends('user/master')

@section('content')
<div class="container mt-5">
  <h1>Login Page</h1>
  <br>
<form>
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" />
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" />
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