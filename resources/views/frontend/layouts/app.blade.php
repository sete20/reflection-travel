<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Of Site -->
    <title>Reflections Travel</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Fav and Touch Icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('/') }}/theme/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('/') }}/theme/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('/') }}/theme/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ url('/') }}/theme/images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="{{ url('/favicon.ico') }}">

    <!-- Font face -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="{{ url('/') }}/frontend/font-faces/metropolis/metropolis.css" rel="stylesheet">

    <!-- CSS Plugins -->
    <link href="{{ url('/') }}/frontend/css/font-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/frontend/bootstrap/css/bootstrap.min.css" media="screen">
    <link href="{{ url('/') }}/frontend/css/main.css" rel="stylesheet">
    <link href="{{ url('/') }}/frontend/css/plugin.css" rel="stylesheet">

    <!-- CSS Libs -->
    <link href="{{ url('/') }}/frontend/libs/loading-bars/bars.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link href="{{ url('/') }}/frontend/css/style.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link href="{{ url('/') }}/frontend/css/custom.css" rel="stylesheet">

@stack('stylesheets')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'url' => url('/'),
            'fullUrl' => Request::fullUrl(),
        ]); ?>;
    </script>
</head>
<body class="with-waypoint-sticky">

<!-- start Body Inner -->
<div class="body-inner">

    <!-- start Header -->
@include('frontend.layouts.header')
<!-- start Header -->

    <!-- start Main Wrapper -->
@yield('content')
<!-- end Main Wrapper -->

    <!-- start Footer Wrapper -->
@include('frontend.layouts.footer')
<!-- start Footer Wrapper -->

</div>
<!-- end Body Inner -->

<!-- start Login modal -->
@include('frontend.layouts.login-modal')
<!-- end Login modal -->

<!-- start Back To Top -->
<a id="back-to-top" href="#" class="back-to-top" role="button" title="Click to return to top" data-toggle="tooltip" data-placement="left"><i class="elegent-icon-arrow_carrot-up"></i></a>
<!-- end Back To Top -->

<!-- JS -->
<script type="text/javascript" src="{{ url('/') }}/frontend/js/jquery-2.2.4.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});
    });
</script>
<script type="text/javascript" src="{{ url('/') }}/frontend/js/plugins.js"></script>
<script type="text/javascript" src="{{ url('/') }}/frontend/js/custom-core.js"></script>

<!-- Libs JS -->
<script type="text/javascript" src="{{ url('/') }}/frontend/libs/loading-bars/bars.js"></script>
<script type="text/javascript" src="{{ url('/') }}/frontend/libs/bs-widgets/bsWidgets.js"></script>
<script type="text/javascript" src="{{ url('/') }}/frontend/libs/sweetalert2@9.js"></script>

@stack('scripts')

</body>
</html>
