@extends('frontend.master')
@section('title', "Forget Password")
@section('content')

<section class="login-page-form">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-12">
      <form class="rd-mailform1 text-center" action="{{ route('forget.password.post') }}" method="POST">
@csrf
                <div class="row justify-content-center">
                  <div class="col-md-7">
                    <div class="rd-mailform-forget">
                      <h3 class="">Forget Password</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Type Your Email... " name="email">
                    </div>
                    <div class="text-left">
                  <button class="contact_submit_btn" type="submit">Sumbmit</button>
                </div>
                    </div>
                  </div>
                  
                </div>
                
              </form>
      </div>
    </div>
  </div>
</section>
@endsection