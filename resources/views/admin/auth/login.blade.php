@extends('admin.layout.loginLayout')

@section('title', 'Login')

@section('content')



<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div class="app-brand justify-content-center">
      <a href="{{ route('admin.login') }}" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          <img src="{{  isset($setting->site_logo) ? config("app.url").Storage::url($setting->site_logo) : asset('adminAssets/img/favicon/favicon.ico') }}" alt="logo" class="img-fluid my-2 w-px-200"/>
        </span>

       {{--  <span class="app-brand-text demo text-body fw-bolder">
          {{ isset($setting->site_name) ? $setting->site_name : env('APP_NAME') }}
        </span> --}}
      </a>
    </div>
    <!-- /Logo -->
    <h4 class="mb-2">Welcome to {{ isset($setting->site_name) ? $setting->site_name : env('APP_NAME') }}! 👋</h4>
    <p class="mb-4">Please sign-in to your account and start the adventure</p>
    <form id="formAuthentication" class="mb-3" action="{{ route('admin.login')}}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        
        <input type="email"
        class="form-control @error('email') is-invalid @enderror"
        id="Email"
        name="email"
        placeholder="Enter your email"
        autofocus
        required=""
        />
      </div>
      <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="Password">Password</label>
        </div>
        <div class="input-group input-group-merge">
          <input type="password"
          class="form-control @error('password') is-invalid @enderror"
          id="Password"
          name="password"
          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
          required=""
          />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
      </div>
      <div class="mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}/>
          <label class="form-check-label" for="remember"> Remember Me </label>
        </div>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
      </div>
    </form>
    <p class="text-center">
      Copyright &copy; {{ date('Y') }}  All rights reserved.
    </p>
  </div>
</div>

@endsection