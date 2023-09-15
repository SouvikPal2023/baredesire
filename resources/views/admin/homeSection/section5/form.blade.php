
<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
        Image 
      </label>
      <input type="file" name="image" accept="image/*" id="ProfileImage" onchange="showSelectedImagesss(this)" class="form-control @error('image') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($section->image) ? config("app.url").Storage::url($section->image) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImgsss"
         class="w-px-100 h-px-100 rounded-circle"
         title="section Image"
         alt="section_image">
    </div>
  </div>
</div>





<div class="mb-3">
  <label class="form-label" for="Name">Heading <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="heading" 
           class="form-control @error('heading') is-invalid @enderror"
           id="heading" 
           placeholder="Enter Heading" 
           value="{{old('heading', isset($section->heading) ? $section->heading:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="Name">Description <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="desc" 
           class="form-control @error('desc') is-invalid @enderror"
           id="desc" 
           placeholder="Enter Sub Heading" 
           value="{{old('desc', isset($section->desc) ? $section->desc:'')}}" 
            />
  </div>
</div>







<div class="mb-3">
  <label class="form-label" for="Name">Button Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn_text" 
           class="form-control @error('btn_text') is-invalid @enderror"
           id="btn_text" 
           placeholder="Enter Button 1 Text" 
           value="{{old('btn_text', isset($section->btn_text) ? $section->btn_text:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="Name">Button URL </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn_url" 
           class="form-control @error('btn_url') is-invalid @enderror"
           id="btn_url" 
           placeholder="Enter Button 1 URL" 
           value="{{old('btn_url', isset($section->btn_url) ? $section->btn_url:'')}}" 
            />
  </div>
</div>






<button type="submit" class="btn btn-primary">{{isset($section) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('homeSection5.index') }}">Cancel</a>




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




