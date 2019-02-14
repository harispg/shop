<nav class="g-mb-100" aria-label="Page Navigation">
@if ($paginator->hasPages())
    <ul class="list-inline mb-0">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="list-inline-item disabled">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5 g-ml-15" href="#!" aria-label="Previous">
                <span aria-hidden="true">
                  <i class="fa fa-angle-left"></i>
                </span>
                <span class="sr-only">previous</span>
              </a>
            </li>
        @else
            <li class="list-inline-item">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5 g-ml-15" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">
                  <i class="fa fa-angle-left"></i>
                </span>
                <span class="sr-only">previous</span>
              </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="list-inline-item hidden-down">
              <span class="g-width-30 g-height-30 g-color-gray-dark-v5 g-font-size-12 rounded-circle g-pa-5">{{ $element }}</span>
            </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="list-inline-item hidden-down">
              <a class="active u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--active g-color-white g-bg-primary--active g-font-size-12 rounded-circle g-pa-5" href="#!">{{$page}}</a>
            </li>
                    @else
                        <li class="list-inline-item hidden-down">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5" href="{{ $url }}">{{ $page }}</a>
            </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="list-inline-item">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5 g-ml-15" href="{{ $paginator->nextPageUrl()}}" aria-label="Next">
                <span aria-hidden="true">
                  <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Next</span>
              </a>
            </li>
        @else
            <li class="list-inline-item disabled">
              <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5 g-ml-15" href="#!" aria-label="Next">
                <span aria-hidden="true">
                  <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Next</span>
              </a>
            </li>
        @endif
        <li class="list-inline-item float-right">
              <span class="u-pagination-v1__item-info g-color-gray-dark-v4 g-font-size-12 g-pa-5">Page {{$paginator->currentPage()}} of {{$paginator->lastPage()}}</span>
            </li>
    </ul>
@endif
</nav>