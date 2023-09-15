@include('frontend.partials.headerCss')
@include('frontend.partials.header')

 <!-- inner-banner -->
 <section class="section breadcrumb-wrapper">
        <div class="shell">
          <h2>Contact Us</h2>
        </div>
      </section>
      <!-- inner-banner end -->

      <section class="service-wrap">
        <div class="container">
          <div class="row">
  <div class="col-md-12">
        <div class="service-box">
                <div class="inner_page_wrap about_inner_pg_wrap inner">

    <div class="container">
      <div class="row">
        <div class="col-md-12 m-0 p-0">
          <div class="contact-item">
            <div class="address-content">
              <h5>{{$setting->contact_title}} </h5>
              <p>{{$setting->address}}</p>
            </div>
            <span class="icon"><i class="fa fa-rocket"></i></span>
          </div>
          <div class="contact-item">
            <div class="address-content">
              <h5>Call Us:</h5>
              <a href="tel:123456789">{{$setting->site_phone}}</a>
            </div>
            <span class="icon"><i class="fa fa-volume-control-phone"></i></span>
          </div>
          <div class="contact-item">
            <div class="address-content">
              <h5>Mail Us:</h5>
              <p><a href="mailto:baredsire@gmail.com">
              {{$setting->site_email}}</a>
            </p>
          </div>
          <span class="icon"><i class="fa fa-envelope-open-o"></i></span>
        </div>
        <!--<div class="map_section">-->
        <!-- {!!$setting->map_link!!}-->
        <!--</div>-->
      </div>
        <!--<div class="col-md-12 m-0 p-0">-->
        <!--  <div class="contact-form">-->
        <!--    <div class="form-header">-->
        <!--      <h2>Send Us an Enquiry</h2>-->
        <!--    </div>-->
        <!--    <div class="form-sec" id="my_form">-->
        <!--      <form class="rd-mailform1" action="{{route('contact')}}" method="POST"-->
        <!--                    enctype="multipart/form-data">-->
        <!--                    @csrf-->
        <!--        <div class="row">-->
        <!--          <div class="col-md-12">-->
        <!--            <div class="form-group">-->
        <!--              <input type="text" class="form-control" placeholder="Name" name="name">-->
        <!--            </div>-->
        <!--          </div>-->
        <!--          <div class="col-md-12">-->
        <!--            <div class="form-group">-->
        <!--              <input type="text" class="form-control" placeholder="Phone No." name="phone">-->
        <!--            </div>-->
        <!--          </div>-->
        <!--          <div class="col-md-12">-->
        <!--            <div class="form-group">-->
        <!--              <input type="text" class="form-control" placeholder="Email" name="email">-->
        <!--            </div>-->
        <!--          </div>-->
        <!--          <div class="col-md-12">-->
        <!--            <div class="form-group">-->
        <!--              <input type="text" class="form-control" placeholder="Subject" name="subject">-->
        <!--            </div>-->
        <!--          </div>-->
        <!--          <div class="col-md-12">-->
        <!--            <div class="form-group">-->
        <!--              <textarea class="form-control" placeholder="Message*" name="message"></textarea>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--        <div class="text-center">-->
        <!--          <button class="contact_submit_btn" type="submit">Submit</button>-->
        <!--        </div>-->
        <!--      </form>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        
    </div>
  </div>
</div>

              </div>
  </div>
</div>
</div>
</section>

<!-- footer -->

@include('frontend.partials.footer')


@include('frontend.partials.footerScripts')