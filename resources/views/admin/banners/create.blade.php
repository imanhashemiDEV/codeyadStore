@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد بنر</h6>
                    <form method="POST" action="{{route('banners.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نوع بنر</label>
                            <select name="type" class="col-sm-6">
                                    <option value="{{\App\Enums\BannerType::TopBanner->value}}"> بنر بالا </option>
                                    <option value="{{\App\Enums\BannerType::SideBanner->value}}"> بنر کناری </option>
                                    <option value="{{\App\Enums\BannerType::LargeBanner->value}}"> بنر بزرگ </option>
                                    <option value="{{\App\Enums\BannerType::MediumBanner->value}}"> بنر متوسط </option>
                                    <option value="{{\App\Enums\BannerType::SmallBanner->value}}"> بنر کوچک </option>
                            </select>
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
