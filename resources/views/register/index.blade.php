@extends('SportsPedia.frontend')

@section('content')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
      <form action="/register" method="POST">
        @csrf
        <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
          <label for="name">Name</label>
          @error('name')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
      </form>
    </main>

    <small class="d-block text-center mt-3">Already Have Account?<a href="/login">Login Now</a></small>

  </div>
</div>

@endsection