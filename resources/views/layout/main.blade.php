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

</head>

<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
<!-- Loader -->
<div id="site-loader" class="load-complete">
    <div class="loader">
        <div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
    </div>
</div><!-- Loader /- -->

<!-- Header Section -->
<header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s7">
    <!-- SidePanel -->
    <div id="slidepanel-1" class="slidepanel">
        <!-- Top Header -->
        <div class="container-fluid no-right-padding no-left-padding top-header">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <ul class="top-social">
                            <li><a href="#" title="Facebook"><i class="ion-social-facebook-outline"></i></a></li>
                            {{--<li><a href="#" title="Twitter"><i class="ion-social-twitter-outline"></i></a></li>--}}
                            {{--<li><a href="#" title="Instagram"><i class="ion-social-instagram-outline"></i></a></li>--}}
                        </ul>
                    </div>
                    <div class="col-lg-4 logo-block">
                        <a href="index.html" title="Logo">{{ env('APP_NAME') }}</a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <ul class="top-right user-info">
                            <li><a href="#search-box" data-toggle="collapse" class="search collapsed" title="Search"><i class="pe-7s-search sr-ic-open"></i><i class="pe-7s-close sr-ic-close"></i></a></li>
                            {{--<li class="dropdown">--}}
                                {{--<a class="dropdown-toggle" href="#"><i class="pe-7s-user"></i></a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a class="dropdown-item" href="#" title="Sign In">Sign In</a></li>--}}
                                    {{--<li><a class="dropdown-item" href="#" title="Subscribe">Subscribe </a></li>--}}
                                    {{--<li><a class="dropdown-item" href="#" title="Log In">Log In</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            </div><!-- Container /- -->
        </div><!-- Top Header /- -->
    </div><!-- SidePanel /- -->

    <!-- Container -->
    <div class="container">
        <!-- Menu Block -->
        <div class="container-fluid no-left-padding no-right-padding menu-block">
            <nav class="navbar ownavigation navbar-expand-lg">
                <a class="navbar-brand" href="index.html">minimag</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar7" aria-controls="navbar7" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar7">
                    <ul class="navbar-nav">
                        <li><a class="nav-link " title="Home" href="{{ route('home') }}">Home</a></li>
                        <li><a class="nav-link " title="News" href="{{ route('news.index') }}">News</a></li>
                        <li><a class="nav-link " title="Activities" href="{{ route('activities.index') }}">Activities</a></li>
                        <li><a class="nav-link " title="Posts" href="{{ route('posts.index') }}">Posts</a></li>
                        <li class="dropdown">
                            <i class="ddl-switch fa fa-angle-down"></i>
                            <a class="nav-link dropdown-toggle" title="Learning" href="">Learning</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="" title="Lesson 1">Lesson 1</a></li>
                                <li><a class="dropdown-item" href="" title="Lesson 2">Lesson 2</a></li>
                                <li><a class="dropdown-item" href="" title="Lesson 3">Lesson 3</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link " title="About Us" href="{{ route('about_us') }}">About Us</a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- Menu Block /- -->
    </div><!-- Container /- -->
    <!-- Search Box -->
    <div class="search-box collapse" id="search-box">
        <div class="container">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." required>
                    <span class="input-group-btn">
							<button class="btn btn-secondary" type="submit"><i class="pe-7s-search"></i></button>
						</span>
                </div>
            </form>
        </div>
    </div><!-- Search Box /- -->
</header><!-- Header Section /- -->

@yield('content')

<!-- Footer Main -->
<footer class="container-fluid no-left-padding no-right-padding footer-main">
    <!-- Instagram -->
    <div class="container-fluid no-left-padding no-right-padding instagram-block">
        <ul class="instagram-carousel">
            <li><a href="#"><img src="http://placehold.it/319x319/aaa" alt="Instagram" /></a></li>
            <li><a href="#"><img src="http://placehold.it/319x319" alt="Instagram" /></a></li>
            <li><a href="#"><img src="http://placehold.it/319x319/aaa" alt="Instagram" /></a></li>
            <li><a href="#"><img src="http://placehold.it/319x319" alt="Instagram" /></a></li>
            <li><a href="#"><img src="http://placehold.it/319x319/aaa" alt="Instagram" /></a></li>
            <li><a href="#"><img src="http://placehold.it/319x319" alt="Instagram" /></a></li>
        </ul>
    </div><!-- Instagram /- -->
    <!-- Container -->
    <div class="container">
        <ul class="ftr-social">
            <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i>Facebook</a></li>
            <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i>twitter</a></li>
            <li><a href="#" title="Instagram"><i class="fa fa-instagram"></i>Instagram</a></li>
            <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i>Google plus</a></li>
            <li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i>pinterest</a></li>
            <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i>youtube</a></li>
        </ul>
        <div class="copyright">
            <p>Copyright @ 2017 MINIMAG</p>
        </div>
    </div><!-- Container /- -->
</footer><!-- Footer Main /- -->

<!-- JQuery v1.12.4 -->
<script src="{{ asset('minimag/js/jquery-1.12.4.min.js') }}"></script>

<!-- Library - Js -->
<script src="{{ asset('minimag/js/popper.min.js') }}"></script>
<script src="{{ asset('minimag/js/lib.js') }}"></script>

<!-- Library - Theme JS -->
<script src="{{ asset('minimag/js/functions.js') }}"></script>

</body>
</html>
