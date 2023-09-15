@extends('admin.layout.loginLayout')

@section('title', 'Change Password')

@section('content')



<div class="auth-content">
  <div class="card">
    <div class="row align-items-center text-center">
      <div class="col-md-12">
        <div class="card-body">
          <img src="{{  isset($setting->site_logo) ? config("app.url").Storage::url($setting->site_logo) : asset('adminAssets/images/logo-dark.png') }}" alt="logo" class="img-fluid mb-4 hei-110"/>
          <h4>{{ isset($setting->site_name) ? $setting->site_name : env('APP_NAME') }} Admin!</h4>

          <h6 class="font-weight-light">Reset Password</h6>

          <form class="pt-3" action="{{ route('reset.password.submit')}}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group mb-3">
              <label class="floating-label" for="Email">Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
              
            </div>

            <div class="form-group mb-4">
              <label class="floating-label" for="Password">Password</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password" name="password" required=""> 
 
            </div>

            <div class="form-group mb-4">
              <label class="floating-label" for="PasswordConfirm">Confirm Password</label>
               <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="PasswordConfirm" name="password_confirmation" required=""> 
 
            </div>
            
            <button class="btn btn-block btn-primary mb-4" type="submit"> Reset Password</button>

          </form>
          <p class="my-4 text-muted">
            Copyright &copy; {{ date('Y') }}  All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection