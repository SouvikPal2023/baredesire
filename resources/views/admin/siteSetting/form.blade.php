

<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="SiteLogo" class="form-label">Site Logo</label>
      <input type="file" 
             name="site_logo" 
             accept="image/*" 
             id="SiteLogo" 
             onchange="showSiteLogo(this)" 
             class="form-control @error('site_logo') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
      <img src="{{  isset($siteSetting->site_logo) ? config("app.url").Storage::url($siteSetting->site_logo) : asset('adminAssets/img/default-image.png') }}"
         id="SiteLogoImg"
         class="w-px-200 rounded h-px-50"
         title="Site Logo"
         alt="site_logo">
    </div>
  </div>
</div>


<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="LightLogo" class="form-label">Light Logo</label>
      <input type="file" 
             name="light_logo" 
             accept="image/*" 
             id="LightLogo" 
             onchange="showLightLogo(this)" 
             class="form-control @error('light_logo') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($siteSetting->light_logo) ? config("app.url").Storage::url($siteSetting->light_logo) : asset('adminAssets/img/default-image.png') }}"
         id="LightLogoImg"
         class="w-px-200 rounded h-px-50 bg-dark"
         title="Light Logo"
         alt="light_logo">
    </div>
  </div>
</div>


<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="Favicon" class="form-label">Favicon</label>
      <input type="file" 
             name="favicon" 
             accept="image/*" 
             id="Favicon" 
             onchange="showFavicon(this)" 
             class="form-control @error('favicon') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($siteSetting->favicon) ? config("app.url").Storage::url($siteSetting->favicon) : asset('adminAssets/img/default-image.png') }}"
         id="FaviconImg"
         class="w-px-100 h-px-100 rounded-circle bg-dark"
         title="Favicon"
         alt="favicon">
    </div>
  </div>
</div>




<div class="mb-3">
  <label class="form-label" for="SiteName">Site Name<span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>
   <input type="text" 
           name="site_name" 
           class="form-control @error('site_name') is-invalid @enderror"
           id="SiteName" 
           placeholder="Site Name" 
           value="{{old('site_name', isset($siteSetting->site_name) ? $siteSetting->site_name:'')}}" 
            />
  </div>
</div>







<div class="mb-3">
  <label class="form-label" for="MetaTitle">Meta Title <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>

   <input type="text" 
           name="meta_title" 
           class="form-control @error('meta_title') is-invalid @enderror"
           id="MetaTitle" 
           placeholder="Meta Title" 
           value="{{old('meta_title', isset($siteSetting->meta_title) ? $siteSetting->meta_title:'')}}" 
            />
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="MetaKeyword">Meta Keyword</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>
    
    <input type="text" 
           name="meta_keyword" 
           class="form-control @error('meta_keyword') is-invalid @enderror"
           id="MetaKeyword" 
           placeholder="Meta Keyword" 
           value="{{old('meta_keyword', isset($siteSetting->meta_keyword) ? $siteSetting->meta_keyword:'')}}" 
            />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="MetaDescription">Meta Description</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>
    
   <textarea class="form-control @error('meta_description') is-invalid @enderror" 
              rows="4" 
              name="meta_description" 
              id="MetaDescription">{{old('meta_description', isset($siteSetting->meta_description) ? $siteSetting->meta_description:'')}}</textarea>
  </div>
</div>













<div class="mb-3">
  <label class="form-label" for="CopyrightText">Copyright Text <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bx-copyright' ></i> 
    </span>

  <input type="text" 
           name="copyright_text" 
           class="form-control @error('copyright_text') is-invalid @enderror"
           id="CopyrightText" 
           placeholder="Copyright Text" 
           value="{{old('copyright_text', isset($siteSetting->copyright_text) ? $siteSetting->copyright_text:'')}}" 
            />
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="FooterText">Footer Text</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>

    <input type="text" 
           name="footer_text" 
           class="form-control @error('footer_text') is-invalid @enderror"
           id="FooterText" 
           placeholder="Footer Text" 
           value="{{old('footer_text', isset($siteSetting->footer_text) ? $siteSetting->footer_text:'')}}"/>
  </div>
