<!DOCTYPE html>

<html lang="en">

<head>
    @include('layouts.partials._head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials._navbar')

        <!-- Main Sidebar Container -->
        @include('layouts.partials._sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="app">
            @include('flash::message')
            <!-- Content Header (Page header) -->
            @yield('content')
        </div>
        <!-- Main Footer -->
        @include('layouts.partials._footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('layouts.partials._footer-script')
</body>

</html>
