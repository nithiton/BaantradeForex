@extends('layouts.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content">
                <!-- Container -->
                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <!-- Content Area -->
                        <div class="col-lg-8 col-md-8 content-area">
                            <div class="row">
                                <div class="type-post">
                                    <div class="entry-header">
                                        <h3 class="entry-title"><a title="Search result">Search result of "{{ request('search_query') }}"</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Row -->
                            <div class="row">
                                @forelse($posts as $index => $post)
                                    @component('layouts.components.posts.content')
                                        @slot('route'){{ route('posts.show',[$post->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($post->cover_image) ? asset($post->cover_image) : 'http://placehold.it/770x450' }}@endslot
                                        @slot('title'){{ $post->title }}@endslot
                                        @slot('viewed'){{ $post->viewed }}@endslot
                                        @slot('content'){{ $post->short_content }}@endslot
                                        @slot('author'){{ $post->author }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($post->created_at)) }}@endslot
                                    @endcomponent
                                @empty
                                    @component('layouts.components.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                            {{ $posts->onEachSide(2)->appends(request()->except('page'))->links('layouts.pagination.minimag') }}
                            <!-- Pagination /- -->
                        </div><!-- Content Area -->
                        <!-- Widget Area -->
                        <div class="col-lg-4 col-md-4 widget-area">
                            <div class="row">
                                <!-- Search Box -->
                                <div class="w-100">
                                    <form method="get" action="{{ route('posts.search') }}" enctype="multipart/form-data">
                                        <div class="input-group w-75 float-right">
                                            <input type="text" class="form-control" name="search_query" placeholder="Search..." value="{{ request('search_query') }}" required>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="pe-7s-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div><!-- Search Box /- -->
                            </div>
                            <br/>
                            <x-WidgetAreaAds></x-WidgetAreaAds>
                        </div>
                        <!-- Widget Area /- -->
                    </div><!-- Row /- -->
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
