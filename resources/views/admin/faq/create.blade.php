@extends('admin.layout.adminMasterLayout')

@section('title', 'Add New FAQ')

@section('content')



<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Add a new FAQ</h5>
      </div>
      <div class="card-body">
         <form class="forms-sample" 
               action="{{route('faq.store')}}"
               method="POST" 
               autocomplete="off">

          @csrf
          @include('admin.faq.form')
        </form>
      </div>
    </div>
  </div>
</div>

@endsection