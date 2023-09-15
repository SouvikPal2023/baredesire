@extends('admin.layout.adminMasterLayout')

@section('title', 'Colors')

@section('content')

<div class="content-wrapper">
  {{-- @include('admin.homepageManager.testimonialSection.text.edit') --}}


  <div>
    <a href="{{ route('color.create') }}" class="btn btn-primary font-weight-bold mb-3">
      + Add New Color
    </a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Color List</h4>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST <?php echo count($colors)?'dataTable':'';?>">
              <thead>
                <tr>
                  <th>Icon</th>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($colors->count() > 0 )
                  @foreach($colors as $color)
                    <tr>
                      <td class="py-1">
                        <img src="{{  isset($color->icon) ? config("app.url").Storage::url($color->icon) : asset('adminAssets/img/default-image.png') }}" alt="color_image" class="w-px-50 h-px-50 rounded-circle"/>
                      </td>
                      <td>
                          {{ $color->name ?? '--' }}
                      </td>
                      <td>
                          {{ $color->code ?? '--' }}
                      </td>
                      
                     
                      <td>
                         <a href="{{ route('color.edit', $color) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> Edit
                         </a>

                        <div class="d-inline-block">
                           <form action="{{route('color.destroy', $color->id)}}" 
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
                  <td colspan="4" class="text-center">No color(s) Listed Yet</td>
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