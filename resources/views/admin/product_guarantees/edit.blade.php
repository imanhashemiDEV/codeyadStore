@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش تنوع قیمت</h6>
                    <form method="POST" action="{{route('update.product.guarantees', [$product_guaranty->id, $product->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">قیمت اصلی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="main_price" value="{{$product_guaranty->main_price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">درصد تخفیف محصول</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="discount" value="{{$product_guaranty->discount}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">تعداد محصول</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="count" value="{{$product_guaranty->count}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">تعداد مجاز فروش محصول</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="max_sell" value="{{$product_guaranty->max_sell}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control text-left" dir="rtl" name="product_id" value="{{$product->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">رنگ محصول</label>
                            <div class="col-sm-10">
                                <select name="color_id" class="form-select">
                                    @foreach($colors as $key => $value)
                                        @if($product_guaranty->color_id == $key)
                                        <option selected value="{{$key}}"> {{$value}} </option>
                                        @else
                                        <option value="{{$key}}"> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">گارانتی محصول</label>
                            <div class="col-sm-10">
                                <select name="guaranty_id" class="form-select">
                                    @foreach($guarantees as $key => $value)
                                        @if($product_guaranty->guaranty_id == $key)
                                            <option value="{{$key}}"> {{$value}} </option>
                                        @else
                                            <option value="{{$key}}"> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> تاریخ شروع شگفت انگیز</label>
                            <div class="col-sm-10">
                                <input type="text" id="special_start" class="text-left form-control" dir="rtl"
                                       name="special_start" value="{{ $product_guaranty->special_start==null ? null : \Hekmatinasser\Verta\Verta::instance($product_guaranty->special_start)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> تاریخ انقضای شگفت انگیز</label>
                            <div class="col-sm-10">
                                <input type="text" id="special_expiration" class="text-left form-control" dir="rtl"
                                       name="special_expiration" value="{{$product_guaranty->special_start==null ? null : \Hekmatinasser\Verta\Verta::instance($product_guaranty->special_expiration)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')

    <script>
        $('select').select2({
            dir: "rtl",
            dropdownAutoWidth: true,
            $dropdownParent: $('#parent')
        })
        $('.form-select').select2();

        var customOptions = {
            placeholder: "روز / ماه / سال"
            , twodigit: false
            , closeAfterSelect: true
            , nextButtonIcon: "fa fa-arrow-circle-right"
            , previousButtonIcon: "fa fa-arrow-circle-left"
            , buttonsColor: "#5867dd"
            , markToday: true
            , markHolidays: true
            , highlightSelectedDay: true
            , sync: true
            , gotoToday: true
        }
        kamaDatepicker('special_start', customOptions);
        kamaDatepicker('special_expiration', customOptions);

    </script>
@endsection
