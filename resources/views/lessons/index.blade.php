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
                                @forelse($lessons as $index => $lesson)
                                    @component('layouts.components.lessons.content')
                                        @slot('route'){{ route('lessons.show',[$lesson->slug]) }}@endslot
{{--                                        @slot('cover_image'){{ isset($video->cover_image) ? asset($video->cover_image) : 'http://placehold.it/330x247' }}@endslot--}}
                                        @slot('title'){{ $lesson->title }}@endslot
                                        @slot('viewed'){{ $lesson->viewed }}@endslot
                                        @slot('content'){{ $lesson->short_content }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($lesson->created_at)) }}@endslot
                                    @endcomponent
                                @empty
                                    @component('layouts.components.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                            {{ $lessons->onEachSide(2)->links('layouts.pagination.minimag') }}
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
