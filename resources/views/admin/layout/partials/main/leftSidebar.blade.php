<!-- [ navigation menu ] start -->



<aside id="layout-menu" class="layout-menu menu-vertical menus bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('adminHome') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{  isset($setting->site_logo) ? config("app.url").Storage::url($setting->site_logo) : asset('adminAssets/img/favicon/favicon.ico') }}" alt="logo" class="img-fluid w-px-175"/>
      </span>

     {{--  <span class="app-brand-text demo menu-text fw-bolder ms-2">
         {{ isset($setting->site_name) ? $setting->site_name : env('APP_NAME') }}
      </span> --}}
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Route::is('adminHome') ? 'active' : '' }}">
      <a href="{{ route('adminHome') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Product Sections</span>
    </li>

    {{-- <li class="menu-item {{ substr(Route::current()->getName(),0,12)=='testimonial.' ? 'active' : '' }}">
      <a href="{{ route('testimonial.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-message-check"></i>
        <div>Manage Testimonials</div>
      </a>
    </li> --}}
    <li class="menu-item {{ substr(Route::current()->getName(),0,17)=='product-category.' ? 'active' : '' }}">
        <a href="{{ route('product-category.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-video-plus"></i>
          <div>Product Categories</div>
        </a>
      </li>

      <li class="menu-item {{ substr(Route::current()->getName(),0,8)=='product.' ? 'active' : '' }}">
        <a href="{{ route('product.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user-pin"></i>
          <div>Product</div>
        </a>
      </li>

      <li class="menu-item {{ substr(Route::current()->getName(),0,6)=='color.' ? 'active' : '' }}">
        <a href="{{ route('color.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-palette"></i>
          <div>Colors</div>
        </a>
      </li>

      <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='product-size.' ? 'active' : '' }}">
        <a href="{{ route('product-size.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx-message-check"></i>
          <div>Product Size</div>
        </a>
      </li>

      <li class="menu-item {{ substr(Route::current()->getName(),0,6)=='order.' ? 'active' : '' }}">
        <a href="{{ route('order.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cart-alt"></i>
          <div>Order Management</div>
        </a>
      </li>
    <!-- <li class="menu-item {{ substr(Route::current()->getName(),0,4)=='faq.' ? 'active' : '' }}">
      <a href="{{ route('faq.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-question-mark"></i><i class=''></i>
        <div>Manage FAQ(s)</div>
      </a>
    </li>


    <li class="menu-item {{ substr(Route::current()->getName(),0,11)=='socialLink.' ? 'active' : '' }}">
      <a href="{{ route('socialLink.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-link"></i>
        <div>Manage Social Link(s)</div>
      </a>
    </li> -->

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Home Page Sections</span>
    </li>

    <!-- <li class="menu-item {{ Route::is('menu') ? 'active' : '' }}">
      <a href="{{ route('menu') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-menu"></i>
        <div>Manage Menu</div>
      </a>
    </li> -->


{{--     <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>

    <li class="menu-item {{ substr(Route::current()->getName(),0,11)=='homeBanner.' || substr(Route::current()->getName(),0,13)=='homeSection1.' || substr(Route::current()->getName(),0,13)=='homeSection2.' || substr(Route::current()->getName(),0,13)=='homeSection3.' || substr(Route::current()->getName(),0,13)=='homeSection4.' || substr(Route::current()->getName(),0,13)=='homeSection5.' || substr(Route::current()->getName(),0,13)=='homeSection6.' || substr(Route::current()->getName(),0,13)=='homeSection7.' || substr(Route::current()->getName(),0,13)=='homeSection8.' || substr(Route::current()->getName(),0,13)=='homeSection9.' || substr(Route::current()->getName(),0,14)=='homeSection10.' || substr(Route::current()->getName(),0,14)=='homeSection11.' || substr(Route::current()->getName(),0,14)=='homeSection12.' || substr(Route::current()->getName(),0,14)=='homeSection13.' || substr(Route::current()->getName(),0,14)=='homeSection14.' ||  substr(Route::current()->getName(),0,14)=='homeSection15.' || substr(Route::current()->getName(),0,14)=='homeSection16.' ? 'active open' : '' }}">

      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div>Manage Home</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ substr(Route::current()->getName(),0,11)=='homeBanner.' ? 'active' : '' }}">
          <a href="{{ route('homeBanner.index') }}" class="menu-link">
            <div>Manage Banner</div>
          </a>
        </li>--}}

        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection1.' ? 'active' : '' }}">
          <a href="{{ route('homeSection1.index') }}" class="menu-link">
            <div>Manage Section 1</div>
          </a>
        </li>


        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection2.' ? 'active' : '' }}">
          <a href="{{ route('homeSection2.index') }}" class="menu-link">
            <div>Manage Section 2</div>
          </a>
        </li>

        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection3.' ? 'active' : '' }}">
          <a href="{{ route('homeSection3.index') }}" class="menu-link">
            <div>Manage Section 3</div>
          </a>
        </li>

        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection4.' ? 'active' : '' }}">
          <a href="{{ route('homeSection4.index') }}" class="menu-link">
            <div>Manage Section 4</div>
          </a>
        </li>


        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection5.' ? 'active' : '' }}">
          <a href="{{ route('homeSection5.index') }}" class="menu-link">
            <div>Manage Section 5</div>
          </a>
        </li>

        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection6.' ? 'active' : '' }}">
          <a href="{{ route('homeSection6.index') }}" class="menu-link">
            <div>Manage Section 6</div>
          </a>
        </li>


        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection7.' ? 'active' : '' }}">
          <a href="{{ route('homeSection7.index') }}" class="menu-link">
            <div>Manage Section 7</div>
          </a>
        </li>

        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection8.' ? 'active' : '' }}">
          <a href="{{ route('homeSection8.index') }}" class="menu-link">
            <div>Manage Section 8</div>
          </a>
        </li>


        <li class="menu-item {{ substr(Route::current()->getName(),0,13)=='homeSection9.' ? 'active' : '' }}">
          <a href="{{ route('homeSection9.index') }}" class="menu-link">
            <div>Manage Section 9</div>
          </a>
        </li>

        {{-- <li class="menu-item {{ substr(Route::current()->getName(),0,14)=='homeSection10.' ? 'active' : '' }}">
          <a href="" class="menu-link">
            <div>Manage Section 10</div>
          </a>
        </li>


        <li class="menu-item {{ substr(Route::current()->getName(),0,14)=='homeSection11.' ? 'active' : '' }}">
          <a href="" class="menu-link">
            <div>Manage Section 11</div>
          </a>
        </li> --}}
      </ul>
    </li> 
    


  </ul>
</aside>


<!-- [ navigation menu ] end -->
