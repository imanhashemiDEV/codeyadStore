@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش محصول</h6>
                    <form method="POST" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-4">
                            <img class="offset-6" style="height: 200px; width: 200px;" src="{{url('images/products/big/'. $product->image)}}" alt="{{$product->image}}">
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام محصول</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title" value="{{$product->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام انگلیسی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="etitle" value="{{$product->etitle}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">دسته بندی</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $key => $value)
                                        @if($product->category_id == $key)
                                            <option selected value="{{$key}}"> {{$value}} </option>
                                        @else
                                            <option  value="{{$key}}"> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">برند</label>
                            <div class="col-sm-10">
                                <select name="brand_id" class="form-select">
                                    @foreach($brands as $key => $value)
                                        @if($product->brand_id == $key)
                                            <option selected value="{{$key}}"> {{$value}} </option>
                                        @else
                                            <option value="{{$key}}"> {{$value}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">انتخاب تگ:</label>
                            <div class="col-sm-10">
                                <select name="tags[]" id="tags"
                                        class="form-control js-example-basic-single select2-hidden-accessible" multiple>
                                    @foreach($tags as $key => $value)
                                        @if(in_array($key, $product->tags->pluck('id')->toArray()))
                                           <option selected value="{{$key}}">{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">توضیحات محصول</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control text-left" id="editor" dir="rtl"
                                          name="description" cols="30" rows="10">{{$product->description}} </textarea>
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
    @include('admin.layouts.ckeditorConfig')
    <script>
        $('select').select2({
            dir: "rtl",
            dropdownAutoWidth: true,
            $dropdownParent: $('#parent')
        })
        $('.form-select').select2();
    </script>
@endsection
