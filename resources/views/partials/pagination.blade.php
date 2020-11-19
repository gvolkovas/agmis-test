<div class="row">
    <div class="col-4">
        @if($paginator->total() > $paginator->perPage())
            <nav aria-label="Pagination">
                <ul class="pagination">
                    @for($page = 1; $page <= ceil($paginator->total() / $paginator->perPage()); $page++)
                        <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}&perPage={{ $paginator->perPage() }}">{{ $page }}</a></li>
                    @endfor
                </ul>
            </nav>
        @endif
    </div>
    <div class="col-2 offset-6">
        <select class="form-control" onchange="handlePerPageSelect(event)" data-url="{{ $paginator->url($paginator->currentPage()) }}">
            <option value="1" {{ $paginator->perPage() === 1 ? 'selected' : '' }}>1</option>
            <option value="5" {{ $paginator->perPage() === 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ $paginator->perPage() === 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ $paginator->perPage() === 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ $paginator->perPage() === 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ $paginator->perPage() === 100 ? 'selected' : '' }}>100</option>
        </select>
    </div>
</div>
