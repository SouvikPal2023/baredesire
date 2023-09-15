@extends('admin.layout.adminMasterLayout')

@section('title', 'Add Social Link')

@section('content')


{{-- <div class="content-wrapper">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add a Social Link</h4>
          <hr>
         
          <form class="forms-sample" action="{{route('socialLink.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf

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
        <h5 class="mb-0">Add a Social Link</h5>
      </div>
      <div class="card-body">
         <form class="forms-sample" 
               action="{{route('socialLink.store')}}"
               method="POST" 
               autocomplete="off"
               enctype="multipart/form-data">

          @csrf
          @include('admin.socialLink.form')

        </form>
      </div>
    </div>
  </div>
</div>


@endsection