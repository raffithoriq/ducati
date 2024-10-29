<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        .btn-wide {
            width: 400px; /* Specify button width */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        
        @include('layouts.navbaradmin')

        
        <div class="content-wrapper">
            
            @yield('content')
            
        </div>

        <footer class="main-footer">
            @include('layouts.footeradmin')
        </footer>
    </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="dist/js/adminlte.js"></script>
    </body>

</html>
