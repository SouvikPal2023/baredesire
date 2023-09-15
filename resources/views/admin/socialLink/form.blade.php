
<div class="mb-3">
  <label class="form-label" for="SocialName">Social Name <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

    <input type="text" 
       name="name" 
       class="form-control @error('name') is-invalid @enderror"
       id="SocialName" 
       placeholder="Social Name" 
       value="{{old('name', isset($socialLink) ? $socialLink->name:'')}}" 
       required />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="SocialLink">Social Link <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

     <input type="url" 
           name="link" 
           class="form-control @error('link') is-invalid @enderror"
           id="SocialLink" 
           placeholder="Social Link" 
           value="{{old('link', isset($socialLink) ? $socialLink->link:'')}}" 
           required />

  </div>
</div>



<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
        Logo
      </label>
       <input type="file" 
             name="logo" 
             accept="image/*" 
             id="SocialImage" 
             class="form-control @error('logo') is-invalid @enderror" />

    </div>

    <div class="col-md-5">

        <img src="{{  isset($socialLink->logo) ? config("app.url").Storage::url($socialLink->logo) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImg"
         class="w-px-100 h-px-100 rounded-circle"
         title="Social Logo"
         alt="social_logo">
    </div>
  </div>
</div>



<button type="submit" class="btn btn-primary">{{isset($socialLink) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('socialLink.index') }}">Cancel</a>






@include('admin.common.scripts')




