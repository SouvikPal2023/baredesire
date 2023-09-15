@extends('admin.layout.adminMasterLayout')

@section('title', 'Order List')

@section('content')

<div class="content-wrapper">



  <!-- <div>
    <a href="{{ route('order.create') }}" class="btn btn-primary font-weight-bold mb-3">+ Add New order</a>
  </div> -->

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Order List</h3>
          <hr>

          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST <?php echo count($orders)?'dataTable':'';?>">
              <thead>
                <tr>
                
                  <th>Order Number</th>
                  <th>Customer Name</th>
                  <th>Total price</th>
                  <th>Payment method</th>
                  <th>Payment Status</th>
                  <th>Order Status</th>
                  <th>Created On</th>
                  <th>Cancelled On</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                  @forelse($orders as $order)

                    <tr data-index="{{ $order->id }}" >

                      <td>
                        {{  $order->order_number  }}
                      </td>
                      <td>
                        {{  $order->user->name }}
                      </td>
                      <td>
                      {{  $order->total_price }}
                           </td>
                           <td>
                      {{  Str::upper($order->payment_method)  }}
                           </td>
                      <td>
                      <div class="d-inline-block">
                                            <form action="{{route('order.payment')}}" method="POST">
                                                @csrf


                                                {{-- <label for="status"> Payment Status:</label> --}}

                                                <select class="form-control status__ids" name="status" id="status"
                                                    data-id="{{ $order->id }}">
                                                    <option value="pending" {{isset($order->payment_status) &&
                                                        $order->payment_status == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="confirmed" {{isset($order->payment_status) &&
                                                        $order->payment_status == 'confirmed' ? 'selected' : '' }}>
                                                        Confirmed</option>
                                                    <option value="cancelled" {{isset($order->payment_status) &&
                                                        $order->payment_status == 'cancelled' ? 'selected' : '' }}>
                                                        Cancelled</option>

                                                </select>
                                                {{-- <button type="submit" class=" btn btn-success btn-sm ml-3"><i
                                                        class='fa fa-dot-circle-o text-primary'></i> Change


                                                </button> --}}
                                            </form>
                                        </div>
                      </td>


                      <td>
                      <div class="d-inline-block">
                                            <form action="{{route('order.status')}}" method="POST">
                                                @csrf


                                                {{-- <label for="status"> Payment Status:</label> --}}

                                                <select class="form-control status__idss" name="statuss" id="statuss"
                                                    data-id="{{ $order->id }}">
                                                    <option value="order_placed" {{isset($order->status) &&
                                                        $order->status == 'order_placed' ? 'selected' : '' }}>
                                                        Order Placed</option>
                                                    <option value="in_transit" {{isset($order->status) &&
                                                        $order->status == 'in_transit' ? 'selected' : '' }}>
                                                        In Transit</option>
                                                    <option value="cancelled" {{isset($order->status) &&
                                                        $order->status == 'cancelled' ? 'selected' : '' }}>
                                                        Cancelled</option>
                                                        <option value="completed" {{isset($order->status) &&
                                                        $order->status == 'completed' ? 'selected' : '' }}>
                                                        Completed</option>

                                                </select>
                                                {{-- <button type="submit" class=" btn btn-success btn-sm ml-3"><i
                                                        class='fa fa-dot-circle-o text-primary'></i> Change


                                                </button> --}}
                                            </form>
                                        </div>
                      </td>

                      <td>
                                      {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}
                                  </td>
                                  <td>
                                      {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d/m/Y') ?? '--'}}
                                  </td>
                      <td>
                        <a href="{{ route('order.edit', $order) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> View
                        </a>

                        <div class="d-inline-block">
                           <form action="{{route('order.destroy', $order->id)}}"
                              method="POST"
                              >
                              @csrf
                              @method('DELETE')
                               <button type="submit"
                                    class="btn btn-danger btn-sm Delete"
                                    style="cursor: pointer;">

                                <i class='bx bxs-trash'></i> Delete
                              </button>
                          </form>
                          </div>
                      </td>
                    </tr>
                 @empty
                  <td colspan="6" class="text-center">Nothing is Listed Yet</td>
                @endforelse

              </tbody>
            </table>

           
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    $(document).ready(function () {
            $('.status__ids').on('change', function () {
                var status = $(this).val();
               // alert("status")
                var id = $(this).data('id');
                var url='{{route('order.payment')}}';
                //$("#state-dd").html('');
                console.log(status)
                console.log(id)
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    url: url,

                    type: "POST",
                    data: {
                        status: status,
                        id:id
                    },

                    success: function (data) {
                        console.log(data)
                        if (data.status == 200) {

                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position:'topCenter'
                        })
                    }else{
                        iziToast.error({
                            title: 'Error',
                            message: data.message,
                            position:'topCenter'
                        });
                    }
                    }
               });
            });


            $('.status__idss').on('change', function () {
                var status = $(this).val();
                
                var id = $(this).data('id');
                var url='{{route('order.status')}}';
                //$("#state-dd").html('');
                console.log(status)
                console.log(id)
                $.ajax({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    url: url,

                    type: "POST",
                    data: {
                        status: status,
                        id:id
                    },

                    success: function (data) {
                        console.log(data)
                        if (data.status == 200) {

                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position:'topCenter'
                        })
                    }else{
                        iziToast.error({
                            title: 'Error',
                            message: data.message,
                            position:'topCenter'
                        });
                    }
                    }
               });
            });
          });
          </script>

@include('admin.common.deleteConfirm')


@endsection
