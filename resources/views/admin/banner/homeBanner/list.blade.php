@extends('admin.layout.adminMasterLayout')

@section('title', 'Home Banners List')

@section('content')



<div class="content-wrapper">
  <div>
    <a href="{{ route('homeBanner.create') }}" class="btn btn-primary font-weight-bold mb-3">+ Add New Banner</a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Home Banners List</h4>
          <hr>
        
          <div class="table-responsive  text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Banner Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($homeBanners->count() > 0 )
                  @foreach($homeBanners as $homeBanner)
                    <tr>
                      <td class="py-1">
                        <img src="{{  isset($homeBanner->image) ? config("app.url").Storage::url($homeBanner->image) : asset('adminAssets/img/default-image.png') }}" alt="banner_image" class="w-px-50 h-px-50 rounded-circle"/>
                      </td>
                      <td>
                         {!!  Str::limit($homeBanner->title, 50) !!}
                      </td>
                     
                      <td>
                         <div class="dropdown action-label">
                          <a class="btn dropdown-toggle btn-sm text-white @if(isset($homeBanner->status) && ($homeBanner->status=='active')) btn-primary @else btn-danger @endif" data-bs-toggle="dropdown" aria-expanded="false">

                            <?=(isset($homeBanner->status) && $homeBanner->status=='active')?'<i class="fa fa-dot-circle-o text-success"></i> Active':'<i class="fa fa-dot-circle-o text-danger"></i> Inactive';?>

                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                              <form action="{{route('homeBanner.status', $homeBanner->id)}}" 
                                  method="POST" 
                                  >
                                  @csrf
                                  @method('PATCH')
                                   <button type="submit" 
                                        class="dropdown-item status-btn btn-sm" 
                                        style="cursor: pointer;">
                                    
                                    {!! ($homeBanner->status=='active')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                                  </button>
                              </form>
                            </div>
                        </div>
                      </td>
                      

                      <td>
                         <a href="{{ route('homeBanner.edit', $homeBanner) }}" class="btn btn-info btn-sm">
                           <i class='bx bx-edit-alt' ></i> Edit
                         </a>


                          <div class="d-inline-block">
                            <form action="{{route('homeBanner.destroy', $homeBanner->id)}}" 
                              method="POST" 
                              >
                              @csrf
                              @method('DELETE')
                               <button type="submit" 
                                    class="btn btn-danger btn-sm Delete" 
                                    style="cursor: pointer;">
                                
                                <i class='bx bxs-trash' ></i> Delete
                              </button>
                            </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="5" class="text-center">No Banner Added Yet</td>
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