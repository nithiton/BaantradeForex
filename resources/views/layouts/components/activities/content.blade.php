<div class="col-lg-6 col-md-12 col-sm-6">
    <div class="type-post">
        <div class="entry-cover">
            <div class="post-meta">
                {{--<span class="byline">by <a href="#" title="Indesign">inDesign</a></span>--}}
                <span class="post-date"><a href="#">{{ $created_at }}</a></span>
            </div>
            <a href="{{ $route }}"><img src="{{ $cover_image }}" alt="Post" style="width: 330px;height: 247px;object-fit: contain;"/></a>
        </div>
        <div class="entry-content">
            <div class="entry-header">
                <span class="post-category"><a href="#" title="Activity">Activity</a></span>
                <h3 class="entry-title"><a href="{{ $route }}" title="{{ $title }}">{{ $title }}</a></h3>
            </div>
            <p>{{ $content }}</p>
            <a href="{{ $route }}" title="Read More"><i class="fas fa-eye"></i> {{ $viewed }} | Read More</a>
        </div>
    </div>
</div>
