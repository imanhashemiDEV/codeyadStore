@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش شهر</h6>
                    <form method="POST" action="{{route('cities.update', $city->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام استان</label>
                            <div class="col-sm-10">
                                <select name="province_id" class=" form-control">
                                    <option> انتخاب کنید </option>
                                    @foreach($provinces as $key => $value)
                                        @if($city->province_id == $key)
                                        <option selected value="{{$key}}"> {{$value}} </option>
                                        @else
                                            <option  value="{{$key}}"> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام شهر</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="city" value="{{$city->city}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">زمان ارسال</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="send_day" value="{{$city->send_day}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">هزینه ارسال</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="send_price" value="{{$city->send_price}}">
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
