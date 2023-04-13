@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation"
        class="btn-group mx-auto items-center justify-center flex py-5 ">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="btn btn-disabled relative inline-flex items-center px-4 py-2 text-sm font-medium ">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="btn relative inline-flex items-center px-4 py-2 text-sm font-medium ">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="btn relative inline-flex items-center px-4 py-2 text-sm font-medium ">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="btn relative btn-disabled inline-flex items-center px-4 py-2 text-sm font-medium ">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
