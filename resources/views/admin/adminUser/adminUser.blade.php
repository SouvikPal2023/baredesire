@extends('admin.layout.adminMasterLayout')

@section('title', "Admin Profile")

@section('content')


<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Admin Profile</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('changeAdminProfile') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="Name">Full Name</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-fullname2" class="input-group-text"
                ><i class="bx bx-user"></i
              ></span>
              <input type="text"
              name="name"
              class="form-control @error('name') is-invalid @enderror"
              id="Name"
              placeholder="Account Name"
              value="{{old('name', isset($adminUser->name) ? $adminUser->name:'')}}"
              required />
            </div>
          </div>
          
          <div class="mb-3">
            <label class="form-label" for="Email">Email</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
              <input type="email"
              name="email"
              class="form-control @error('email') is-invalid @enderror"
              id="Email"
              placeholder="Email"
              value="{{old('email', isset($adminUser->email) ? $adminUser->email:'')}}"
              required />
              
              {{-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span> --}}
            </div>
            
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-md-7">
                <label for="Image" class="form-label">Profile Image</label>
                <input type="file"
                name="image"
                accept="image/*"
                id="Image"
                class="form-control mb-4 @error('image') is-invalid @enderror" />
              </div>

              <div class="col-md-5">
                <img src="{{  isset($adminUser->image) ? config("app.url").Storage::url($adminUser->image) : asset('adminAssets/img/default-image.png') }}"
                id="SelectedImg"
                class="w-px-100 h-px-100 rounded-circle"
                title="Profile Image"
                alt="profile_image"
                style="object-fit: cover;">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a class="btn btn-danger" href="{{ route('adminHome') }}">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>



@include('admin.common.scripts')

@endsection