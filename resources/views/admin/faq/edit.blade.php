@extends('admin.layout.adminMasterLayout')

@section('title', "Edit FAQ")

@section('content')



<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit {{ $faq->question }}</h5>
      </div>
      <div class="card-body">
         <form class="forms-sample" 
               action="{{route('faq.update', $faq)}}"
               method="POST" 
               autocomplete="off">
            @csrf
            @method('PATCH')

            @include('admin.faq.form')

        </form>
      </div>
    </div>
  </div>
</div>

@endsection