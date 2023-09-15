@extends('admin.layout.adminMasterLayout')

@section('title', 'Product Sizes')

@section('content')

<div class="content-wrapper">
  {{-- @include('admin.homepageManager.testimonialSection.text.edit') --}}


  <div>
    <a href="{{ route('product-size.create') }}" class="btn btn-primary font-weight-bold mb-3">
      + Add New Size
    </a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Product Size List</h4>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST <?php echo count($sizes)?'dataTable':'';?>">
              <thead>
                <tr>
                 
                  <th>Size</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($sizes->count() > 0 )
                  @foreach($sizes as $size)
                    <tr>
                      
                      <td>
                          {{ $size->size ?? '--' }}
                      </td>
                      <td>
                          {{ $size->type ?? '--' }}
                      </td>
                      
                     
                      <td>
                         <a href="{{ route('product-size.edit', $size) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> Edit
                         </a>

                        <div class="d-inline-block">
                           <form action="{{route('product-size.destroy', $size->id)}}" 
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
                  @endforeach
                @else
                  <td colspan="3" class="text-center">No Data Listed Yet</td>
                @endif
               
              </tbody>
            </table>

           
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@include('admin.common.deleteConfirm')


@endsection