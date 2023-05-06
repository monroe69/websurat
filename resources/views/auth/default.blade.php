<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body data-layout-mode="light" data-topbar="light" data-sidebar="light">
    <div class="auth-page ">
        <div class="container-fluid p-0">
            <div class="row g-0">
                @yield('content')
                <!-- end col -->
                @include('auth.buble')
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>

    @include('layouts.scripts')
    <script src="{{ asset('assets/js/pages/pass-addon.init.js') }}"></script>
</body>

</html>
