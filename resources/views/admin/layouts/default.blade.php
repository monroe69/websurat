<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body data-layout-mode="light" data-topbar="light" data-sidebar="light">
    <div id="layout-wrapper">
        @include('admin.layouts.top_bar')

        <!-- ========== Left Sidebar Start ========== -->
        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.side_bar')
        <!-- Left Sidebar End -->

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18 text-capitalize">@yield('title')</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        @yield('title-right')
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        @yield('content')
                    </div><!-- end row-->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('admin.layouts.footer')
        </div>
    </div>

    @include('layouts.scripts')
</body>

</html>
