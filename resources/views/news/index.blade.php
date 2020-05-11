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
                                    @component('layouts.components.news.content')
                                        @slot('route'){{ route('news.show',[$new->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($new->cover_image) ? asset($new->cover_image) : 'http://placehold.it/330x247' }}@endslot
                                        @slot('title'){{ $new->title }}@endslot
                                        @slot('viewed'){{ $new->viewed }}@endslot
                                        @slot('content'){{ $new->short_content }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($new->created_at)) }}@endslot
                                    @endcomponent
                                @empty
                                    @component('layouts.components.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                            {{ $news->onEachSide(2)->links('layouts.pagination.minimag') }}
                            <!-- Pagination /- -->
                        </div><!-- Content Area -->
                        <!-- Widget Area -->
                        <div class="col-lg-4 col-md-6 widget-area">
                            <div class="row">
                                <!-- Search Box -->
                                <div class="w-100">
                                    <form>
                                        <div class="input-group w-75 float-right">
                                            <input type="text" class="form-control" placeholder="Search..." required>
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
