<style>
    .pagination {
        display: flex;
        justify-content: space-between;
       
        padding: 0;
        margin: 0;
    }

    .pagination .page-item {
        margin: 0 0.25rem;
    }

    .pagination .page-link {
        display: block;
        padding: 0.5rem 1rem;
        text-decoration: none;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }

    .pagination .page-item.disabled .page-link,
    .pagination .page-item.disabled .page-link:focus,
    .pagination .page-item.disabled .page-link:hover {
        color: #6c757d;
        background-color: #e9ecef;
        border-color: #dee2e6;
        cursor: not-allowed;
    }

    .pagination .page-item.active .page-link {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination .page-link:hover {
        color: #0056b3;
        text-decoration: none;
    }
</style>



@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-between">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo; Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> &lsaquo; Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            {{-- Add pagination elements here if needed --}}
            

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                       <a class="page-link ms-2" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">  Next &rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                      <span class="page-link ms-2" aria-hidden="true">Next &rsaquo; </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
