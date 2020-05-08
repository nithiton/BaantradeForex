<header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s7">
    <!-- SidePanel -->
    <div id="slidepanel-1" class="slidepanel">
        <!-- Top Header -->
        <div class="container-fluid no-right-padding no-left-padding top-header">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <ul class="top-social">
                            <li><a href="#" title="Facebook"><i class="ion-social-facebook-outline"></i></a></li>
                            {{--<li><a href="#" title="Twitter"><i class="ion-social-twitter-outline"></i></a></li>--}}
                            {{--<li><a href="#" title="Instagram"><i class="ion-social-instagram-outline"></i></a></li>--}}
                        </ul>
                    </div>
                    <div class="col-lg-6 logo-block">
                        <a href="{{ route('home') }}" title="Logo">{{ env('APP_NAME') }}</a>
                    </div>
                    <div class="col-lg-3 col-6">
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
                <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
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
                            <i class="ddl-switch fa fa-angle-down" id="learning-dropdown-toggle"></i>
                            <a class="nav-link dropdown-toggle" onclick="toggleDropdown()" title="Learning" href="#">Learning</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('theaters.index') }}" title="Theaters">Theaters</a></li>
                                <li><a class="dropdown-item" href="{{ route('lessons.index') }}" title="Lessons">Lessons</a></li>
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
</header>
