@include('frontend.partials.headerCss')
@include('frontend.partials.header')


@yield('content')
@include('frontend.partials.footer')
 <!-- Modal1 -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content login">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login | Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
    <div class="form-sec" id="my_form">
              <form class="rd-mailform1" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
               @csrf
              <div class="row">
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="Email or Phone Number" name="email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="*Password" name="password">
                    </div>
                  </div>
                  
                </div>
                <div class="text-left">
                  <button class="contact_submit_btn" type="submit">Login</button>
                </div>
              </form>
            </div>
  </div>
  <div class="tab-pane" id="tabs-2" role="tabpanel">
    <div class="form-sec" id="my_form">
              <form class="rd-mailform1" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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








@include('frontend.partials.footerScripts')
