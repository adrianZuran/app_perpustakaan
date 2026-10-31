@if ($paginator->hasPages())
    <nav class="pagination">
        @if ($paginator->onFirstPage())
            <span class="pagination-disabled">&laquo; Sebelumnya</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">&laquo; Sebelumnya</a>
        @endif
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="pagination-current">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Berikutnya &raquo;</a>
        @else
            <span class="pagination-disabled">Berikutnya &raquo;</span>
        @endif
    </nav>
@endif