<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="type-post blog-onecolumn">
        <div class="entry-cover">
            <div class="post-meta">
                <span class="byline">by <a href="#" title="{{ $author }}">{{ $author }}</a></span>
                <span class="post-date"><a href="#">{{ $created_at }}</a></span>
            </div>
            <a href="{{ $route }}"><img src="{{ $cover_image }}" alt="Post" style="width: 770px;height: 513px;object-fit: contain;"/></a>
        </div>
        <div class="entry-content">
            <div class="entry-header">
                <span class="post-category"><a href="#" title="Posts">Posts</a></span>
                <h3 class="entry-title"><a href="{{ $route }}" title="{{ $title }}">{{ $title}} </a></h3>
            </div>
            <p>{{ $content }}</p>
            <a href="{{ $route }}" title="Read More">Read More</a>
        </div>
    </div>
</div>
