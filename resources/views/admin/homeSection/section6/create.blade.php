@extends('admin.layout.adminMasterLayout')

@section('title', 'Create New')

@section('content')



<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Create New Testimonial</h5>
      </div>
      <div class="card-body">
         <form class="forms-sample" 
               action="{{route('homeSection6.store')}}"
               method="POST" 
               autocomplete="off"
               enctype="multipart/form-data">

          @csrf
          @include('admin.homeSection.section6.form')
        </form>
      </div>
    </div>
  </div>
</div>


@endsection