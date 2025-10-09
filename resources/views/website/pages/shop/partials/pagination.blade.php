@if($products->hasPages())
<ul class="wg-pagination tf-pagination-list {{ $layout === 'list' ? 'justify-content-start' : '' }}">
    {{-- Previous Page Link --}}
    @if ($products->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true"><span class="icon icon-arrow-left"></span></span>
        </li>
    @else
        <li>
            <a href="{{ $products->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="pagination-link animate-hover-btn"><span class="icon icon-arrow-left"></span></a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        @if ($page == $products->currentPage())
            <li class="active" aria-current="page"><span class="pagination-link">{{ $page }}</span></li>
        @else
            <li><a href="{{ $url }}" class="pagination-link animate-hover-btn">{{ $page }}</a></li>
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($products->hasMorePages())
        <li>
            <a href="{{ $products->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="pagination-link animate-hover-btn"><span class="icon icon-arrow-right"></span></a>
        </li>
    @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true"><span class="icon icon-arrow-right"></span></span>
        </li>
    @endif
</ul>
@endif
