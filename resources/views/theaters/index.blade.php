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
                                @forelse($videos as $index => $video)
                                    @component('layouts.components.theaters.content')
                                        @slot('route'){{ route('theaters.show',[$video->slug]) }}@endslot
{{--                                        @slot('cover_image'){{ isset($video->cover_image) ? asset($video->cover_image) : 'http://placehold.it/330x247' }}@endslot--}}
                                        @slot('title'){{ $video->title }}@endslot
                                        @slot('viewed'){{ $video->viewed }}@endslot
                                        @slot('content'){{ $video->short_content }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($video->created_at)) }}@endslot
                                    @endcomponent
                                @empty
                                    @component('layouts.components.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                            {{ $videos->onEachSide(2)->links('layouts.pagination.minimag') }}
                            <!-- Pagination /- -->
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
