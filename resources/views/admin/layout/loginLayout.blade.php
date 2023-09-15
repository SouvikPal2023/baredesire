<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide">
    
    @include('admin.layout.partials.login.head')
    <body>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Page Wrapper -->
                    @yield('content')
                    <!-- /Page Wrapper -->
                </div>
            </div>
        </div>
        <!-- /Main Wrapper -->
        
        @include('admin.common.notify')
        @include('admin.layout.partials.login.scripts')
    </body>
</html>