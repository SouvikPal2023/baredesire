@extends('admin.layout.adminMasterLayout')

@section('title', "View Order")

@section('content')



<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">View-{{ $order->order_number  }}</h5>
      </div>
      <div id="output"></div>
      <div class="card-body">
         <form class="forms-sample"
               action="{{route('order.update', $order)}}"
               method="POST"
               autocomplete="off"
               enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @include('admin.order.form')

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