</div>




















<div class="mb-3 mt-sm-5">
  <hr style="color: #696cff;">

  <label class="form-label" for="ContactTitle">Contact Title<span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>
   <input type="text" 
           name="contact_title" 
           class="form-control @error('contact_title') is-invalid @enderror"
           id="ContactTitle" 
           placeholder="Contact Title" 
           value="{{old('contact_title', isset($siteSetting->contact_title) ? $siteSetting->contact_title:'')}}" 
            />
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="SiteEmail">Contact Email <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
    <input type="email" 
           name="site_email" 
           class="form-control @error('site_email') is-invalid @enderror"
           id="SiteEmail" 
           placeholder="Contact Email" 
           value="{{old('site_email', isset($siteSetting->site_email) ? $siteSetting->site_email:'')}}" 
            />
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="SitePhone">Contact Phone</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bx-phone-call' ></i>
    </span>

    <input type="tel" 
           name="site_phone" 
           class="form-control @error('site_phone') is-invalid @enderror"
           id="SitePhone" 
           placeholder="Contact Phone" 
           value="{{old('site_phone', isset($siteSetting->site_phone) ? $siteSetting->site_phone:'')}}" />
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="ContactAddress">Contact Address</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>
    
   <textarea class="form-control @error('address') is-invalid @enderror" 
              rows="4" 
              name="address" 
              id="ContactAddress">{{old('address', isset($siteSetting->address) ? $siteSetting->address:'')}}</textarea>
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="MapLink">Map Link</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>
    
   <textarea class="form-control @error('map_link') is-invalid @enderror" 
              rows="4" 
              name="map_link" 
              id="MapLink">{{old('map_link', isset($siteSetting->map_link) ? $siteSetting->map_link:'')}}</textarea>
  </div>
</div>



<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="PartnerImage1" class="form-label">WhatsApp Logo</label>
      <input type="file" 
             name="whatsapp_logo" 
             accept="image/*" 
             id="PartnerImage1" 
             onchange="showPartnerImage1(this)" 
             class="form-control @error('whatsapp_logo') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($siteSetting->whatsapp_logo) ? config("app.url").Storage::url($siteSetting->whatsapp_logo) : asset('adminAssets/img/default-image.png') }}"
         id="PartnerImg1"
         class="w-px-100 h-px-100 rounded-circle bg-dark"
         title="PartnerImage1"
         alt="whatsapp_logo">
    </div>
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="SitePhone">WhatsApp No</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bx-phone-call' ></i>
    </span>

    <input type="tel" 
           name="site_whatsapp" 
           class="form-control @error('site_whatsapp') is-invalid @enderror"
           id="SitePhone" 
           placeholder="Contact Phone" 
           value="{{old('site_whatsapp', isset($siteSetting->site_whatsapp) ? $siteSetting->site_whatsapp:'')}}" />
  </div>
</div>


<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="PartnerImage1" class="form-label">WhatsApp Logo</label>
      <input type="file" 
             name="size_chart_image" 
             accept="image/*" 
             id="PartnerImage2" 
             onchange="showPartnerImage2(this)" 
             class="form-control @error('size_chart_image') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($siteSetting->size_chart_image) ? config("app.url").Storage::url($siteSetting->size_chart_image) : asset('adminAssets/img/default-image.png') }}"
         id="PartnerImg2"
         class="w-px-100 h-px-100 rounded-circle bg-dark"
         title="PartnerImage2"
         alt="size_chart_image">
    </div>
  </div>
</div>








<button type="submit" class="btn btn-primary">Update</button>
<a class="btn btn-danger" href="{{ route('siteSetting.index') }}">Cancel</a>










<script>
   function showSiteLogo(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#SiteLogoImg').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }


  function showLightLogo(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#LightLogoImg').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }


  function showFavicon(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#FaviconImg').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }


  function showOGImage(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#OGImg').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }



  function showPartnerImage1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#PartnerImg1').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }


    function showPartnerImage2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#PartnerImg2').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }

</script>

