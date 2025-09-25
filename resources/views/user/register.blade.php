@extends('user/master')

@section('content')
<div class="container mt-5">
     @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
<br>
<form action="{{route('user.store')}}" method="POST">
   
    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
    <!-- Name input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="username" />
    </div>

    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label">Email address </label>
        <input type="email" class="form-control" name="email" id="email" onfocusout="sendOpt(this.value)"/>
    </div>

     <!-- Otp input -->
    <div data-mdb-input-init class="form-outline mb-4" id="otpid" style="display:none">
        <label class="form-label">Enter Otp </label>
        <input type="number" class="form-control" name="otp"  />
    </div>

    <!-- Phone input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label">Phone Number</label>
        <input type="number" class="form-control" name="contact" />
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password"/>
    </div>

  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Already a member? <a href="{{route('login')}}">Login</a></p>
  </div>
</form>
</div>
@endsection