
<div class="mb-3">
  <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="name" 
           class="form-control @error('name') is-invalid @enderror"
           id="Name" 
           placeholder="Enter Name" 
           value="{{old('name', isset($color->name) ? $color->name:'')}}" 
           required />
  </div>
</div>



<div class="mb-3">
  <label class="form-label" for="Designation">Code</label>
  <div class="input-group input-group-merge">

      <input type="text" 
           name="code" 
           class="form-control @error('code') is-invalid @enderror"
           id="code" 
           placeholder="Enter Color Code" 
           value="{{old('code', isset($color->code) ? $color->code:'')}}" />

  </div>
</div>



<div class="mb-3">
  <div class="row">
    <div class="col-md-7">
      <label for="ProfileImage" class="form-label">
        Icon
      </label>
      <input type="file" name="icon" accept="image/*" id="ProfileImage" onchange="showSelectedImage(this)" class="form-control @error('image') is-invalid @enderror" />
    </div>

    <div class="col-md-5">
        <img src="{{  isset($color->icon) ? config("app.url").Storage::url($color->icon) : asset('adminAssets/img/default-image.png') }}"
         id="SelectedImg"
         class="w-px-100 h-px-100 rounded-circle"
         title="Color Image"
         alt="Color_image">
    </div>
  </div>
</div>











<button type="submit" class="btn btn-primary">{{isset($color) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('color.index') }}">Cancel</a>






@include('admin.common.scripts')




