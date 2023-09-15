@extends('admin.layout.adminMasterLayout')

@section('title', 'Site Settings List')

@section('content')

<div class="content-wrapper">

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Site Settings List</h4>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Site Logo</th>
                  <th>Light Logo</th>
                  <th>Favicon</th>
                  <th>Site Name</th>
                  <th>Meta Title</th>
                  <th>Meta Keyword</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($siteSettings->count() > 0 )
                  @foreach($siteSettings as $siteSetting)
                    <tr>

                      <td class="py-1">
                        <img src="{{  (isset($siteSetting->site_logo) AND Storage::disk('local')->exists($siteSetting->site_logo)) ? config("app.url").Storage::url($siteSetting->site_logo) : asset('adminAssets/img/default-image.png') }}" alt="site_logo" class="w-px-100 rounded" />
                      </td>

                      <td class="py-1">
                        <img src="{{  (isset($siteSetting->light_logo) AND Storage::disk('local')->exists($siteSetting->light_logo)) ? config("app.url").Storage::url($siteSetting->light_logo) : asset('adminAssets/img/default-image.png') }}" alt="site_light_logo" class="w-px-100 rounded bg-dark"/>
                      </td>
                      
                      <td class="py-1">
                        <img src="{{  (isset($siteSetting->favicon) AND Storage::disk('local')->exists($siteSetting->favicon)) ? config("app.url").Storage::url($siteSetting->favicon) : asset('adminAssets/img/default-image.png') }}" alt="site_favicon" class="w-px-50 rounded-circle bg-dark"/>
                      </td>
                      <td>
                          {{ $siteSetting->site_name }}
                      </td>
                      <td>
                          {{ $siteSetting->meta_title }}
                      </td>
                      <td>
                        {{ $siteSetting->meta_keyword }}
                      </td>
                      <td>
                         <a href="{{ route('siteSetting.edit', $siteSetting) }}" class="btn btn-primary">
                           <i class='bx bx-edit-alt' ></i> Edit
                         </a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="7" class="text-center">Site Settings not available</td>
                @endif
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection