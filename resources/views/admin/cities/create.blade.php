@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد شهر</h6>
                    <form method="POST" action="{{route('cities.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام استان</label>
                            <div class="col-sm-10">
                                <select name="province_id" class=" form-control">
                                    <option> انتخاب کنید </option>
                                    @foreach($provinces as $key => $value)
                                        <option value="{{$key}}"> {{$value}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام شهر</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">زمان ارسال</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="send_day">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">هزینه ارسال</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="send_price">
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
    </script>
@endsection
