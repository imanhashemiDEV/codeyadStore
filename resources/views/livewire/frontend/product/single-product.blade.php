<div class="dt-sn mb-5 dt-sl">
    <div class="row">
        <!-- Product Gallery-->

        <div class="col-lg-4 col-md-6 ps-relative">
            <!-- Product Options-->
            <ul class="gallery-options">
                <div class="row">
                    @if(session()->has('message'))
                        <div class="text-danger">
                            {{session('message')}}
                        </div>
                    @endif
                </div>
                @php
                if(auth()->user()){
                   $fav = \App\Models\Favorite::query()
                   ->where('user_id',auth()->user()->id)
                   ->where('product_id',$product->id)->exists();
                }else{
                    $fav = null;
                }

                @endphp
                <li wire:click="AddFavorite({{$product->id}})">
                    <button class="add-favorites "><i class="mdi mdi-heart @if($fav) text-danger @endif"></i></button>
                    <span class="tooltip-option">افزودن به علاقمندی</span>
                </li>
            </ul>

            @if($product->special_expiration != null && $product->special_expiration > now())
                <div class="product-timeout position-relative pt-5 mb-3">
                    <div class="promotion-badge">
                        فروش ویژه
                    </div>
                    <div class="countdown-timer" countdown data-date="{{$product->special_expiration}}">
                        <span data-days>0</span>:
                        <span data-hours>0</span>:
                        <span data-minutes>0</span>:
                        <span data-seconds>0</span>
                    </div>
                </div>
            @endif
            <div class="product-gallery" wire:ignore>
                <div class="product-carousel owl-carousel" data-slider-id="1">
                    @foreach($product->galleries as $gallery)
                        <div class="item">
                            <a class="gallery-item" href="{{url('images/products/big/'.$gallery->image)}}"
                               data-fancybox="gallery1">
                                <img src="{{url('images/products/big/'.$gallery->image)}}" alt="Product">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center flex-wrap">
                    <ul class="product-thumbnails owl-thumbs ml-2" data-slider-id="1">
                        @foreach($product->galleries as $gallery)
                            <li class="owl-thumb-item active">
                                <a href="">
                                    <img src="{{url('images/products/big/'.$gallery->image)}}" alt="Product">
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
        <!-- Product Info -->
        <div class="col-lg-8 col-md-6 py-2">
            <div class="product-info dt-sl">
                <div class="product-title dt-sl mb-3">
                    <h1>{{$product->title}}</h1>
                    <h3>{{$product->etitle}}</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-variant dt-sl">
                            <div
                                class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                                <h2>انتخاب رنگ:</h2>
                            </div>
                            <ul class="product-variants float-right ml-3">
                                @foreach($product->colors as $color)
                                    @if($product->productGuaranties()->where('color_id',$color->id)->where('count','>',0)->first())
                                    <li class="ui-variant" wire:click="changeProduct({{$color->id}})">
                                        <label class="ui-variant ui-variant--color">
                                                        <span class="ui-variant-shape"
                                                              style="background-color: {{$color->code}}"></span>
                                            <input type="radio" value="1" name="color"
                                                   class="variant-selector" @if($product->productGuaranties()->where('price',$product->price)->first()->color_id == $color->id) checked @endif>
                                            <span class="ui-variant--check">{{$color->title}}</span>
                                        </label>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-params dt-sl">
                            <ul data-title="ویژگی‌های محصول">
                                @foreach($product->propertyGroups as $propertyGroup)
                                    <li>
                                        <span>{{$propertyGroup->title}} </span>
                                        <span> {{$propertyGroup->properties()->where('product_id',$product->id)->pluck('title')->implode(',')}} </span>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="sum-more">
                                                <span class="show-more btn-link-border">
                                                    + موارد بیشتر
                                                </span>
                                <span class="show-less btn-link-border">
                                                    - بستن
                                                </span>
                            </div>
                        </div>
                        <div
                            class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                            <h2>کد محصول:225566</h2>
                        </div>
                    </div>
                    <div class="col-lg-6" wire:ignore.self>
                        <div class="product-guaranteed" wire:ignore>
                            <i class="fas fa-badge-check"></i>
                            <p>بیش از ۴۳۰ نفر از خریداران این محصول را پیشنهاد داده‌اند</p>
                        </div>
                        <div class="product-summary" wire:ignore.self>
                            <nav id="stack-menu" wire:ignore.self>
                                <ul wire:ignore.self>
                                    <li wire:ignore>
                                        <a href="#" wire:ignore>
                                            <div class="product-seller-row-main" wire:ignore>
                                                <img src="{{url('frontend/img/seller-logo.png')}}" alt="" wire:ignore>
                                                <div class="product-seller-first-line" wire:ignore>
                                                    فروشنده:
                                                    <span class="product-seller-name">کدیادکالا</span>
                                                </div>
                                                <div class="product-seller-second-line">
                                                    عملکرد:
                                                    <span class="font-weight-bold">۵</span>
                                                    از ۵
                                                    <span>
                                                                        <span class="u-divider"></span>
                                                                        <span class="font-weight-bold">۸۶.۶٪</span>
                                                                        رضایت از کالا
                                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="product-seller-box--shadowed">
                                            <div class="product-info-box-body-wrapper">
                                                <div class="product-info-box-body">
                                                    <div class="product-info-box-row font-weight-bold">
                                                        <span class="seller-name">کدیادکالا</span>
                                                    </div>
                                                    <div class="product-info-box-row">
                                                        عملکرد
                                                        <span
                                                            class="font-weight-bold u-text-big">۵</span>
                                                        از ۵
                                                        <div class="product-info-box-feedbacks">
                                                            <div class="product-feedback">
                                                                <div
                                                                    class="product-feedback-percent product-feedback-percent--green">
                                                                    ۱۰۰٪</div>
                                                                تامین به موقع
                                                            </div>
                                                            <div class="product-feedback">
                                                                <div
                                                                    class="product-feedback-percent product-feedback-percent--green">
                                                                    ۱۰۰٪</div>
                                                                تعهد ارسال
                                                            </div>
                                                            <div class="product-feedback">
                                                                <div
                                                                    class="product-feedback-percent product-feedback-percent--green">
                                                                    ۹۹.۹٪</div>
                                                                بدون مرجوعی
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info-box-row">
                                                                        <span
                                                                            class="font-weight-bold u-text-big">۸۶.۶٪</span>
                                                        رضایت از کالا
                                                        <span class="text-secondary">
                                                                            (<span>۲۱</span> نفر)
                                                                        </span>
                                                        <div class="product-info-box-v-feedbacks">
                                                            <div class="product-v-feedback">
                                                                <div class="product-v-feedback-label">
                                                                    کاملا راضی
                                                                </div>
                                                                <div class="product-v-feedback-bar">
                                                                    <div style="width: 52.38%;"
                                                                         class="product-v-feedback-bar product-v-feedback-bar--very-green">
                                                                    </div>
                                                                </div>
                                                                <div class="product-v-feedback-percent">
                                                                    ۵۲٪</div>
                                                            </div>
                                                            <div class="product-v-feedback">
                                                                <div class="product-v-feedback-label">
                                                                    راضی
                                                                </div>
                                                                <div class="product-v-feedback-bar">
                                                                    <div style="width: 33.33%;"
                                                                         class="product-v-feedback-bar product-v-feedback-bar--green">
                                                                    </div>
                                                                </div>
                                                                <div class="product-v-feedback-percent">
                                                                    ۳۳٪</div>
                                                            </div>
                                                            <div class="product-v-feedback">
                                                                <div class="product-v-feedback-label">
                                                                    نظری ندارم
                                                                </div>
                                                                <div class="product-v-feedback-bar">
                                                                    <div style="width: 9.52%;"
                                                                         class="product-v-feedback-bar product-v-feedback-bar--yellow">
                                                                    </div>
                                                                </div>
                                                                <div class="product-v-feedback-percent">
                                                                    ۱۰٪</div>
                                                            </div>
                                                            <div class="product-v-feedback">
                                                                <div class="product-v-feedback-label">
                                                                    ناراضی
                                                                </div>
                                                                <div class="product-v-feedback-bar">
                                                                    <div style="width: 4.76%;"
                                                                         class="product-v-feedback-bar product-v-feedback-bar--orange">
                                                                    </div>
                                                                </div>
                                                                <div class="product-v-feedback-percent">
                                                                    ۵٪</div>
                                                            </div>
                                                            <div class="product-v-feedback">
                                                                <div class="product-v-feedback-label">
                                                                    کاملا ناراضی
                                                                </div>
                                                                <div class="product-v-feedback-bar">
                                                                    <div style="width: 0;"
                                                                         class="product-v-feedback-bar product-v-feedback-bar--red">
                                                                    </div>
                                                                </div>
                                                                <div class="product-v-feedback-percent">
                                                                    ۰٪</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li wire:ignore.self>
                                        <a wire:ignore.self>
                                            <i class="far fa-shield-check" wire:ignore.self></i>
                                            {{$product_guaranty->guaranty->title}}
                                        </a>
                                    </li>
                                    <li wire:ignore>
                                        <a href="#" wire:ignore.self>
                                            <i class="far fa-box-check product-delivery-warehouse" wire:ignore.self></i>
                                            موجود در انبار کدیادکالا
                                        </a>
                                        <ul class="product-seller-box--shadowed" wire:ignore>
                                            <div class="product-info-box-body-wrapper">
                                                <div class="product-info-box-body">
                                                    <div class="shipment-info-box-row">
                                                        <div class="font-weight-bold">
                                                                            <span>
                                                                                آماده ارسال
                                                                            </span>
                                                        </div>
                                                        <div class="u-text-spaced">
                                                            این کالا در انبار کدیادکالا موجود و آماده
                                                            پردازش است.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="product-seller-row product-seller-row--price" wire:ignore.self>
                                    <div class="product-seller-price-info" wire:ignore.self>
                                        <div class="product-seller-price-prev" wire:ignore.self>
                                            {{(number_format($product_guaranty->main_price))}}
                                        </div>
                                        @if($product_guaranty->discount >0)
                                        <div class="product-seller-price-off" wire:ignore.self>
                                             {{$product_guaranty->discount}}٪
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-seller-price-real" wire:ignore.self>
                                        <div class="product-seller-price-raw" wire:ignore.self>{{number_format($product_guaranty->price)}}</div>
                                        تومان
                                    </div>
                                    <div
                                        class="product-additional-item product-additional-item--no-icon" wire:ignore.self>
                                        <span>{{number_format($product_guaranty->main_price - $product_guaranty->price)}}</span>&nbsp; تومان تخفیف سازمانی کسر گردیده است.
                                    </div>
                                </div>
                                <div class="product-seller-row product-seller-row--add-to-cart" wire:click="addToCart({{$product_guaranty->color_id}}, {{$product_guaranty->guaranty_id}})">
                                    <a style="cursor: pointer;"  class="btn-add-to-cart btn-add-to-cart--full-width" wire:ignore>
                                        <span class="btn-add-to-cart-txt" >افزودن به سبد خرید</span>
                                    </a>
                                    <div class="product-seller-digiclub" wire:ignore>
                                        <img src="{{url('frontend/img/digiclub.png')}}" alt="">
                                        <div>
                                            دریافت
                                            <span>۱۵۰</span>
                                            امتیاز دیجی‌کلاب با خرید این کالا
                                        </div>
                                    </div>
                                </div>
                                <div class="other-seller" wire:ignore.self>
                                    <a href="#">
                                        <div class="product-seller-row-main">
                                                <span class="font-weight-bold">
                                                    <span id="more-suppliers-count">۳</span>
                                                    فروشنده
                                                </span>
                                            دیگر این کالا
                                        </div>
                                        <div class="product-seller-row-info">
                                            مشاهده
                                        </div>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
