@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش انبار</h6>
                    <form method="POST" action="{{route('vendors.update', $vendor->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام انبار</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title" value="{{$vendor->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> آدرس</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control text-left" id="editor" dir="rtl"
                                          name="address" cols="30" rows="10">{{$vendor->address}} </textarea>
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
    @include('admin.layouts.ckeditorConfig')
@endsection
