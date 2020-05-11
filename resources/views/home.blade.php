@extends('layouts.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Slider Section -->
            <x-Slider></x-Slider>
            <!-- Slider Section /- -->

            <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content blog-paralle-post">
                <!-- Container -->
                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <!-- Content Area -->
                        <div class="col-lg-8 col-md-6 content-area">
                            <!-- Row News -->
                            <div class="row">
                                <h3><a href="{{ route('news.index') }}" style="color:#000;text-decoration-line: none;">News</a><hr/></h3>
                                @forelse($news as $index => $new)
                                    @component('layouts.components.home.content')
                                        @slot('route'){{ route('news.show',[$new->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($new->cover_image) ? asset($new->cover_image) : 'http://placehold.it/330x247' }}@endslot
                                        @slot('title'){{ $new->title }}@endslot
                                        @slot('viewed'){{ $new->viewed }}@endslot
                                        @slot('content'){{ $new->short_content }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($new->created_at)) }}@endslot
                                        @slot('category'){{ 'news' }}@endslot
                                        @slot('category_route'){{ route('news.index') }}@endslot
                                    @endcomponent
                                @empty
                                    @component('layouts.components.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Row Posts-->
                            <div class="row">
                                <h3><a href="{{ route('posts.index') }}" style="color:#000;text-decoration-line: none;">Posts</a><hr/></h3>
                                @forelse($posts as $index => $post)
                                    @component('layouts.components.home.content')
                                        @slot('route'){{ route('posts.show',[$post->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($post->cover_image) ? asset($post->cover_image) : 'http://placehold.it/330x247' }}@endslot
                                        @slot('title'){{ $post->title }}@endslot
                                        @slot('viewed'){{ $post->viewed }}@endslot
                                        @slot('content'){{ $post->short_content }}@endslot
                                        @slot('author'){{ $post->author }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($post->created_at)) }}@endslot
                                        @slot('category'){{ 'post' }}@endslot
                                        @slot('category_route'){{ route('posts.index') }}@endslot
                                    @endcomponent
                                @empty
                                    @component('layouts.components.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Row Activities -->
                            <div class="row">
                                <h3><a href="{{ route('activities.index') }}" style="color:#000;text-decoration-line: none;">Activities</a><hr/></h3>
                                @forelse($activities as $index => $activity)
                                    @component('layouts.components.home.content')
                                        @slot('route'){{ route('activities.show',[$activity->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($activity->cover_image) ? asset($activity->cover_image) : 'http://placehold.it/330x247' }}@endslot
                                        @slot('title'){{ $activity->title }}@endslot
                                        @slot('viewed'){{ $activity->viewed }}@endslot
                                        @slot('content'){{ $activity->short_content }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($activity->created_at)) }}@endslot
                                        @slot('category'){{ 'activity' }}@endslot
                                        @slot('category_route'){{ route('activities.index') }}@endslot
                                    @endcomponent
                                @empty
                                    @component('layouts.components.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                        </div><!-- Content Area -->
                        <!-- Widget Area -->
                        <x-WidgetAreaAds></x-WidgetAreaAds>
                        <!-- Widget Area /- -->
                    </div><!-- Row /- -->
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
