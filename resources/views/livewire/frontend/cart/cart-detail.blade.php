<div class="row mx-0">
    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mb-2">
        <nav class="tab-cart-page">
            <div class="nav nav-tabs border-bottom" id="nav-tab" role="tablist">
                <a class="nav-item nav-link d-inline-flex w-auto active" id="nav-home-tab"
                   data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                   aria-selected="true">سبد خرید<span class="count-cart">{{count($carts)}}</span></a>
                <a class="nav-item nav-link d-inline-flex w-auto" id="nav-profile-tab" data-toggle="tab"
                   href="#nav-profile" role="tab" aria-controls="nav-profile"
                   aria-selected="false">لیست خرید بعدی<span class="count-cart">{{count($reserved_carts)}}</span></a>
            </div>
        </nav>
    </div>
    <div class="col-12">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                 aria-labelledby="nav-home-tab">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-12 px-0">
                        <div class="table-responsive checkout-content dt-sl">
                            <div class="checkout-header checkout-header--express">
                                <span class="checkout-header-title">ارسال عادی</span>
                                <span class="checkout-header-extra-info">({{count($carts)}} کالا)</span>

                                <span wire:loading class="text-danger mr-5">در حال بروزرسانی سبد خرید</span>

                            </div>
                            <div class="checkout-section-content-dd-k">
                                <div class="cart-items-dd-k">
                                    @foreach($carts as $cart)
                                        <div class="cart-item py-4 px-3">
                                            <div class="item-thumbnail">
                                                <a href="#">
                                                    <img src="{{url('images/products/big/'. $cart->product->image)}}" alt="item">
                                                </a>
                                            </div>
                                            <div class="item-info flex-grow-1">
                                                <div class="item-title">
                                                    <h2>
                                                        <a href="#">{{$cart->product->title}}</a>
                                                    </h2>
                                                </div>
                                                <div class="item-detail">
                                                    <ul>
                                                        <li>
                                                                        <span class="color"
                                                                              style="background-color: {{$cart->color->code}};"></span>
                                                            <span>{{$cart->color->title}}</span>
                                                        </li>
                                                        <li>
                                                            <i class="far fa-shield-check text-muted"></i>
                                                            <span>{{$cart->guaranty->title}}</span>
                                                        </li>
                                                        <li>
                                                            <i class="far fa-store-alt text-muted"></i>
                                                            <span>نام فروشنده</span>
                                                        </li>
                                                        <li>
                                                            <i
                                                                class="far fa-clipboard-check text-primary"></i>
                                                            <span>موجود در انبار</span>
                                                        </li>
                                                    </ul>
                                                    <div class="item-quantity--item-price">
                                                        <div class="item-quantity">
                                                            <div class="num-block">
                                                                <div class="num-in">
                                                                    <span wire:click="increaseCart({{$cart->product_id}},{{$cart->color_id}},{{$cart->guaranty_id}})" class="plus"></span>
                                                                    <input type="text"
                                                                           value="{{$cart->count}}" readonly>
                                                                    <span wire:click="decreaseCart({{$cart->product_id}},{{$cart->color_id}},{{$cart->guaranty_id}})" class="minus dis"></span>
                                                                </div>
                                                            </div>

                                                            <button  wire:click="deleteCart({{$cart->id}})" class="item-remove-btn mr-3">

                                                                <i class="far fa-trash-alt text-danger"></i>
                                                                حذف
                                                            </button>
                                                            <button wire:click="moveToReserveCart({{$cart->id}})" class="item-remove-btn mr-3">
                                                                <i class="far fa-retweet-alt text-info"></i>
                                                                انتقال به لیست خرید بعدی
                                                            </button>
                                                        </div>
                                                        <div class="item-price">
                                                            {{number_format($cart->productPrice($cart->product_id,$cart->color_id,$cart->guaranty_id))}}<span
                                                                class="text-sm mr-1">تومان</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                        <div class="dt-sn dt-sn--box border mb-2">
                            <ul class="checkout-summary-summary">
                                <li>
                                    <span>مبلغ کل ({{count($carts)}} کالا)</span><span>{{number_format($total_price)}} تومان</span>
                                </li>
                                <li class="checkout-summary-discount">
                                    <span>سود شما از خرید</span><span> {{number_format($discount_price)}} تومان</span>
                                </li>
                                <li class="checkout-club-container">
                                                    <span>کدیادکلاب<span class="help-sn" data-toggle="tooltip"
                                                                         data-html="true" data-placement="bottom"
                                                                         title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان دیجی کالا (دیجی کلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                                            <span class="mdi mdi-information-outline"></span>
                                                        </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                                </li>
                            </ul>
                            <div class="checkout-summary-devider">
                                <div></div>
                            </div>
                            <div class="checkout-summary-content">
                                <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                <div class="checkout-summary-price-value">
                                    <span class="checkout-summary-price-value-amount">{{number_format($total_price)}}</span>
                                    تومان
                                </div>
                                <a href="{{route('user.shipping')}}" class="mb-2 d-block">
                                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                        <i class="mdi mdi-arrow-left"></i>
                                        ادامه ثبت سفارش
                                    </button>
                                </a>
                                <div>
                                                    <span>
                                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                                        مراحل بعدی را تکمیل کنید.
                                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                 data-placement="bottom"
                                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="dt-sn dt-sn--box checkout-feature-aside pt-4">
                            <ul>
                                <li class="checkout-feature-aside-item">
                                    <img src="./assets/img/svg/return-policy.svg" alt="">
                                    هفت روز ضمانت تعویض
                                </li>
                                <li class="checkout-feature-aside-item">
                                    <img src="./assets/img/svg/payment-terms.svg" alt="">
                                    پرداخت در محل با کارت بانکی
                                </li>
                                <li class="checkout-feature-aside-item">
                                    <img src="./assets/img/svg/delivery.svg" alt="">
                                    تحویل اکسپرس
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                 aria-labelledby="nav-profile-tab">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-12 px-0">
                        <div class="table-responsive checkout-content dt-sl">
                            <div class="checkout-header checkout-header--express">
                                <span class="checkout-header-title">ارسال عادی</span>
                                <span class="checkout-header-extra-info">({{count($reserved_carts)}} کالا)</span>
                                <a wire:click="moveAllToMainCart" class="checkout-add-all-to-cart">
                                    افزودن همه به سبد خرید
                                </a>
                            </div>
                            <div class="checkout-section-content-dd-k">
                                <div class="cart-items-dd-k">
                                    @foreach($reserved_carts as $cart)
                                        <div class="cart-item py-4 px-3">
                                            <div class="item-thumbnail">
                                                <a href="#">
                                                    <img src="{{url('images/products/big/'. $cart->product->image)}}" alt="item">
                                                </a>
                                            </div>
                                            <div class="item-info flex-grow-1">
                                                <div class="item-title">
                                                    <h2>
                                                        <a href="#">{{$cart->product->title}}</a>
                                                    </h2>
                                                </div>
                                                <div class="item-detail">
                                                    <ul>
                                                        <li>
                                                                        <span class="color"
                                                                              style="background-color: {{$cart->color->code}};"></span>
                                                            <span>{{$cart->color->title}}</span>
                                                        </li>
                                                        <li>
                                                            <i class="far fa-shield-check text-muted"></i>
                                                            <span>{{$cart->guaranty->title}}</span>
                                                        </li>
                                                        <li>
                                                            <i class="far fa-store-alt text-muted"></i>
                                                            <span>نام فروشنده</span>
                                                        </li>
                                                        <li>
                                                            <i
                                                                class="far fa-clipboard-check text-primary"></i>
                                                            <span>موجود در انبار</span>
                                                        </li>
                                                    </ul>
                                                    <div class="item-quantity--item-price">
                                                        <div class="item-quantity">
                                                            <div class="num-block">
                                                                <div class="num-in">
                                                                    <span wire:click="increaseCart({{$cart->product_id}},{{$cart->color_id}},{{$cart->guaranty_id}})" class="plus"></span>
                                                                    <input type="text" class="in-num"
                                                                           value="{{$cart->count}}" readonly>
                                                                    <span wire:click="decreaseCart({{$cart->product_id}},{{$cart->color_id}},{{$cart->guaranty_id}})" class="minus dis"></span>
                                                                </div>
                                                            </div>
                                                            <button class="item-remove-btn mr-3">
                                                                <i class="far fa-trash-alt text-danger"></i>
                                                                حذف
                                                            </button>
                                                            <button wire:click="moveToMainCart({{$cart->id}})" class="item-remove-btn mr-3">
                                                                <i class="far fa-retweet-alt text-info"></i>
                                                                انتقال به لیست خرید اصلی
                                                            </button>
                                                        </div>
                                                        <div class="item-price">
                                                            {{number_format($cart->productPrice($cart->product_id,$cart->color_id,$cart->guaranty_id))}}<span
                                                                class="text-sm mr-1">تومان</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                        <div class="dt-sn dt-sn--box border">
                            <div
                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide mb-2">
                                <h2 class="text-dark">لیست خرید بعدی چیست؟</h2>
                            </div>
                            <p class="text-secondary text-justify">
                                شما می‌توانید محصولاتی که به سبد خرید
                                خود افزوده اید و موقتا قصد خرید آن‌ها را ندارید، در لیست خرید بعدی خود
                                قرار داده و
                                هر زمان مایل بودید آن‌ها را مجدداً به سبد خرید اضافه کرده و خرید آن‌ها
                                را تکمیل کنید.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
