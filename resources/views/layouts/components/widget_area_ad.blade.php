<aside class="widget">
    <h3 class="widget-title">Advertise</h3>
    @forelse($ads as $index => $ad)
    <div class="latest-content" align="center">
        @if($index>0)<hr/>@endif
        <a href="{{ $ad->url }}" title="{{ $ad->title }}" target="_blank"><i><img src="{{ asset($ad->image) }}" class="wp-post-image" style="max-height: 200px" alt="blog-1" /></i></a>
        <h5><a href="{{ $ad->url }}" title="{{ $ad->title }}" target="_blank">{{ $ad->title }}</a></h5>
    </div>
    @empty
    @endforelse
</aside>
