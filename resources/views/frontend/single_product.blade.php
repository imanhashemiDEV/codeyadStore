@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start title - breadcrumb -->
            <div class="title-breadcrumb-special dt-sl mb-3">
                <div class="breadcrumb dt-sl">
                    <nav>
                        <a href="#">موبایل</a>
                        <a href="#">سامسونگ</a>
                        <a href="#">{{$product->etitle}}</a>
                    </nav>
                </div>
            </div>
            <!-- End title - breadcrumb -->
            <!-- Start Product -->
            <livewire:frontend.product.single-product :product="$product"/>
            <!-- sellers -->
            <div class="product-sellers shadow-around mb-5" id="product-seller-all">
                @foreach($product->productGuaranties()->where('price','!=', $product->price)->get() as $productGuaranty)
                    <div class="product-seller">
                        <div class="product-seller-col">
                            <div class="product-seller-title">
                                <div class="icon">
                                    <i class="fas fa-store-alt"></i>
                                </div>
                                <div class="detail">
                                    <div class="name">کدیادکالا <span
                                                class="badge badge-light rounded-pill">برگزیده</span>
                                    </div>
                                    <div class="rating">
                                        <span class="value">۹۰.۲٪</span>
                                        <span class="label">رضایت خریداران</span>
                                        <span class="divider">|</span>
                                        <span class="label">عملکرد</span>
                                        <span class="value">عالی</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-seller-col">
                            <div class="product-seller-conditions">
                                <div class="product-seller-info">
                                    <i class="fad fa-truck-container"></i>
                                    <span>ارسال از کدیادکالا</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-seller-col">
                            <div class="product-seller-guarantee">
                                <div class="product-seller-info">
                                    <i class="fad fa-shield-check"></i>
                                    <span>{{$productGuaranty->guaranty->title}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-seller-col">
                            <div class="product-seller-price-action">
                                <div class="product-seller-price">{{$productGuaranty->price}}<span class="currency">تومان</span>
                                </div>
                                <div class="product-seller-action"><a href="#" class="btn btn-outline-danger">افزودن به
                                        سبد</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="dt-sn mb-5 px-0 dt-sl pt-0">
                <!-- Start tabs -->
                <section class="tabs-product-info mb-3 dt-sl">
                    <div class="ah-tab-wrapper border-bottom dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href=""><i
                                        class="mdi mdi-glasses"></i>نقد و بررسی</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-format-list-checks"></i>مشخصات</a>
                            <a class="ah-tab-item" href=""><i
                                        class="mdi mdi-comment-text-multiple-outline"></i>نظرات کاربران</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-comment-question-outline"></i>پرسش و
                                پاسخ</a>
                        </div>
                    </div>
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>نقد و بررسی</h2>
                            </div>
                            <div class="product-title dt-sl">
                                <h1>{{$product->title}} / {{$product->etitle}}</h1>
                            </div>
                            <div class="accordion dt-sl accordion-product mt-3" id="accordionExample">
                                @foreach($product->discussions as $discussion)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn collapsed" type="button" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="false"
                                                        aria-controls="collapseOne">
                                                    {{$discussion->title}}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                {!! $discussion->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="ah-tab-content params dt-sl">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>مشخصات فنی</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h1>{{$product->title}}
                                </h1>
                                <h3>{{$product->etitle}}</h3>
                            </div>
                            <section>
                                <h3 class="params-title">مشخصات کلی</h3>
                                <ul class="params-list">
                                    @foreach($product->propertyGroups as $propertyGroup)
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">{{$propertyGroup->title}}</span>
                                            </div>
                                            @foreach($propertyGroup->properties->where('product_id',$product->id) as $property)
                                                <div class="params-list-value">
                                                <span class="d-block">
                                                    {{$property->title}}
                                                </span>
                                                </div>
                                            @endforeach

                                        </li>
                                    @endforeach
                                </ul>
                            </section>

                        </div>
                        <div class="ah-tab-content comments-tab dt-sl">
                            <div class="section-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>امتیاز کاربران به:</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h1>{{$product->title}}
                                </h1>
                                @if($product->scores()->first())
                                    <h3>{{$product->etitle}}<span
                                                class="rate-product">( {{$product->scores()->first()->count}} نفر)</span>
                                    </h3>
                                @endif

                            </div>
                            <div class="dt-sl">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="content-expert-rating">
                                            @foreach($product->scores as $score)
                                                <li>
                                                    <div class="cell">{{$score->title}}</div>
                                                    <div class="cell">
                                                        @php
                                                            if($score->count>0){
                                                                 $percent = (($score->score *100)/($score->count*5));
                                                             if($percent < 20){
                                                                 $text = "ضعیف";
                                                             }else if( 20 < $percent && $percent <=40){
                                                                 $text = "متوسط";
                                                             }else if( 40 < $percent && $percent <=60){
                                                                 $text = "خوب";
                                                             }else if( 60 < $percent && $percent <=80){
                                                                 $text = "بسیار خوب";
                                                             }else if( 80 < $percent){
                                                                 $text = "عالی";
                                                             }
                                                            }
                                                        @endphp
                                                        <div class="rating rating--general"
                                                             data-rate-digit="{{$text ?? ""}}">
                                                            <div class="rating-rate" data-rate-value="100%"
                                                                 style="width: {{$percent ?? 0}}%;"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="comments-summary-note">
                                                <span>شما هم می‌توانید در مورد این کالا نظر
                                                    بدهید.</span>
                                            <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود
                                                شوید. اگر این محصول را قبلا از دیجی‌کالا خریده
                                                باشید، نظر
                                                شما به عنوان مالک محصول ثبت خواهد شد.
                                            </p>
                                            <div class="dt-sl mt-2">
                                                <a href="{{route('product.comment',$product->id)}}"
                                                   class="btn-primary-cm btn-with-icon">
                                                    <i class="mdi mdi-comment-text-outline"></i>
                                                    افزودن نظر جدید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comments-area dt-sl">
                                    <div
                                            class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                        <h2>نظرات کاربران</h2>
                                        <p class="count-comment">{{$product->comments()->where('status',\App\Enums\QuestionStatus::Approved->value)->count()}}
                                            نظر</p>
                                    </div>
                                    <ol class="comment-list">

                                        @foreach($product->submittedComments as $comment)
                                            <!-- #comment-## -->
                                            <livewire:frontend.comment.comment-item :comment="$comment"
                                                                                    :product="$product"/>
                                        @endforeach

                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content dt-sl">
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <h2>پرسش و پاسخ</h2>
                                <p class="count-comment">پرسش خود را در مورد محصول مطرح نمایید</p>
                            </div>
                            <livewire:frontend.question.create-question :product="$product"/>
                            <livewire:frontend.question.question-list :product="$product"/>
                        </div>
                    </div>
                </section>
                <!-- End tabs -->
            </div>
            <!-- End Product -->
            <!-- Start Product-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>خریداران این محصول، محصولات زیر را هم خریده‌اند</h2>
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>

                    <!-- Start Product-Slider -->
                    <div class="col-12">
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
    <!-- End main-content -->
@endsection

