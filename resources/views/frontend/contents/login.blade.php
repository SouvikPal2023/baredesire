@extends('frontend.master')
@section('title', "Login|Register")
@section('content')

<section class="login-page-form">
  <div class="container">
    <div class="row login-wrap align-items-center">

      <div class="col-md-5 p-0">
        <div class="contact-image">
       
          <img src="{{ asset('assets/images/pr1.jpg')}}" alt="">
        </div>
      </div>
      <div class="col-md-7 p-0">
        <div class="login-page" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
  <div class="login-page-box" role="document">
    <div class="modal-content login">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login | Register</h5>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Register</a>
  </li>
</ul><!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="tabs-1" role="tabpanel">
    <div class="form-sec" id="my_form" >
              <form class="rd-mailform1" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf
              <div class="row">
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                  </div>
                  
                </div>
                <div class="text-left">
                  <button class="contact_submit_btn" type="submit">Login</button>
                  <a href="{{route('forgotPwdForm')}}">Forget Password</a>
                </div>
              </form>
            </div>
  </div>
  <div class="tab-pane" id="tabs-2" role="tabpanel">
    <div class="form-sec" id="my_form">
              <form class="rd-mailform1"  method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
               @csrf 
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Phone No." name="phone">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="*Password" name="password">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="*Confirm Password" name="con_password">
                    </div>
                  </div>
                  
                </div>
                <div class="text-left">
                  <button class="contact_submit_btn" type="submit">Register</button>
                </div>
              </form>
            </div>
  </div>

</div>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript to activate the correct tab based on the URL hash
    document.addEventListener('DOMContentLoaded', (event) => {
        const hash = window.location.hash;
        if (hash) {
            const tab = document.querySelector(hash);
            if (tab) {
                tab.classList.add('show', 'active');
                const tabLink = document.querySelector(`[href="${hash}"]`);
                if (tabLink) {
                tabLink.click();
            }
            }
        }
    });
</script>
@endsection