
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
           placeholder="Enter Description" 
           value="{{old('desc', isset($section->desc) ? $section->desc:'')}}" 
            />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="name" 
           class="form-control @error('name') is-invalid @enderror"
           id="name" 
           placeholder="Enter Name" 
           value="{{old('name', isset($section->name) ? $section->name:'')}}" 
            />
  </div>
</div>




<button type="submit" class="btn btn-primary">{{isset($section) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('homeSection8.index') }}">Cancel</a>




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




