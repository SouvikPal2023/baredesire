@extends('admin.layout.adminMasterLayout')

@section('title', 'Testimonials')

@section('content')

<div class="content-wrapper">
  {{-- @include('admin.homepageManager.testimonialSection.text.edit') --}}


  <div>
    <a href="{{ route('testimonial.create') }}" class="btn btn-primary font-weight-bold mb-3">
      + Add New Testimonial
    </a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Testimonial List</h4>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Testimonial</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($testimonials->count() > 0 )
                  @foreach($testimonials as $testimonial)
                    <tr>
                      <td class="py-1">
                        <img src="{{  isset($testimonial->image) ? config("app.url").Storage::url($testimonial->image) : asset('adminAssets/img/default-image.png') }}" alt="testimonial_image" class="w-px-50 h-px-50 rounded-circle"/>
                      </td>
                      <td>
                          {{ $testimonial->name ?? '--' }}
                      </td>
                      <td>
                          {{ $testimonial->designation ?? '--' }}
                      </td>
                      <td>
                          {!!  Str::limit($testimonial->content, 50) ?? '--' !!}
                      </td>
                      <td>
                         <div class="dropdown action-label">
                          <a class="btn @if(isset($testimonial->status) && ($testimonial->status=='active')) btn-primary @else btn-danger @endif dropdown-toggle btn-sm text-white" data-bs-toggle="dropdown" aria-expanded="false">

                            <?=(isset($testimonial->status) && $testimonial->status=='active')?'<i class="fa fa-dot-circle-o text-success"></i> Active':'<i class="fa fa-dot-circle-o text-danger"></i> Inactive';?>

                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                              <form action="{{route('testimonial.status', $testimonial->id)}}" 
                                  method="POST" 
                                  >
                                  @csrf
                                  @method('PATCH')
                                   <button type="submit" 
                                        class="dropdown-item status-btn btn-sm" 
                                        style="cursor: pointer;">
                                    
                                    {!! ($testimonial->status=='active')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                                  </button>
                              </form>
                            </div>
                        </div>
                      </td>
                      <td>
                         <a href="{{ route('testimonial.edit', $testimonial) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> Edit
                         </a>

                        <div class="d-inline-block">
                           <form action="{{route('testimonial.destroy', $testimonial->id)}}" 
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
                  <td colspan="7" class="text-center">No Testimonial(s) Listed Yet</td>
                @endif
               
              </tbody>
            </table>

            <div class="mt-5">
              {{ $testimonials->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@include('admin.common.deleteConfirm')


@endsection