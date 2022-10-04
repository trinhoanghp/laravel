@if ($paginator->hasPages())
<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous" aria-disabled="true" >
                    <span class="page-link" aria-hidden="true">&lt;</span>
                </li>
            @else
                <li class="paginate_button page-item previous page-link"> <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a></li>
           
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active" aria-controls="example2" data-dt-idx="6" tabindex="0"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="paginate_button page-item page-link"><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next page-link">
                    <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&gt;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
