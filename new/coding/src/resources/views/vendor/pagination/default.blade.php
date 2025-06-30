@if ($programs->hasPages())
    <nav class="mt-4">
        <ul class="pagination justify-content-center align-items-center">

            {{-- Tombol Sebelumnya --}}
            @if ($programs->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="fa fa-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $programs->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $programs->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Selanjutnya --}}
            @if ($programs->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $programs->nextPageUrl() }}" rel="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
