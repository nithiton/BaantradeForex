@extends('layout.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content blog-paralle-post-no-sidebar">
                <!-- Container -->
                <div class="container">
                    <!-- Row -->
                    <div class="row justify-content-md-center">
                        <!-- Content Area -->
                        <div class="col-xl-10 col-lg-12 col-md-12 content-area">
                            <!-- Row -->
                            <div class="row">
                                @forelse($news as $index => $new)
                                    @component('component.news_content')
                                        @slot('route'){{ route('news.show',[$new->slug]) }}@endslot
                                        @slot('title'){{ $new->title }}@endslot
                                        @slot('content'){{ $new->short_content }}@endslot
                                        @slot('category'){{ $new->category }}@endslot
                                    @endcomponent
                                @empty
                                    @component('component.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                            {{ $news->onEachSide(2)->links('layout.pagination.minimag') }}
                            <!-- Pagination /- -->
                        </div><!-- Content Area -->
                    </div><!-- Row /- -->
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
