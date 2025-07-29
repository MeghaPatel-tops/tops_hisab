@extends('user/master')

@section('content')
<div class="container mt-5">
  <h1>Registration Page</h1>
<form>

    <!-- Name input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" class="form-control" />
        <label class="form-label">Name</label>
    </div>

    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" class="form-control" />
        <label class="form-label">Email address</label>
    </div>

    <!-- Phone input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="number" class="form-control" />
        <label class="form-label">Phone Number</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" class="form-control" />
        <label class="form-label">Password</label>
    </div>

  <!-- Submit button -->
  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Already a member? <a href="#!">Login</a></p>
  </div>
</form>
</div>
@endsection