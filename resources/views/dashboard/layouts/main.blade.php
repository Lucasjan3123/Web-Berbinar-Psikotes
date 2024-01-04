<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Berbinar Psikotes - Dashboard</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
        <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/styles.min.css') }}" />
    </head>

    <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('dashboard.layouts.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
        
            @include('dashboard.layouts.header')

            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/dashboard/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/js/dashboard.js') }}"></script>
    </body>
</html>