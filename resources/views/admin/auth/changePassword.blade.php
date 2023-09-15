@extends('admin.layout.loginLayout')

@section('title', 'Change Password')

@section('content')


<div class="auth-content">
    <div class="card">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="card-body">
            <div class="text-center">
              <img src="{{  isset($setting->site_logo) ? config("app.url").Storage::url($setting->site_logo) : asset('adminAssets/img/favicon/favicon.ico') }}" alt="logo" class="img-fluid mb-4 w-px-200"/>
            </div>
             <h4>Hello, <b>{{ isset($setting->site_name) ? $setting->site_name : env('APP_NAME') }} Admin</b></h4>
              <h6 class="font-weight-light">Change Your Password!</h6>

            {{-- <h4 class="mb-3 f-w-400">Signin</h4> --}}

           <form class="pt-3" action="{{ route('admin.changeDefaultPassword') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label class="floating-label" for="current">Current Password</label>
                 <input type="password" 
                        class="form-control @error('current') is-invalid @enderror" 
                        id="current" 
                        name="current" 
                        required="">
            </div>

            <div class="form-group mb-4">
              <label class="floating-label" for="password">New Password</label>
              <input type="password" 
                     class="form-control @error('current') is-invalid @enderror" 
                     id="password" 
                     name="password" 
                     required=""> 
            </div>

            <div class="form-group mb-4">
              <label class="floating-label" for="password_confirmation">Confirm New Password</label>
              <input type="password" 
                     class="form-control @error('password_confirmation') is-invalid @enderror" 
                     id="password_confirmation" 
                     name="password_confirmation" 
                     required="">  
            </div>

            <button class="btn btn-block btn-primary mb-4" type="submit">
              <i class='bx bxs-key' ></i> Update
            </button>
            <a class="btn btn-block btn-success mb-4" href="{{ route('adminHome') }}">
              <i class='bx bx-arrow-back'></i> Go to Dashboard
            </a>
          </form>

            <p class="mb-2 text-muted text-center">
                Copyright &copy; {{ date('Y') }}  All rights reserved.
            </p>
            {{-- <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> --}}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection