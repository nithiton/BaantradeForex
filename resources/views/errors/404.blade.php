@extends('layouts.main')
@section('content')
    <div class="main-container">

        <main class="site-main">

            <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content">
                <!-- Container -->
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <div class="error-block">
                                <span>404</span>
                                <h2>Oops! That page can’t be found</h2>
                                <p>Sorry, but the page you were looking for could not be found.</p>
                                <a href="{{ route('home') }}" title="Back Home">Back Home</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Container /- -->
            </div><!-- Page Content /- -->

        </main>

    </div>
@endsection
