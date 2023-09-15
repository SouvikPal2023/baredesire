@extends('admin.layout.adminMasterLayout')

@section('title', 'Product Category List')

@section('content')

<div class="content-wrapper">

  {{-- @include('admin.homepageManager.faq.text.edit') --}}

  <div>
    <a href="{{ route('product-category.create') }}" class="btn btn-primary font-weight-bold mb-3">+ Add New Category</a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Product Categories</h3>
          <hr>

          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST <?php echo count($categories)?'dataTable':'';?>">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Sub Parent Category</th>
                  <th>Parent Category</th>
                  <th>Category Level</th>
                  <th>Status</th>
                  <th>Created On</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                  @forelse($categories as $category)

                    <tr data-index="{{ $category->id }}" >
                       

                      <td>
                        {{  $category->name }}
                      </td>
                      <td>
                        {{  $category->parent->name??'--' }}
                      </td>
                      <td>
                        {{  $category->parent->parent->name ??'--' }}
                      </td>

                      <td>
                                  
                                  @if($category->level==0)
                                       {{"Main Category"}}
                                       @elseif($category->level==1)
                                       {{"Sub Category"}}
                                       @else {{"Sub SubCategory"}}
                                       @endif
                                </td>


                                <td>
                         <div class="dropdown action-label">
                          <a class="btn @if(isset($category->status) && ($category->status=='1')) btn-primary @else btn-danger @endif  dropdown-toggle btn-sm text-white" data-bs-toggle="dropdown" aria-expanded="false">

                            <?=(isset($category->status) && $category->status=='1')?'<i class="fa fa-dot-circle-o text-success"></i> Active':'<i class="fa fa-dot-circle-o text-danger"></i> Inactive';?>

                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                              <form action="{{route('category.status', $category->id)}}"
                                  method="POST"
                                  >
                                  @csrf
                                  @method('PUT')
                                   <button type="submit"
                                        class="dropdown-item status-btn btn-sm"
                                        style="cursor: pointer;">

                                    {!! ($category->status=='1')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                                  </button>
                              </form>
                            </div>
                        </div>
                      </td>

                                <td>
                                      {{ \Carbon\Carbon::parse($category->created_at)->format('d/m/Y')}}
                                  </td>


                      <td>
                        <a href="{{ route('product-category.edit', $category) }}" class="btn btn-info btn-sm">
                          <i class='bx bx-edit-alt' ></i> Edit
                        </a>

                        <div class="d-inline-block">
                           <form action="{{route('product-category.destroy', $category->id)}}"
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
                  <td colspan="4" class="text-center">Nothing is Listed Yet</td>
                @endforelse

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
