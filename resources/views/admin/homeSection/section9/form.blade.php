






<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
      Image 1
      </label>
      <input type="file" name="image1" accept="image/*" id="ProfileImage" onchange="showSelectedImagesss(this)" class="form-control @error('image1') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($section->image1) ? config("app.url").Storage::url($section->image1) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImgsss"
         class="w-px-100 h-px-100 rounded-circle"
         title="section Image"
         alt="section_image">
    </div>
  </div>
</div>
<div class="mb-3">
  <label class="form-label" for="Name"> URL 1</label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="url1" 
           class="form-control @error('url1') is-invalid @enderror"
           id="url1" 
           placeholder="Enter URL" 
           value="{{old('url1', isset($section->url1) ? $section->url1:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
       Image 2
      </label>
      <input type="file" name="image2" accept="image/*" id="ProfileImage" onchange="showSelectedImages(this)" class="form-control @error('image2') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($section->image2) ? config("app.url").Storage::url($section->image2) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImgs"
         class="w-px-100 h-px-100 rounded-circle"
         title="section Image"
         alt="section_image">
    </div>
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="Name"> URL 2</label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="url2" 
           class="form-control @error('url2') is-invalid @enderror"
           id="url2" 
           placeholder="Enter URL" 
           value="{{old('url2', isset($section->url2) ? $section->url2:'')}}" 
            />
  </div>
</div>
<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
     Image 3
      </label>
      <input type="file" name="image3" accept="image/*" id="ProfileImage" onchange="showSelectedImagess(this)" class="form-control @error('image3') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($section->image3) ? config("app.url").Storage::url($section->image3) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImgss"
         class="w-px-100 h-px-100 rounded-circle"
         title="section Image"
         alt="section_image">
    </div>
  </div>
</div>
<div class="mb-3">
  <label class="form-label" for="Name"> URL 2</label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="url3" 
           class="form-control @error('url3') is-invalid @enderror"
           id="url3" 
           placeholder="Enter URL" 
           value="{{old('url3', isset($section->url3) ? $section->url3:'')}}" 
            />
  </div>
</div>







<button type="submit" class="btn btn-primary">{{isset($section) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('homeSection9.index') }}">Cancel</a>




<script>
  function showSelectedImages(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#SelectedImgs').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}

function showSelectedImagesss(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#SelectedImgsss').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}

function showSelectedImagess(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#SelectedImgss').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
</script>

@include('admin.common.scripts')




