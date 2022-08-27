<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin | Dashboard')</title>
    @include('admin.pages.styles')
    {{-- @section('title')
    Dashboard ~ Admin Page
@endsection --}}


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('admin.pages.top_navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.pages.side_navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('admin.pages.content_header')
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.pages.footer')
    </div>
    <!-- ./wrapper -->
    @include('admin.pages.script')
    @yield('script')
</body>

</html>
