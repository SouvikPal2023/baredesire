@extends('admin.layout.adminMasterLayout')

@section('title', 'Home Section 8')

@section('content')

<div class="content-wrapper">
  {{-- @include('admin.homepageManager.testimonialSection.text.edit') --}}


  <div>
    <a href="{{ route('homeSection8.create') }}" class="btn btn-primary font-weight-bold mb-3">
      + Add New Section
    </a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Home Section 8 Content</h4>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST <?php echo count($sections)?'dataTable':'';?>">
              <thead>
                <tr>
                 
                  <th>Name</th>
                
                 
                  
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($sections->count() > 0 )
                  @foreach($sections as $section)
                    <tr>
                      <td class="py-1">
                       {{"Home Section 8"}}
                     
                      <td>
                         <a href="{{ route('homeSection8.edit', $section) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> Edit
                         </a>

                        <!-- <div class="d-inline-block">
                           <form action="{{route('homeSection1.destroy', $section->id)}}" 
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
                          </div> -->
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="2" class="text-center">No Section(s) Listed Yet</td>
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