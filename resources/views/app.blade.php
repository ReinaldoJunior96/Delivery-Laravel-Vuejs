<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template-css/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template-css/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template-css/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template-css/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template-css/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Inertia VueJS -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>
<div class="wrapper">
    @inertia
</div>
<!-- jQuery -->
<script src="{{ asset('template-css/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template-css/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('template-css/dist/js/adminlte.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('template-css/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template-css/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template-css/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('template-css/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template-css/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('template-css/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
