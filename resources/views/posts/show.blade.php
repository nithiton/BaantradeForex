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
                                <div class="entry-cover">
                                    <img src="{{ isset($post->cover_image) ? asset($post->cover_image) : 'http://placehold.it/770x513' }}" alt="Post"  style="width: 770px;height: 513px;object-fit: contain;"/>
                                </div>
                                <div class="entry-content w-100">
                                    <div class="entry-header">
                                        <span class="post-category"><a href="#" title="Posts">Posts</a></span>
                                        <h3 class="entry-title">{{ $post->title }}</h3>
                                        <div class="post-meta">
                                            <span class="byline">by <a href="#" title="{{ $post->author }}">{{ $post->author }}</a></span>
                                            <span class="post-date">{{ date('F j,Y',strtotime($post->created_at)) }}</span>
                                        </div>
                                    </div>
                                    {!! $post->content !!}
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
