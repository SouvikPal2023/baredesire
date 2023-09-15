@extends('admin.layout.adminMasterLayout')

@section('title', 'Social Links List')

@section('content')

<div class="content-wrapper">
  <div>
    <a href="{{ route('socialLink.create') }}" class="btn btn-primary font-weight-bold mb-3">+ Add New Social Link</a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Social Links List</h4>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($socialLinks->count() > 0 )
                  @foreach($socialLinks as $socialLink)
                    <tr>
                      <td class="py-1">
                        <img src="{{  isset($socialLink->logo) ? config("app.url").Storage::url($socialLink->logo) : asset('adminAssets/img/default-image.png') }}" alt="social_logo" class="w-px-50 h-px-50 rounded-circle bg-dark"/>
                      </td>
                      <td>
                        <a href="{{ $socialLink->link }}" target="_blank">
                          {{ $socialLink->name }}
                        </a>
                      </td>
                    
                      <td>
                         <div class="dropdown action-label">
                          <a class="btn @if(isset($socialLink->status) && ($socialLink->status=='active')) btn-primary @else btn-danger @endif dropdown-toggle btn-sm text-white" data-bs-toggle="dropdown" aria-expanded="false">

                            <?=(isset($socialLink->status) && $socialLink->status=='active')?'<i class="fa fa-dot-circle-o text-success"></i> Active':'<i class="fa fa-dot-circle-o text-danger"></i> Inactive';?>

                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                              <form action="{{route('socialLink.status', $socialLink->id)}}" 
                                  method="POST" 
                                  >
                                  @csrf
                                  @method('PATCH')
                                   <button type="submit" 
                                        class="dropdown-item status-btn btn-sm" 
                                        style="cursor: pointer;">
                                    
                                    {!! ($socialLink->status=='active')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                                  </button>
                              </form>
                            </div>
                        </div>
                      </td>
                      <td>
                         <a href="{{ route('socialLink.edit', $socialLink) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> Edit
                         </a>

                          <div class="d-inline-block">
                           <form action="{{route('socialLink.destroy', $socialLink->id)}}" 
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
                  <td colspan="5" class="text-center">No Social Links Listed Yet</td>
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