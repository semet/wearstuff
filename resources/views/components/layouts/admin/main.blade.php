<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    {{-- Sweet Alret --}}
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/sweetalert2/sweetalert2.min.css">
    @stack('styles')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <x-partials.admin.navbar/>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('assets/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Wearstuff</span>
            </a>

            <!-- Sidebar -->
            <x-partials.admin.sidebar/>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <x-partials.admin.breadcrumb :title="$title"/>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    {{ $slot }}

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <x-partials.admin.footer/>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    {{-- Ziggy --}}
    @routes
    <!-- jQuery -->
    <script src="{{ asset('assets/admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    {{-- Sweet Alret --}}
    <script src="{{ asset('assets/admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    {{-- Axios --}}
    <script src="{{ asset('assets') }}/js/axios/axios.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin') }}/dist/js/adminlte.min.js"></script>

    @stack('scripts')
</body>
</html>
