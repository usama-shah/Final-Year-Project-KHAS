@extends('UserViews/Layout.layout')
@section('title','Login to Your Account')
@section('style')
<link rel="stylesheet" href="{{asset('css/registration/login.css')}}">
@endsection

@section('content')
<div class=" section">
    <div class="container">
    <div class="row ">
    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
      <form class="card shadow-lg rounded-3 border-0 login-form mt-5 mb-5 needs-validation" action="{{ url('login') }}" method="POST" novalidate>
        @csrf

        <div class="card-body ">
    <div class="title text-center">
    <h3>Login Into Your Account</h3>
    </div>
    <div class="social-login">
    <div class="row">

    <div class="mx-auto col-12"><a class="btn google-btn" href="{{route('login.google')}}"><i class="fa-brands fa-google"></i> Google </a>
    </div>
    </div>
    </div>
    <div class="alt-option">
    <span>Or</span>
    </div>
    <div class="form-group">
      @if ($errors->any())
      <div class="alert alert-danger">

              @foreach ($errors->all() as $error)
                 {{ $error }}
              @endforeach

      </div>
  @endif

  @if (session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
@endif
    <label for="email">Email</label>
    <input class="form-control" type="email" id="email" value="{{old('email')}}" name="email" required="">
        <div class="invalid-feedback">
        Email is required.
      </div>
</div>
    <div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" type="password" id="password" name="password" required="">
    <div class="invalid-feedback">
        Password is required.
      </div>
</div>
    <div class="d-flex flex-wrap justify-content-between bottom-content">
    <div class="form-check">
      <input type="checkbox" class="form-check-input width-auto" id="remember" name="remember">
      <label class="form-check-label">Remember me</label>
    </div>
    <a class="lost-pass" href="{{url('forgot_password')}}">Forgot password?</a>
    </div>
    <div class="button">
    <button class="btn btn-khas-primary" type="submit">Login</button>
    </div>
    <p class="outer-link">Don't have an account? <a href="{{url('signup')}}">Create here </a>
    </p>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>

@endsection

@section('script')
<script>
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
@endsection


