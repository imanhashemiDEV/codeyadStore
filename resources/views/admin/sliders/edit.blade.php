@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش اسلایدر</h6>
                    <form method="POST" action="{{route('sliders.update', $slider->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-4">
                            <img class="offset-6" style="height: 200px; width: 200px;" src="{{url('images/sliders/big/'. $slider->image)}}" alt="{{$slider->image}}">
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">لینک</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="url" value="{{$slider->url}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                            <input  class="col-sm-10 form-control-file" type="file" name="image" id="file">
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
