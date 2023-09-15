
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
  <label class="form-label" for="Name">Sub Heading <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="sub_heading" 
           class="form-control @error('sub_heading') is-invalid @enderror"
           id="sub_heading" 
           placeholder="Enter Sub Heading" 
           value="{{old('sub_heading', isset($section->sub_heading) ? $section->sub_heading:'')}}" 
            />
  </div>
</div>
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
  <label class="form-label" for="Name">Image 1 Heading </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image1_heading" 
           class="form-control @error('image1_heading') is-invalid @enderror"
           id="image1_heading" 
           placeholder="Enter Button 1 Text" 
           value="{{old('image1_heading', isset($section->image1_heading) ? $section->image1_heading:'')}}" 
            />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Name">Image 1 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image1_text" 
           class="form-control @error('image1_text') is-invalid @enderror"
           id="image1_text" 
           placeholder="Enter Button 1 URL" 
           value="{{old('image1_text', isset($section->image1_text) ? $section->image1_text:'')}}" 
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
  <label class="form-label" for="Name">Image 2 Heading </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image2_heading" 
           class="form-control @error('image2_heading') is-invalid @enderror"
           id="image2_heading" 
           placeholder="Enter Button 2 Text" 
           value="{{old('image2_heading', isset($section->image2_heading) ? $section->image2_heading:'')}}" 
            />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Name">Image 2 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image2_text" 
           class="form-control @error('image2_text') is-invalid @enderror"
           id="image2_text" 
           placeholder="Enter Button 2 URL" 
           value="{{old('image2_text', isset($section->image2_text) ? $section->image2_text:'')}}" 
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
  <label class="form-label" for="Name">Image 3 Heading </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image3_heading" 
           class="form-control @error('image3_heading') is-invalid @enderror"
           id="image3_heading" 
           placeholder="Enter Button 3 Text" 
           value="{{old('image3_heading', isset($section->image3_heading) ? $section->image3_heading:'')}}" 
            />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Name">Image 3 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image3_text" 
           class="form-control @error('image3_text') is-invalid @enderror"
           id="image3_text" 
           placeholder="Enter Button 3 URL" 
           value="{{old('image3_text', isset($section->image3_text) ? $section->image3_text:'')}}" 
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
  <label class="form-label" for="Name">Image 4 Heading </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image4_heading" 
           class="form-control @error('image4_heading') is-invalid @enderror"
           id="image4_heading" 
           placeholder="Enter Button 4 Text" 
           value="{{old('image4_heading', isset($section->image4_heading) ? $section->image4_heading:'')}}" 
            />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Name">Image 4 Text </label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="image4_text" 
           class="form-control @error('image4_text') is-invalid @enderror"
           id="image4_text" 
           placeholder="Enter Button 4 URL" 
           value="{{old('image4_text', isset($section->image4_text) ? $section->image4_text:'')}}" 
            />
  </div>
</div>









<button type="submit" class="btn btn-primary">{{isset($section) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('homeSection6.index') }}">Cancel</a>




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




