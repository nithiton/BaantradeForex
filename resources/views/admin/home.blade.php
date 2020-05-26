@extends('admin.layouts.main')
@section('breadcrumb')
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Most view (News)</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="news-top-ten-chart" height="100px"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Most view (Activities)</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="activities-top-ten-chart" height="100px"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Most view (Posts)</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="posts-top-ten-chart" height="100px"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Most view (Lessons)</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="lessons-top-ten-chart" height="100px"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Most view (Theaters)</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="videos-top-ten-chart" height="100px"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
@section('after-script')
    <script type="text/javascript">
        $(document).ready(function(){

            var newsTopTenChart  = new Chart($('#news-top-ten-chart'), {
                type   : 'horizontalBar',
                data : {
                    labels : [
                        @forelse($news as $index=>$new)
                            "{{$new->title}}",
                        @empty
                        @endforelse
                    ],
                    datasets : [{
                        barPercentage: 0.6, //bar size
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132)',
                        borderWidth:1,
                        data: [
                            @forelse($news as $index=>$new)
                                "{{$new->viewed}}",
                            @empty
                            @endforelse
                        ]
                    }]
                },
                options: {
                    legend : {display: false},
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero : true,
                            }
                        }]
                    }
                }
            });

            var activitiesTopTenChart  = new Chart($('#activities-top-ten-chart'), {
                type   : 'horizontalBar',
                data : {
                    labels : [
                        @forelse($activities as $index=>$activity)
                            "{{$activity->title}}",
                        @empty
                        @endforelse
                    ],
                    datasets : [{
                        barPercentage: 0.6, //bar size
                        backgroundColor: 'rgb(255, 159, 64, 0.2)',
                        borderColor: 'rgb(255, 159, 64)',
                        borderWidth:1,
                        data: [
                            @forelse($activities as $index=>$activity)
                                "{{$activity->viewed}}",
                            @empty
                            @endforelse
                        ]
                    }]
                },
                options: {
                    legend : {display: false},
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero : true,
                            }
                        }]
                    }
                }
            });

            var postsTopTenChart  = new Chart($('#posts-top-ten-chart'), {
                type   : 'horizontalBar',
                data : {
                    labels : [
                        @forelse($posts as $index=>$post)
                            "{{$post->title}}",
                        @empty
                        @endforelse
                    ],
                    datasets : [{
                        barPercentage: 0.6, //bar size
                        backgroundColor: 'rgb(75, 192, 192, 0.2)',
                        borderColor: 'rgb(75, 192, 192)',
                        borderWidth:1,
                        data: [
                            @forelse($posts as $index=>$post)
                                "{{$post->viewed}}",
                            @empty
                            @endforelse
                        ]
                    }]
                },
                options: {
                    legend : {display: false},
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero : true,
                            }
                        }]
                    }
                }
            });

            var lessonsTopTenChart  = new Chart($('#lessons-top-ten-chart'), {
                type   : 'horizontalBar',
                data : {
                    labels : [
                        @forelse($lessons as $index=>$lesson)
                            "{{$lesson->title}}",
                        @empty
                        @endforelse
                    ],
                    datasets : [{
                        barPercentage: 0.6, //bar size
                        backgroundColor: 'rgb(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        borderWidth:1,
                        data: [
                            @forelse($lessons as $index=>$lesson)
                                "{{$lesson->viewed}}",
                            @empty
                            @endforelse
                        ]
                    }]
                },
                options: {
                    legend : {display: false},
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero : true,
                            }
                        }]
                    }
                }
            });

            var videosTopTenChart  = new Chart($('#videos-top-ten-chart'), {
                type   : 'horizontalBar',
                data : {
                    labels : [
                        @forelse($videos as $index=>$video)
                            "{{$video->title}}",
                        @empty
                        @endforelse
                    ],
                    datasets : [{
                        barPercentage: 0.6, //bar size
                        backgroundColor: 'rgb(153, 102, 255, 0.2)',
                        borderColor: 'rgb(153, 102, 255)',
                        borderWidth:1,
                        data: [
                            @forelse($videos as $index=>$video)
                                "{{$video->viewed}}",
                            @empty
                            @endforelse
                        ]
                    }]
                },
                options: {
                    legend : {display: false},
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero : true,
                            }
                        }]
                    }
                }
            });
        });

    </script>
@endsection
