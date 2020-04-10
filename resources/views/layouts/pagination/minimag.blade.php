@if ($paginator->hasPages())
    <nav class="navigation pagination">
        <h2 class="screen-reader-text">Posts navigation</h2>
        <div class="nav-links">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}">Previous</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="page-numbers" href="#"><span class="meta-nav screen-reader-text">Page </span>{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-numbers current">
                                <span class="meta-nav screen-reader-text">Page </span>{{ $page }}
                            </span>
                        @else
                            <a class="page-numbers" href="{{ $url }}"><span class="meta-nav screen-reader-text">Page </span>{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">Next</a>
            @endif
        </div>
    </nav>
@endif
