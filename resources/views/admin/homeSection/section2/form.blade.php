





<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
      Section Image 1
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
  <label class="form-label" for="Name">Button 1 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn1_text" 
           class="form-control @error('btn1_text') is-invalid @enderror"
           id="btn1_text" 
           placeholder="Enter Button 1 Text" 
           value="{{old('btn1_text', isset($section->btn1_text) ? $section->btn1_text:'')}}" 
            />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Name">Button 1 URL </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn1_url" 
           class="form-control @error('btn1_url') is-invalid @enderror"
           id="btn1_url" 
           placeholder="Enter Button 1 URL" 
           value="{{old('btn1_url', isset($section->btn1_url) ? $section->btn1_url:'')}}" 
            />
  </div>
</div>


<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
      Section Image 2
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
  <label class="form-label" for="Name">Button 2 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn2_text" 
           class="form-control @error('btn2_text') is-invalid @enderror"
           id="btn2_text" 
           placeholder="Enter Button 2 Text" 
           value="{{old('btn2_text', isset($section->btn2_text) ? $section->btn2_text:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="Name">Button 2 URL </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn2_url" 
           class="form-control @error('btn2_url') is-invalid @enderror"
           id="btn2_url" 
           placeholder="Enter Button 1 URL" 
           value="{{old('btn2_url', isset($section->btn2_url) ? $section->btn2_url:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
      Section Image 3
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
  <label class="form-label" for="Name">Button 3 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn3_text" 
           class="form-control @error('btn3_text') is-invalid @enderror"
           id="btn3_text" 
           placeholder="Enter Button 3 Text" 
           value="{{old('btn3_text', isset($section->btn3_text) ? $section->btn3_text:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="Name">Button 3 URL </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn3_url" 
           class="form-control @error('btn3_url') is-invalid @enderror"
           id="btn3_url" 
           placeholder="Enter Button 1 URL" 
           value="{{old('btn3_url', isset($section->btn3_url) ? $section->btn3_url:'')}}" 
            />
  </div>
</div>
<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
      Section Image 4
      </label>
      <input type="file" name="image4" accept="image/*" id="ProfileImage" onchange="showSelectedImagesssss(this)" class="form-control @error('image4') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($section->image4) ? config("app.url").Storage::url($section->image4) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImgsssss"
         class="w-px-100 h-px-100 rounded-circle"
         title="section Image"
         alt="section_image">
    </div>
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Name">Button 4 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn4_text" 
           class="form-control @error('btn4_text') is-invalid @enderror"
           id="btn4_text" 
           placeholder="Enter Button 4 Text" 
           value="{{old('btn4_text', isset($section->btn4_text) ? $section->btn4_text:'')}}" 
            />
  </div>
</div>

<div class="mb-3">
  <label class="form-label" for="Name">Button 4 URL </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="btn4_url" 
           class="form-control @error('btn4_url') is-invalid @enderror"
           id="btn4_url" 
           placeholder="Enter Button 1 URL" 
           value="{{old('btn4_url', isset($section->btn4_url) ? $section->btn4_url:'')}}" 
            />
  </div>
</div>





<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
    Button Image 
      </label>
      <input type="file" name="btn_image" accept="image/*" id="ProfileImage" onchange="showSelectedImagessss(this)" class="form-control @error('btn_image') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($section->btn_image) ? config("app.url").Storage::url($section->btn_image) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImgssss"
         class="w-px-100 h-px-100 rounded-circle"
         title="section Image"
         alt="section_image">
    </div>
  </div>
</div>


<button type="submit" class="btn btn-primary">{{isset($section) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('homeSection1.index') }}">Cancel</a>




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
function showSelectedImagesssss(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#SelectedImgsssss').attr('src', e.target.result);
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

function showSelectedImagessss(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#SelectedImgssss').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}


</script>

@include('admin.common.scripts')




