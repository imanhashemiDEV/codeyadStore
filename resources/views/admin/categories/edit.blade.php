@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش دسته بندی</h6>
                    <form method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-4">
                            <img class="offset-6" style="height: 200px; width: 200px;" src="{{url('images/categories/big/'. $category->image)}}" alt="{{$category->image}}">
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام دسته بندی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title" value="{{$category->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">دسته پدر</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-select">
                                    <option selected value="0"> دسته اصلی </option>
                                    @foreach($categories as $key => $value)
                                        @if($category->parent_id == $key)
                                            <option selected value="{{$key}}"> {{$value}} </option>
                                        @else
                                            <option value="{{$key}}"> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام انگلیسی دسته بندی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="etitle" value="{{$category->etitle}}" >
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
