 <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">

        Copyright © <a class="footer-link fw-bolder">{{ isset($setting->site_name) ? $setting->site_name : env('APP_NAME') }}</a> 
          {{ date('Y') }}
      </div>

    </div>
  </footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>