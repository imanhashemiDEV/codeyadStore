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
                                <div class="product-seller-price">{{$productGuaranty->price}}<span class="currency">تومان</span></div>
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
                                <h3>{{$product->etitle}}<span
                                        class="rate-product">( {{$product->scores()->first()->count}} نفر)</span></h3>
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
                                                         @endphp
                                                        <div class="rating rating--general" data-rate-digit="{{$text}}">
                                                            <div class="rating-rate" data-rate-value="100%"
                                                                 style="width: {{$percent}}%;"></div>
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
                                                <a href="{{route('product.comment',$product->id)}}" class="btn-primary-cm btn-with-icon">
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
                                        <p class="count-comment">{{$product->comments()->where('status',\App\Enums\CommentStatus::Approved->value)->count()}} نظر</p>
                                    </div>
                                    <ol class="comment-list">

                                        @foreach($product->submittedComments as $comment)
                                            <!-- #comment-## -->
                                            <li>
                                                <div class="comment-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="message-light message-light--purchased">@if($comment->is_buyer) خریدار این محصول  @else خریدار نیست @endif</div>
                                                            <ul class="comments-user-shopping">
                                                                <li>
                                                                    <div class="cell">رنگ خریداری
                                                                        شده:</div>
                                                                    <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="cell">خریداری شده
                                                                        از:</div>
                                                                    <div class="cell seller-cell">
                                                                        <span class="o-text-blue">دیجی‌کالا</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            @if($comment->suggestion==1)
                                                            <div class="message-light message-light--opinion-positive">خرید این محصول را توصیه می‌کنم</div>
                                                            @elseif($comment->suggestion==2)
                                                            <div class="message-light message-light--opinion-negative">خرید این محصول را توصیه نمی‌کنم</div>
                                                            @else
                                                            <div class="message-light">پیشنهادی ندارم</div>
                                                            @endif

                                                        </div>
                                                        <div class="col-md-9 col-sm-12 comment-content">
                                                            <div class="comment-title">
                                                                {{$product->title}}
                                                            </div>
                                                            <div class="comment-author">
                                                               {{$comment->user->name}}
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6 col-12">
                                                                    <div class="content-expert-evaluation-positive">
                                                                        <span>نقاط قوت</span>
                                                                        <ul>
                                                                           @foreach(explode('@',$comment->advantage) as $advantage)
                                                                                <li>{{$advantage}}</li>
                                                                           @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6 col-12">
                                                                    <div class="content-expert-evaluation-negative">
                                                                        <span>نقاط ضعف</span>
                                                                        <ul>
                                                                            @foreach(explode('@',$comment->disadvantage) as $disadvantage)
                                                                                <li>{{$disadvantage}}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                {{$comment->body}}
                                                            </p>

                                                            <div class="footer">
                                                                <div class="comments-likes">
                                                                    آیا این نظر برایتان مفید بود؟
                                                                    <button class="btn-like" data-counter="۱۱">بله
                                                                    </button>
                                                                    <button class="btn-like" data-counter="۶">خیر
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
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
                            <div class="form-question-answer dt-sl mb-3">
                                <form action="">
                                    <textarea class="form-control mb-3" rows="5"></textarea>
                                    <button class="btn btn-dark float-right ml-3" disabled="">ثبت پرسش</button>
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">اولین پاسخی که به
                                            پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.</label>
                                    </div>
                                </form>
                            </div>
                            <div class="comments-area default">
                                <div
                                    class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                    <h2>پرسش ها و پاسخ ها</h2>
                                    <p class="count-comment">123 پرسش</p>
                                </div>
                                <ol class="comment-list">
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">حسن</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                        ا ۱۳۹۶ در ۹:۴۱ ب.ظ
                                                    </a>
                                                </div>
                                            </div>



                                            <p>لورم ایپسوم متن ساختگی</p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                    </li>
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">رضا</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                         ۱۳۹۶ در ۹:۴۲ ب.ظ
                                                    </a>
                                                </div>
                                            </div>
                                            <p>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                صنعت چاپ و با استفاده از طراحان گرافیک است.
                                            </p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                        <ol class="children">
                                            <li>
                                                <div class="comment-body">
                                                    <div class="comment-author">
                                                            <span
                                                                class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                        <cite class="fn">بهرامی راد</cite> <span
                                                            class="says">گفت:</span>
                                                        <div class="commentmetadata">
                                                            <a href="#">
                                                                 ۱۳۹۶ در ۹:۴۷ ب.ظ
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی
                                                        نامفهوم از صنعت چاپ و با استفاده از
                                                        طراحان گرافیک است.
                                                        چاپگرها و متون بلکه روزنامه و مجله در
                                                        ستون و سطرآنچنان که لازم است و برای
                                                        شرایط فعلی تکنولوژی
                                                        مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                        ابزارهای کاربردی می باشد.</p>

                                                    <div class="reply"><a class="comment-reply-link"
                                                                          href="#">پاسخ</a></div>
                                                </div>
                                                <ol class="children">
                                                    <li>
                                                        <div class="comment-body">
                                                            <div class="comment-author">
                                                                <span class="icon-comment">?</span>
                                                                <cite class="fn">محمد</cite>
                                                                <span class="says">گفت:</span>
                                                                <div class="commentmetadata">
                                                                    <a href="#">
                                                                        ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <p>عالیه</p>

                                                            <div class="reply"><a class="comment-reply-link"
                                                                                  href="#">پاسخ</a></div>
                                                        </div>
                                                        <ol class="children">
                                                            <li>
                                                                <div class="comment-body">
                                                                    <div class="comment-author">
                                                                            <span
                                                                                class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                                        <cite class="fn">اشکان</cite>
                                                                        <span class="says">گفت:</span>
                                                                        <div class="commentmetadata">
                                                                            <a href="#">
                                                                                 ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <p>لورم ایپسوم متن ساختگی با
                                                                        تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از
                                                                        طراحان
                                                                        گرافیک است. چاپگرها و
                                                                        متون بلکه روزنامه و مجله
                                                                        در ستون و سطرآنچنان که
                                                                        لازم است و
                                                                        برای شرایط فعلی تکنولوژی
                                                                        مورد نیاز و کاربردهای
                                                                        متنوع با هدف بهبود
                                                                        ابزارهای
                                                                        کاربردی می باشد.</p>

                                                                    <div class="reply"><a class="comment-reply-link"
                                                                                          href="#">پاسخ</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- #comment-## -->
                                                        </ol>
                                                        <!-- .children -->
                                                    </li>
                                                    <!-- #comment-## -->
                                                </ol>
                                                <!-- .children -->
                                            </li>
                                            <!-- #comment-## -->
                                        </ol>
                                        <!-- .children -->
                                    </li>
                                </ol>
                            </div>
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

