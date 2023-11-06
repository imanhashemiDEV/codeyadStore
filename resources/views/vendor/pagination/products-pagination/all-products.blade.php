@if ($paginator->hasPages())
    <nav>
        <div class="pagination">

                <a  class="prev "><i class="mdi mdi-chevron-double-right "></i></a>

                @foreach ($elements as $element)

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="#" class="active-page">{{ $page }}</a>
                            @else
                                <a href="" wire:click.prevent="changePage({{$page}},1)">{{$page}}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach


                    <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>

        </div>
    </nav>
@endif
