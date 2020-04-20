@extends('layouts.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content blog-paralle-post">
                <!-- Container -->
                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <!-- Content Area -->
                        <div class="col-lg-8 col-md-6 content-area">
                            <!-- Row -->
                            <div class="row">
                                @forelse($news as $index => $new)
                                    @component('component.news.content')
                                        @slot('route'){{ route('news.show',[$new->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($new->cover_image) ? asset($new->cover_image) : 'http://placehold.it/330x247' }}@endslot
                                        @slot('title'){{ $new->title }}@endslot
                                        @slot('content'){{ $new->short_content }}@endslot
                                        @slot('category'){{ $new->category }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($new->created_at)) }}@endslot
                                    @endcomponent
                                @empty
                                    @component('component.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                            {{ $news->onEachSide(2)->links('layouts.pagination.minimag') }}
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
