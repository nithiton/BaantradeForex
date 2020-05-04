@extends('layouts.main')
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
                                <div class="entry-content w-100">
                                    <div class="entry-header">
                                        {{--<span class="post-category"><a href="#" title="News">News</a></span>--}}
                                        <h3 class="entry-title">{{ $video->title }}</h3>
                                        <div class="post-meta">
                                            {{--<span class="byline">by <a href="#" title="Indesign">inDesign</a></span>--}}
                                            <span class="post-date">{{ date('F j,Y',strtotime($video->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <p>{{ $video->short_content }}</p>
                                    <hr/>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{ $video->url }}"></iframe>
                                    </div>
                                </div>
                            </article>
                        </div><!-- Content Area /- -->
                        <!-- Widget Area -->
                        <x-WidgetAreaAds></x-WidgetAreaAds>
                        <!-- Widget Area /- -->
                    </div>
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
