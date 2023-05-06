<head>
    <meta charset="utf-8" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Portofolio Smart'SpartacuS'" name="description" />
    <meta content="SmartSpartacuS" name="author" />
    <title>Halaman @yield('title-page')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/auth-bg.jpg') }}">
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @yield('css')
</head>
