@if ($paginator->hasPages())
    <nav class="mt-4">
        <ul class="pagination justify-content-center align-items-center">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded-circle">
                        <i class="fa fa-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-circle" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Page Number --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-circle" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link rounded-circle">
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
