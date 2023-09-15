@extends('admin.layout.adminMasterLayout')

@section('title', "Edit Social-Link")

@section('content')


{{-- <div class="content-wrapper">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Edit <i class="feather icon-arrow-right"></i> <span class="text-primary">{{ $socialLink->name }}</span></h3>
          <hr>
          <form class="forms-sample" action="{{route('socialLink.update', $socialLink)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.socialLink.form')

          </form>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div> --}}


<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit {{ $socialLink->name }}</h5>
      </div>
      <div class="card-body">
         <form class="forms-sample" 
               action="{{route('socialLink.update', $socialLink)}}"
               method="POST" 
               autocomplete="off"
               enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.socialLink.form')

        </form>
      </div>
    </div>
  </div>
</div>

@endsection