
<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="HomeBannerImage" class="form-label">
        Image <span class="text-danger">*</span> <b>(Max Dimension: 2500 * 2500)</b>
      </label>
      <input type="file" 
             name="image" 
             accept="image/*" 
             id="HomeBannerImage" 
             onchange="showSelectedImage(this)" 
             class="form-control @error('image') is-invalid @enderror" 
             {{isset($banner) ? '' : 'required'}} />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($banner->image) ? config("app.url").Storage::url($banner->image) : asset('adminAssets/img/default-image.png') }}"
            id="SelectedImg"
            class="w-px-100 h-px-100 rounded-circle"
            title="Home Banne Image"
            alt="home_banner_image">
    </div>
  </div>
</div>





<div class="mb-3">
  <label class="form-label" for="HomeBannerTitle">Banner Title <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
    
    <textarea class="form-control nicEdit @error('title') is-invalid @enderror" 
            rows="4" 
            name="title" 
            id="HomeBannerTitle" 
            placeholder="Banner Title">{{old('title', isset($banner->title) ? $banner->title:'')}}</textarea>
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="BannerSubTitle">Sub Title <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">
  
    <textarea class="form-control nicEdit @error('subtitle') is-invalid @enderror" 
            rows="4" 
            name="subtitle" 
            id="BannerSubTitle" 
            placeholder="Banner SubTitle">{{old('subtitle', isset($banner->subtitle) ? $banner->subtitle:'')}}</textarea>
  </div>
</div>


<div class="mb-3">
  <label class="form-label" for="HomeBannerDescription">Banner Short Description <b>(If any)</b></label>
  <div class="input-group input-group-merge">
  
   <textarea class="form-control nicEdit @error('short_description') is-invalid @enderror" 
              rows="4" 
              name="short_description" 
              id="HomeBannerDescription" 
              placeholder="Short Description">{{old('short_description', isset($banner->short_description) ? $banner->short_description:'')}}</textarea>
  </div>
</div>








<div class="mb-3">
  <label class="form-label" for="BtnText">Button Text</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content' ></i> 
    </span>

  <input type="text" 
          name="btn_text" 
          class="form-control"
          id="BtnText" 
          placeholder="Button Text" 
          value="{{old('btn_text', isset($banner->btn_text) ? $banner->btn_text:'')}}"/>
  </div>
</div>




<div class="mb-3">
  <label class="form-label" for="BtnLink">Button Link</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">
      <i class='bx bxs-book-content'></i> 
    </span>

  <input type="text" 
          name="btn_link" 
          class="form-control"
          id="BtnLink" 
          placeholder="Button Link" 
          value="{{old('btn_link', isset($banner->btn_link) ? $banner->btn_link:'')}}"/>
  </div>
</div>




<button type="submit" class="btn btn-primary">{{isset($banner) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('homeBanner.index') }}">Cancel</a>






@include('admin.common.scripts')


