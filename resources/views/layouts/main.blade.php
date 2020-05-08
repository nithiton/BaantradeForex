<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('minimag/images/favicon.ico') }}/" />

    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('minimag/images/apple-touch-icon-114x114-precomposed.png') }}/">

    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('minimag/images/apple-touch-icon-72x72-precomposed.png') }}/">

    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('minimag/images/apple-touch-icon-57x57-precomposed.png') }}/">

    <!-- Library - Google Font Familys -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700%7cMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Library -->
    <link href="{{ asset('minimag/css/lib.css') }}" rel="stylesheet">

    <!-- Custom - Common CSS -->
    <link rel="stylesheet" href="{{ asset('minimag/css/rtl.css') }}/">
    <link rel="stylesheet" type="text/css" href="{{ asset('minimag/css/style.css') }}">

    <!--[if lt IE 9]>
    <script src="{{ asset('minimag/js/html5/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
<!-- Loader -->
<div id="site-loader" class="load-complete">
    <div class="loader">
        <div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
    </div>
</div><!-- Loader /- -->

<!-- Header Section -->
<x-Header></x-Header>
<!-- Header Section /- -->

@yield('content')

<!-- Footer Main -->
<x-Footer></x-Footer>
<!-- Footer Main /- -->

<!-- JQuery v1.12.4 -->
<script src="{{ asset('minimag/js/jquery-1.12.4.min.js') }}"></script>

<!-- Library - Js -->
<script src="{{ asset('minimag/js/popper.min.js') }}"></script>
<script src="{{ asset('minimag/js/lib.js') }}"></script>

<!-- Library - Theme JS -->
<script src="{{ asset('minimag/js/functions.js') }}"></script>
<script>
    function toggleDropdown() {
        $('#learning-dropdown-toggle').click();
    }
</script>
</body>
</html>
