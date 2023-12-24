@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">
                @include('frontend.profile.sidebar')
                <!-- Start Content -->
                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="row">
                            @if(\Illuminate\Support\Facades\Session::has('message'))
                                <div class="alert alert-info">
                                    <div>{{session('message')}}</div>
                                </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <div class="px-3 px-res-0">
                                <div
                                    class="section-title text-sm-title title-wide no-after-title-wide dt-sl mb-2 px-res-1">
                                    <h2> اطلاعات تجاری</h2>
                                </div>
                                <div class="form-ui additional-info dt-sl dt-sn pt-4">
                                    <form action="{{route('profile.seller.update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-row-title">
                                                    <h3>نام شرکت</h3>
                                                </div>
                                                <div class="form-row">
                                                    <input type="text" class="input-ui pr-2" name="company_name"
                                                           placeholder="نام شرکت خود را وارد نمایید" value="{{$user->seller->company_name ?? ""}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-row-title">
                                                    <h3>شماره اقتصادی شرکت</h3>
                                                </div>
                                                <div class="form-row">
                                                    <input type="text" class="input-ui pr-2" name="company_economy_number"
                                                           placeholder="شماره اقتصادی شرکت خود را وارد نمایید"
                                                           value="{{$user->seller->company_economy_number ?? ""}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-row-title">
                                                    <h3>وضعیت</h3>
                                                    <label class="badge badge-info">
                                                        @if($user->seller)
                                                            @if($user->seller->status==\App\Enums\CompanyStatus::Request->value)
                                                                درخواست اولیه
                                                            @elseif($user->seller->status==\App\Enums\CompanyStatus::Active->value)
                                                                پذیرفته شده
                                                            @elseif($user->seller->status==\App\Enums\CompanyStatus::Banned->value)
                                                                رد شده
                                                            @endif
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-row-title">
                                                    <h3>آپلود قرارداد</h3>
                                                </div>
                                                <div class="form-row mt-2">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="contract"
                                                                   id="inputGroupFile04"
                                                                   aria-describedby="inputGroupFileAddon04">
                                                            <label class="custom-file-label"
                                                                   for="inputGroupFile04">انتخاب
                                                                فایل</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-sl">
                                            <div class="form-row mt-3 justify-content-end">
                                                <button type="submit" class="btn-primary-cm btn-with-icon ml-2">
                                                    <i class="mdi mdi-account-circle-outline"></i>
                                                    ثبت اطلاعات تجاری
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Content -->
            </div>
            <!-- Start Product-Slider -->
            <section class="slider-section dt-sl mt-5 mb-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>محصولات پیشنهادی برای شما</h2>
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>

                    <!-- Start Product-Slider -->
                    <div class="col-12 px-res-0">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                        <div class="discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/07.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">157,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/017.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">کت مردانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس مردانه</a>
                                        <span class="product-price">199,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/013.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه مدل هودی تیک تین</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">135,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/09.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">145,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/010.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">170,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/011.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">185,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/019.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">تیشرت مردانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس مردانه</a>
                                        <span class="product-price">54,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </section>
            <!-- End Product-Slider -->
        </div>
    </main>
@endsection

