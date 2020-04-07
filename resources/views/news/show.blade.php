@extends('layout.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content blog-single">
                <!-- Container -->
                <div class="container">
                    <div class="row">
                        <!-- Content Area -->
                        <div class="col-xl-8 col-lg-8 col-md-6 col-12 content-area">
                            <article class="type-post">
                                <div class="entry-cover">
                                    <img src="http://placehold.it/770x513" alt="Post" />
                                </div>
                                <div class="entry-content">
                                    <div class="entry-header">
                                        <span class="post-category"><a href="#" title="{{ $new->category }}">{{ $new->category }}</a></span>
                                        <h3 class="entry-title">{{ $new->title }}</h3>
                                        <div class="post-meta">
                                            <span class="byline">by <a href="#" title="Indesign">inDesign</a></span>
                                            <span class="post-date">{{ date('F j,Y',strtotime($new->created_at)) }}</span>
                                        </div>
                                    </div>
                                    {{ $new->content }}
                                </div>
                            </article>
                        </div><!-- Content Area /- -->

                        <!-- Widget Area -->
                        <div class="col-lg-4 col-md-6 col-12 widget-area">
                            <!-- Widget : Latest Post -->
                            <aside class="widget widget_latestposts">
                                <h3 class="widget-title">Popular Posts</h3>
                                <div class="latest-content">
                                    <a href="#" title="Recent Posts"><i><img src="http://placehold.it/100x80" class="wp-post-image" alt="blog-1" /></i></a>
                                    <h5><a title="Beautiful Landscape View of Rio de Janeiro" href="#">Beautiful Landscape View of Rio de Janeiro</a></h5>
                                    <span><a href="#">march 14, 2017</a></span>
                                </div>
                                <div class="latest-content">
                                    <a href="#" title="Recent Posts"><i><img src="http://placehold.it/100x80" class="wp-post-image" alt="blog-1" /></i></a>
                                    <h5><a title="Enjoy Your Holiday with Adventures" href="#">Enjoy Your Holiday with Adventures</a></h5>
                                    <span><a href="#">march 15, 2017</a></span>
                                </div>
                                <div class="latest-content">
                                    <a href="#" title="Recent Posts"><i><img src="http://placehold.it/100x80" class="wp-post-image" alt="blog-1" /></i></a>
                                    <h5><a title="Best Photography Experience Shooting" href="#">Best Photography Experience Shooting</a></h5>
                                    <span><a href="#">march 15, 2017</a></span>
                                </div>
                                <div class="latest-content">
                                    <a href="#" title="Recent Posts"><i><img src="http://placehold.it/100x80" class="wp-post-image" alt="blog-1" /></i></a>
                                    <h5><a title="How to Forecast Your Retirement Savings" href="#">How to Forecast Your Retirement Savings</a></h5>
                                    <span><a href="#">march 16, 2017</a></span>
                                </div>
                            </aside><!-- Widget : Latest Post /- -->
                            <!-- Widget : Aboutme -->
                            <aside class="widget widget_aboutme">
                                <h3 class="widget-title">About Me</h3>
                                <div class="about-info">
                                    <img src="http://placehold.it/345x230" alt="widget"/>
                                    <p>On the other hand, we denounce with righteous indignation
                                        and dislike men who are  beguiledand demoralized charms.</p>
                                    <a href="#" title="READ MORE">READ MORE</a>
                                </div>
                            </aside><!-- Widget : Aboutme /- -->
                            <!-- Widget : Categories -->
                            <aside class="widget widget_categories text-center">
                                <h3 class="widget-title">Categories</h3>
                                <ul>
                                    <li><a href="#" title="Nature">Nature</a></li>
                                    <li><a href="#" title="Technology">Technology</a></li>
                                    <li><a href="#" title="Travel">Travel</a></li>
                                    <li><a href="#" title="Sport">Sport</a></li>
                                    <li><a href="#" title="Lifestyle">Lifestyle</a></li>
                                </ul>
                            </aside><!-- Widget : Categories /- -->
                            <!-- Widget : Instagram -->
                            <aside class="widget widget_instagram">
                                <h3 class="widget-title">Instagram</h3>
                                <ul>
                                    <li><a href="#"><img src="http://placehold.it/111x111" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="http://placehold.it/111x111" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="http://placehold.it/111x111" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="http://placehold.it/111x111" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="http://placehold.it/111x111" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="http://placehold.it/111x111" alt="Instagram" /></a></li>
                                </ul>
                            </aside><!-- Widget : Instagram /- -->
                            <!-- Widget : Follow Us -->
                            <aside class="widget widget_social">
                                <h3 class="widget-title">FOLLOW US</h3>
                                <ul>
                                    <li><a href="#" title=""><i class="ion-social-facebook-outline"></i></a></li>
                                    <li><a href="#" title=""><i class="ion-social-twitter-outline"></i></a></li>
                                    <li><a href="#" title=""><i class="ion-social-instagram-outline"></i></a></li>
                                    <li><a href="#" title=""><i class="ion-social-googleplus-outline"></i></a></li>
                                    <li><a href="#" title=""><i class="ion-social-pinterest-outline"></i></a></li>
                                    <li><a href="#" title=""><i class="ion-social-vimeo-outline"></i></a></li>
                                </ul>
                            </aside><!-- Widget : Follow Us /- -->
                            <!-- Widget : Newsletter -->
                            <aside class="widget widget_newsletter">
                                <h3 class="widget-title">Newsletter</h3>
                                <div class="newsletter-box">
                                    <i class="ion-ios-email-outline"></i>
                                    <h4>Sign Up for Newsletter</h4>
                                    <p>Sign up to receive latest posts and news </p>
                                    <form>
                                        <input type="text" class="form-control" placeholder="Your email address" />
                                        <input type="submit" value="Subscribe Now" />
                                    </form>
                                </div>
                            </aside><!-- Widget : Newsletter /- -->
                            <!-- Widget : Tags -->
                            <aside class="widget widget_tags_cloud">
                                <h3 class="widget-title">Tags</h3>
                                <div class="tagcloud">
                                    <a href="#" title="Fashion">Fashion</a>
                                    <a href="#" title="Travel">Travel</a>
                                    <a href="#" title="Nature">Nature</a>
                                    <a href="#" title="Technology">Technology</a>
                                    <a href="#" title="Sport">Sport</a>
                                    <a href="#" title="Weather">Weather</a>
                                    <a href="#" title="Trends">Trends</a>
                                    <a href="#" title="Lifestyle">Lifestyle</a>
                                    <a href="#" title="Gear">Gear</a>
                                </div>
                            </aside><!-- Widget : Tags /- -->
                            <!-- Widget : Categories -->
                            <aside class="widget widget_categories2">
                                <h3 class="widget-title">Categories</h3>
                                <div class="categories-box">
                                    <ul>
                                        <li>
                                            <a href="#" title="Nature">
                                                <img src="http://placehold.it/345x80" alt="categories-img"/>
                                                <span>Nature</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Nature">
                                                <img src="http://placehold.it/345x80" alt="categories-img"/>
                                                <span>SPORT</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Nature">
                                                <img src="http://placehold.it/345x80" alt="categories-img"/>
                                                <span>TRAVEL</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Nature">
                                                <img src="http://placehold.it/345x80" alt="categories-img"/>
                                                <span>TECHNOLOGY</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </aside><!-- Widget : Categories /- -->
                            <!-- Widget : Tranding Post -->
                            <aside class="widget widget_tranding_post">
                                <h3 class="widget-title">TRENDING Posts</h3>
                                <div id="trending-widget" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="trnd-post-box">
                                                <div class="post-cover"><a href="#"><img src="http://placehold.it/345x230" alt="Tranding Post" /></a></div>
                                                <span class="post-category"><a href="#" title="Lifestyle">Lifestyle</a></span>
                                                <h3 class="post-title"><a href="#">New Fashion Collection Show This Weekend in Boston </a></h3>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="trnd-post-box">
                                                <div class="post-cover"><a href="#"><img src="http://placehold.it/345x230" alt="Tranding Post" /></a></div>
                                                <span class="post-category"><a href="#" title="Lifestyle">Lifestyle</a></span>
                                                <h3 class="post-title"><a href="#">New Fashion Collection Show This Weekend in Boston </a></h3>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="trnd-post-box">
                                                <div class="post-cover"><a href="#"><img src="http://placehold.it/345x230" alt="Tranding Post" /></a></div>
                                                <span class="post-category"><a href="#" title="Lifestyle">Lifestyle</a></span>
                                                <h3 class="post-title"><a href="#">New Fashion Collection Show This Weekend in Boston </a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-target="#trending-widget" data-slide-to="0" class="active"></li>
                                        <li data-target="#trending-widget" data-slide-to="1"></li>
                                        <li data-target="#trending-widget" data-slide-to="2"></li>
                                    </ol>
                                </div>
                            </aside><!-- Widget : Tranding Post /- -->
                            <!-- Widget : Advertise -->
                            <aside class="widget widget_advertise">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid" src="http://placehold.it/345x308" alt="slide">
                                            <div class="carousel-caption">
                                                <h3>Advertiser</h3>
                                                <p>New Furniture</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid" src="http://placehold.it/345x308" alt="slide">
                                            <div class="carousel-caption">
                                                <h3>Advertiser</h3>
                                                <p>New Furniture</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid" src="http://placehold.it/345x308" alt="slide">
                                            <div class="carousel-caption">
                                                <h3>Advertiser</h3>
                                                <p>New Furniture</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid" src="http://placehold.it/345x308" alt="slide">
                                            <div class="carousel-caption">
                                                <h3>Advertiser</h3>
                                                <p>New Furniture</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside><!-- Widget : Advertise /- -->
                        </div><!-- Widget Area /- -->
                    </div>
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
