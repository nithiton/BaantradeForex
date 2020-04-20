@extends('layouts.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Slider Section -->
            <div class="container-fluid no-left-padding no-right-padding slider-section slider-section2">
                <!-- Container -->
                <div class="container">
                    <div class="row">
                        <!-- Content Area -->
                        <div class="col-lg-8 col-md-6 content-area">
                            <!-- Row -->
                            <div class="row">
                                @forelse($posts as $index => $post)
                                    @component('component.posts.content')
                                        @slot('route'){{ route('posts.show',[$post->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($post->cover_image) ? asset($post->cover_image) : 'http://placehold.it/770x513' }}@endslot
                                        @slot('title'){{ $post->title }}@endslot
                                        @slot('content'){{ $post->short_content }}@endslot
                                        @slot('author'){{ $post->author }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($post->created_at)) }}@endslot
                                    @endcomponent
                                @empty
                                    @component('component.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                        {{ $posts->onEachSide(2)->links('layouts.pagination.minimag') }}
                        <!-- Pagination /- -->
                        </div><!-- Content Area -->
                        <!-- Widget Area -->
                    @component('component.widget_area_ad')
                    @endcomponent
                    <!-- Widget Area /- -->
                    </div><!-- Row /- -->
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
