@extends('admin.layout.adminMasterLayout')

@section('title', "Edit Site Settings")

@section('content')


<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Admin Profile</h5>
      </div>
      <div class="card-body">
        <form action="{{route('siteSetting.update', $siteSetting)}}"
          method="POST"
          autocomplete="off"
          enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          @include('admin.siteSetting.form')
        </form>
      </div>
    </div>
  </div>
</div>



@endsection