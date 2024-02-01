<div class="container">
    <h6 class="card-title">دسته بندی لایووایری</h6>
    <form>
        <div class="form-group row ">
            <label  class="col-sm-2 col-form-label wire:ignore">دسته پدر</label>
            <div class="col-sm-10">
                <select  wire:model="parent_id" id="parent" class="form-select">
                    <option value="0"> دسته اصلی </option>
                    @foreach($categories as $key => $value)
                        @if($parent_id == $key)
                            <option selected value="{{$key}}"> {{$value}} </option>
                        @else
                            <option value="{{$key}}"> {{$value}} </option>
                        @endif
                    @endforeach
                </select>
                <select  class="form-select">
                    @foreach($subcategories as $key => $value)
                        <option value="{{$key}}"> {{$value}} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>
@section('scripts')
    <script>
        $('select').select2({
            dir: "rtl",
            dropdownAutoWidth: true,
            $dropdownParent: $('#parent')
        })
        $('.form-select').select2();
        $('.form-select').on('change', function (e) {
            var value = $('#parent').select2("val");
            Livewire.emit('listenerGetId',value);
        });

        Livewire.on('idSelected', id => {
            $('select').select2({
                dir: "rtl",
                dropdownAutoWidth: true,
                $dropdownParent: $('#parent')
            })
            $('.form-select').select2();
        })
    </script>
@endsection
