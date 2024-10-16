@if ($paginator->hasPages())
    <nav>
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="paginate_item disabled">Prev</span>
            @else
                <a class="paginate_item" href="{{ $paginator->previousPageUrl() }}">Prev</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="paginate_item dots">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="paginate_item active">{{ $page }}</span>
                        @else
                            <a class="paginate_item" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="paginate_item" href="{{ $paginator->nextPageUrl() }}">Next</a>
            @else
                <span class="paginate_item disabled">Next</span>
            @endif
        </div>
    </nav>
@endif
