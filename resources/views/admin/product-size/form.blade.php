
<div class="mb-3">
  <label class="form-label" for="Name">Size <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

    <input type="text" 
           name="size" 
           class="form-control @error('size') is-invalid @enderror"
           id="Name" 
           placeholder="Enter Size" 
           value="{{old('size', isset($size->size) ? $size->size:'')}}" 
           required />
  </div>
</div>




<div class="mb-3">
  <label class="form-label" for="level">Product Type <span class="text-danger">*</span></label>
  <div class="input-group input-group-merge">

  <select class="form-control show-tick" name="type">
                  <option value="" selected Disabled> Please Select Option </option>
                 
                  
                  <option value="bra" {{(!empty($size->type) && $size->type == 'bra') || old('type') == 'bra' ? 'selected' : '' }}> Bra </option>
                
                  <option value="others" {{(!empty($size->type) && $size->type == 'others') || old('type') == 'others' ? 'selected' : '' }}> Other Products </option>
                 
                 
                 
               </select>
  </div>
</div>













<button type="submit" class="btn btn-primary">{{isset($size) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('product-size.index') }}">Cancel</a>






@include('admin.common.scripts')




