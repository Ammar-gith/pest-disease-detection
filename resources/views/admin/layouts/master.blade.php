@include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <div class="spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Navbar -->
        @include('admin.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) and main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- footer -->
        @include('admin.layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.layouts.script')

</body>

</html>
