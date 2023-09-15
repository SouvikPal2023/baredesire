<!DOCTYPE html>
<html lang="en">
    
@include('admin.layout.partials.main.head')

    <body>

        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Left-Sidebar -->
                    @include('admin.layout.partials.main.leftSidebar')
                <!-- / Left-Sidebar -->

                <div class="layout-page">
                <!-- Header -->
                    @include('admin.layout.partials.main.navbar')
                <!-- /Header -->
                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @include('admin.layout.partials.main.breadcrumb')

                        <!-- Page Wrapper -->
                            @yield('content')
                        <!-- /Page Wrapper -->
                        </div>
                    <!-- Footer -->
                        @include('admin.layout.partials.main.footer')
                    <!-- /Footer -->
                    </div>
                </div>
            </div>
        </div>

       

        @include('admin.common.notify')
        
        @include('admin.layout.partials.main.scripts')
    </body>
</html>