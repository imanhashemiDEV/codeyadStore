@if ($paginator->hasPages())
    <nav>
        <div class="pagination">
            @if ($paginator->onFirstPage())
                <a  class="prev disabled"><i class="mdi mdi-chevron-double-right "></i></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="prev"><i class="mdi mdi-chevron-double-right"></i></a>
            @endif
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="#" class="active-page">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}">{{$page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                @else
                    <a href="#" class="next disabled"><i class="mdi mdi-chevron-double-left"></i></a>
                @endif
        </div>
    </nav>
@endif
