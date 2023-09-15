@extends('admin.layout.adminMasterLayout')

@section('title', 'FAQ List')

@section('content')

<div class="content-wrapper">

  {{-- @include('admin.homepageManager.faq.text.edit') --}}

  <div>
    <a href="{{ route('faq.create') }}" class="btn btn-primary font-weight-bold mb-3">+ Add New FAQ</a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">FAQ List</h3>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST">
              <thead>
                <tr>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                  @forelse($faqs as $faq)

                    <tr data-index="{{ $faq->id }}" data-position="{{ $faq->position }}">
                      <td>
                        {{ $faq->question }}
                      </td>

                      <td>
                        {!!  Str::limit($faq->answer, 400) !!}
                      </td>

                      <td>
                         <div class="dropdown action-label">
                          <a class="btn @if(isset($faq->status) && ($faq->status=='active')) btn-primary @else btn-danger @endif  dropdown-toggle btn-sm text-white" data-bs-toggle="dropdown" aria-expanded="false">

                            <?=(isset($faq->status) && $faq->status=='active')?'<i class="fa fa-dot-circle-o text-success"></i> Active':'<i class="fa fa-dot-circle-o text-danger"></i> Inactive';?>

                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                              <form action="{{route('faq.status', $faq->id)}}" 
                                  method="POST" 
                                  >
                                  @csrf
                                  @method('PATCH')
                                   <button type="submit" 
                                        class="dropdown-item status-btn btn-sm" 
                                        style="cursor: pointer;">
                                    
                                    {!! ($faq->status=='active')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                                  </button>
                              </form>
                            </div>
                        </div>
                      </td>

                     
                      <td>
                        <a href="{{ route('faq.edit', $faq) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> Edit
                        </a>

                        <div class="d-inline-block">
                           <form action="{{route('faq.destroy', $faq->id)}}" 
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
                  <td colspan="4" class="text-center">No FAQ(s) Listed Yet</td>
                @endforelse
               
              </tbody>
            </table>

            <div class="mt-5">
              {{ $faqs->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>






{{-- <script type="text/javascript" src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
<script>
  $( function() {
    $('table.FAQ_LIST tbody').sortable({
      update: function(event,ui) {
        $(this).children().each( function(index){
          //console.log(index);
          if($(this).attr('data-position') !== (index+1)){
            $(this).attr('data-position', (index+1)).addClass('updated');
          } 
        });

        saveNewPositions();
      }
    });

    function saveNewPositions() {
      var positions = [];
      $('.updated').each(function() {
          positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
          $(this).removeClass('updated');  
      });
      //console.log(positions);

      $.ajax({
        url: "{{route('changeFaqPositions')}}",
        method: "POST",
        dataType: "text",
        data: {
          update:1,
          positions: positions,
          "_token": "{{ csrf_token() }}"
        },
        success:function(response){
          let decode = JSON.parse(response);

          if(decode.status =="success"){
            return new swal({
               title: "Success",
               text:decode.message,
               icon:"success",
               timer: 2000,
            });
          }
          else {
            return new swal({
               title: "Error",
               text:decode.message,
               icon:"error",
               timer: 2000,
            });
          }
        }
      });

    }

  });
</script> --}}





@include('admin.common.deleteConfirm')


@endsection