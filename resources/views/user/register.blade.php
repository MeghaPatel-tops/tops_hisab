@extends('user/master')

@section('content')
<div class="container mt-5">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <h1>Registration Page</h1>
<form action="{{route('user.store')}}" method="POST">
    @csrf
    <!-- Name input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" class="form-control" name="username" />
        <label class="form-label">Name</label>
    </div>

    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" class="form-control" name="email"/>
        <label class="form-label">Email address</label>
    </div>

    <!-- Phone input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="number" class="form-control" name="contact"/>
        <label class="form-label">Phone Number</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" class="form-control" name="password"/>
        <label class="form-label">Password</label>
    </div>

  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Already a member? <a href="#!">Login</a></p>
  </div>
</form>
</div>
@endsection