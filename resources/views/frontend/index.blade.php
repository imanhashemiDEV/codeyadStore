@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start Main-Slider -->
            <div class="row mb-3">
                <aside class="sidebar col-xl-2 col-lg-3 col-12 order-2 order-lg-1 pl-0 hidden-md">
                    <!-- Start banner -->
                    <div class="sidebar-inner dt-sl">
                        <div class="sidebar-banner">
                            <a href="#" target="_top">
                                <img src="{{url('images/banners/big/'. $banners->where('type','side_banner')->first()->image)}}" width="100%" height="329"
                                     alt="">
                            </a>
                        </div>
                    </div>
                    <!-- End banner -->
                </aside>
                <div class="col-xl-10 col-lg-9 col-12 order-1 order-lg-2">
                    <!-- Start main-slider -->
                    <section id="main-slider" class="main-slider carousel slide carousel-fade card hidden-sm"
                             data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($sliders as $slider)
                            <li data-target="#main-slider" data-slide-to="{{$slider->id}}" @if($loop->first) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <a class="main-slider-slide" href="#"
                                       style="background-image: url({{url('images/sliders/big/'.$slider->image)}})">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#main-slider" data-slide="next">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </section>
                    <section id="main-slider-res"
                             class="main-slider carousel slide carousel-fade card d-none show-sm" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($sliders as $slider)
                            <li data-target="#main-slider-res" data-slide-to="0" @if($loop->first) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <a class="main-slider-slide" href="#">
                                    <img src="{{url('images/sliders/big/'.$slider->image)}}" alt=""
                                         class="img-fluid">
                                </a>
                            </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#main-slider-res" role="button" data-slide="prev">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#main-slider-res" data-slide="next">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </section>
                    <!-- End main-slider -->
                </div>
            </div>
            <!-- End Main-Slider -->
            <!-- Start Product-Slider -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <section class="slider-section dt-sl mb-5">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide no-after-title-wide">
                                    <h2>پر فروش ترینها</h2>
                                    <a href="#">مشاهده همه</a>
                                </div>
                            </div>

                            <!-- Start Product-Slider -->
                            <div class="col-12 px-res-0">
                                <div class="product-carousel carousel-md owl-carousel owl-theme">
                                    @foreach($most_sold as $product)
                                    <div class="item">
                                        <div class="product-card">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                   @if($product->discount!=0)  <span>{{$product->discount}}%</span> @endif
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="{{route('single.product',$product->slug)}}">
                                                <img src="{{url('images/products/big/'.$product->image)}}" alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="{{route('single.product',$product->slug)}}">{{$product->title}}</a>
                                                </h5>
                                                <a class="product-meta" href="#">{{$product->category->title}}</a>
                                                <span class="product-price">{{$product->price}}  تومان </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Product-Slider -->

                        </div>
                    </section>
                </div>
            </div>
            <!-- End Product-Slider -->
            <!-- Start Banner -->
            <div class="row mt-3 mb-5">
                @foreach($banners->where('type','medium_banner') as $medium_banner)
                    <div class="col-sm-6 col-12 mb-2">
                        <div class="widget-banner">
                            <a href="#">
                                <img src="{{url('images/banners/big/'. $medium_banner->image)}}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
            <!-- End Banner -->
            <!-- Start Banner -->
            <div class="row mt-3 mb-5">
                @foreach($banners->where('type','small_banner') as $small_banner)
                    <div class="col-md-3 col-sm-6 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="#">
                                <img src="{{url('images/banners/big/'. $small_banner->image)}}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Banner -->
            <!-- Start Category-Section -->
            <div class="row mt-3 mb-5">
                <div class="col-12">
                    <div class="category-section dt-sn dt-sl border">
                        <div class="category-section-title dt-sl">
                            <h3>بیش از ۱،۵۰۰،۰۰۰ کالا در دسته‌بندی‌های مختلف</h3>
                        </div>
                        <div class="category-section-slider dt-sl">
                            <div class="category-slider owl-carousel">
                                @foreach($categories as $category)
                                    <div class="item">
                                        <a href="#" class="promotion-category">
                                            <img src="{{url('images/categories/big/'. $category->image)}}" alt="">
                                            <h4 class="promotion-category-name">{{$category->title}}</h4>
                                            <h6 class="promotion-category-quantity">{{$category->getMainCategoryCount($category->id)}}</h6>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Category-Section -->
            <!-- Start Product-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>فروش شگفت انگیز</h2>
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>

                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            @foreach($special_products as $special_product)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                <span>{{$special_product->discount}}%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="{{route('single.product',$special_product->product->slug)}}">
                                            <img src="{{url('images/products/big/'.$special_product->product->image)}}" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="{{route('single.product',$special_product->product->slug)}}">{{$special_product->product->title}}</a>
                                            </h5>
                                            <a class="product-meta" href="#">{{$special_product->product->category->title}}</a>
                                            <span class="product-price">{{$special_product->price}}  تومان </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->
                </div>
            </section>
            <!-- End Product-Slider -->
            <!-- Start Banner -->
            <div class="row mt-3 mb-5">
                <div class="col-12">
                    <div class="widget-banner">
                        <a href="#">
                            <img src="{{url('images/banners/big/'. $banners->where('type','large_banner')->first()->image)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Banner -->
            <!-- Start Product-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>جدیدترین ها</h2>
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>

                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            @foreach($newest_products as $newest_product)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                <span>{{$newest_product->discount}}%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="#">
                                            <img src="{{url('images/products/big/'.$newest_product->image)}}" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="#">{{$newest_product->title}}</a>
                                            </h5>
                                            <a class="product-meta" href="#">{{$newest_product->category->title}}</a>
                                            <span class="product-price">{{$newest_product->price}}  تومان </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </section>
            <!-- End Product-Slider -->
            <!-- Start Feature-Product -->
            <section class="dt-sl dt-sn mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>پیشنهاد ما</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/017.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/020.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/014.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/016.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/018.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/')}}./assets/img/products/015.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/017.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/020.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">
                                        <a href="#">
                                            <img src="{{url('frontend/img/products/014.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>کت مردانه مجلسی مدل k-m-5110</h3>
                                            </a>
                                        </div>
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="card-horizontal-product-price">
                                            <span>199,000 تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="#" class="btn btn-outline-info">جزئیات محصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Feature-Product -->
            <!-- Start Brand-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row">
                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="brand-slider carousel-lg owl-carousel owl-theme">
                            @foreach($brands as $brand)
                                <div class="item">
                                    <img src="{{url('images/brands/big/'.$brand->image)}}" class="img-fluid" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </section>
            <!-- End Brand-Slider -->
        </div>
    </main>
    <!-- End main-content -->
@endsection

