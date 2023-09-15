@extends('admin.layout.loginLayout')

@section('title', 'Forgot Password')

@section('content')


<div class="auth-content">
  <div class="card">
    <div class="row align-items-center text-center">
      <div class="col-md-12">
        <div class="card-body">
          <img src="{{  isset($setting->site_logo) ? config("app.url").Storage::url($setting->site_logo) : asset('adminAssets/images/logo-dark.png') }}" alt="logo" class="img-fluid mb-4 hei-110"/>
          <h4>{{ isset($setting->site_name) ? $setting->site_name : env('APP_NAME') }} Admin!</h4>
          <h6 class="font-weight-light">Reset Password</h6>
          <form class="pt-3" action="{{ route('forget.password.submit')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label class="floating-label" for="Email">Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email" name="email" required="">
              
            </div>
            
            <button class="btn btn-block btn-primary mb-4" type="submit"> Send Password Reset Link</button>
            <a href="{{ route('admin.login') }}">
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Back To Login
            </a>
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