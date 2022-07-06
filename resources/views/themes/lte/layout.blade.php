<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Dashboard')</title>
    <link rel="shortcut icon" href={{ asset('assets/lte/dist/img/MandoMini.png') }}>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/lte/plugins/fontawesome-free-6.1.1-web/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/lte/dist/css/adminlte.min.css">
    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        {{-- @include('themes.lte.header') --}}
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('themes.lte.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('contenido')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        @include('themes.lte.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/lte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/lte/dist/js/demo.js"></script>
    @yield('scripts')
    
    <script>
        $("#modal-alert").modal("show");
        $("#modal").modal("show");
        setTimeout(function() {
            $('#modal-alert').modal("hide");
        }, 5000);
    </script>
    
</body>

</html>
