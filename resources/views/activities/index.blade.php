@extends('layouts.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content">
                <!-- Container -->
                <div class="container">
                    <div class="row">
                        <!-- Content Area -->
                        <div class="col-lg-8 col-md-6 content-area">
                            <!-- Row -->
                            <div class="row">
                                @forelse($activities as $index => $activity)
                                    @component('component.activities.content')
                                        @slot('route'){{ route('activities.show',[$activity->slug]) }}@endslot
                                        @slot('cover_image'){{ isset($activity->cover_image) ? asset($activity->cover_image) : 'http://placehold.it/330x247' }}@endslot
                                        @slot('title'){{ $activity->title }}@endslot
                                        @slot('content'){{ $activity->short_content }}@endslot
                                        @slot('created_at'){{ date('F j,Y',strtotime($activity->created_at)) }}@endslot
                                    @endcomponent
                                @empty
                                    @component('component.no_content')
                                    @endcomponent
                                @endforelse
                            </div><!-- Row /- -->
                            <!-- Pagination -->
                            {{ $activities->onEachSide(2)->links('layouts.pagination.minimag') }}
                            <!-- Pagination /- -->
                        </div><!-- Content Area /- -->
                        <!-- Widget Area -->
                        @component('component.widget_area_ad')
                        @endcomponent
                        <!-- Widget Area /- -->
                    </div>
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
