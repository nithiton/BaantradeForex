<div class="col-12 col-lg-12 col-md-12 col-sm-12 blog-paralle">
    <div class="type-post">
        <div class="entry-content w-100">
            <div class="entry-header" >
                {{--<span class="post-category"><a href="#" title="News">News</a></span>--}}
                <h3 class="entry-title"><a href="{{ $route }}" title="{{ $title }}">{{ $title}} </a></h3>
            </div>
            {{--<p>{{ $content }}</p>--}}
            <a href="{{ $route }}" title="Watch video"><i class="fas fa-eye"></i> {{ $viewed }} | Watch video</a>
        </div>
    </div>
</div>
