<div class="row">
    <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
        <section class="page-content dt-sl">
            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                <h2>انتخاب شیوه پرداخت</h2>
            </div>
            <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3 mb-4">
                <div class="checkout-pack">
                    <div class="row">
                        <div class="checkout-time-table checkout-time-table-time">
                            @foreach($payment_types as $payment_type)
                                <div class="col-12 mb-3">
                                    <div class="radio-box custom-control custom-radio pl-0 pr-3">
                                        <input type="radio" class="custom-control-input" wire:model="payment_type"
                                               id="{{$payment_type->driver}}" value="{{$payment_type->driver}}" >
                                        <label for="{{$payment_type->driver}}" class="custom-control-label">
                                            <i
                                                class="mdi mdi-credit-card-multiple-outline checkout-additional-options-checkbox-image"></i>
                                            <div class="content-box">
                                                <div
                                                    class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                                                   {{$payment_type->title}}
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                <h2>خلاصه سفارش</h2>
            </div>
            <div class="dt-sn dt-sn--box pt-3 pb-3">
                <div class="checkout-order-summary">
                    <div class="accordion checkout-order-summary-item" id="accordionExample">
                        <div class="card border-bottom pt-sl-res">
                            <div class="card-header checkout-order-summary-header" id="headingOne">
                                <div class="row">
                                    <div class="col-md-6">
                                                        <span class="text-muted">
                                                             <span class="fs-sm">({{count($carts)}} کالا)</span>
                                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                                        <span class="text-muted">
                                                            <span class="dl-none-sm">نحوه ارسال:</span>
                                                            <span class="dl-none-sm">
                                                               عادی
                                                            </span>
                                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                                        <span class="text-muted">
                                                            <span>ارسال از</span>
                                                            <span class="fs-sm">
                                                                2 روز کاری
                                                            </span>
                                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                                        <span class="text-muted">
                                                            <span>هزینه ارسال</span>
                                                            <span class="fs-sm">
                                                                @if($total_price > 150000)
                                                                    رایگان
                                                                @else
                                                                    {{number_format($send_price)}}
                                                                @endif
                                                            </span>
                                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="row">
                                    @foreach($carts as $cart)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="product-box-container">
                                            <div class="product-box product-box-compact">
                                                <a class="product-box-img">
                                                    <img src="{{url('images/products/small/'.$cart->product->image)}}">
                                                </a>
                                                <div class="product-box-title">
                                                    {{$cart->product->title}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6 col-12">
                    <div class="dt-sn dt-sn--box pt-3 pb-3 px-res-1">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                            <h2>استفاده از کارت هدیه دیجی‌کالا
                                <span class="help-sn" data-toggle="tooltip" data-html="true"
                                      data-placement="bottom"
                                      title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>با استفاده از کد کارت هدیه، تمام یا بخشی از مبلغ سفارش توسط کارت هدیه پرداخت می‌شود.
                                                        در صورت باقی ماندن بخشی از مبلغ کارت هدیه، امکان استفاده از باقی مانده مبلغ برای خریدهای بعدی امکان‌پذیر است.</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                            </h2>
                        </div>
                        <p>با ثبت کد کارت هدیه، مبلغ کارت هدیه از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                        <div class="form-ui">
                            <form wire:submit.prevent="checkGiftCartCode">
                                <div class="row text-center">
                                    <div class="col-xl-8 col-lg-12 px-0">
                                        <div class="form-row">
                                            <input type="text" class="input-ui pr-2" wire:model.defer="gift_cart_code"
                                                   placeholder="مثلا 1234ABCD5678EFGH0123">
                                        </div>
                                        <div>
                                            @if(session()->has('success_gift_cart'))
                                                <div class="alert alert-success">
                                                    {{session('success_gift_cart')}}
                                                </div>
                                            @endif
                                            @if(session()->has('failed_gift_cart'))
                                                <div class="alert alert-danger">
                                                    {{session('failed_gift_cart')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-12 px-0">
                                        <button class="btn btn-primary mt-res-1">ثبت کد هدیه</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="dt-sn dt-sn--box pt-3 pb-3 px-res-1">
                        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
                            <h2>استفاده از کد تخفیف دیجی‌کالا
                                <span class="help-sn" data-toggle="tooltip" data-html="true"
                                      data-placement="bottom"
                                      title="<div class='help-container is-left'><div class='help-arrow'></div><p class='help-text'>بعد از نهایی شدن سفارش کد تخفیف را ثبت نمایید. بعد از ثبت کد تخفیف امکان بازگشت و یا تغییر سبد وجود نخواهد داشت. در صورت تغییر سفارش، کد تخفیف از بین خواهد رفت و امکان اعمال مجدد آن وجود ندارد</p></div>">
                                                    <span class="mdi mdi-information-outline"></span>
                                                </span>
                            </h2>
                        </div>
                        <p>با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می‌شود.</p>
                        <div class="form-ui">
                            <form wire:submit.prevent="checkDiscountCode">
                                <div class="row text-center">
                                    <div class="col-xl-8 col-lg-12 px-0">
                                        <div class="form-row">
                                            <input type="text" class="input-ui pr-2" wire:model.defer="discount_code"
                                                   placeholder="مثلا 837A2CS">
                                        </div>
                                        <div>
                                            @if(session()->has('success_discount'))
                                                <div class="alert alert-success">
                                                    {{session('success_discount')}}
                                                </div>
                                            @endif
                                            @if(session()->has('failed_discount'))
                                                    <div class="alert alert-danger">
                                                        {{session('failed_discount')}}
                                                    </div>
                                           @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-12 px-0">
                                        <button class="btn btn-primary mt-res-1">ثبت کد تخفیف</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <a href="#" class="float-right border-bottom-dt"><i
                        class="mdi mdi-chevron-double-right"></i>بازگشت به شیوه ارسال</a>
                <a href="#" class="float-left border-bottom-dt">ثبت نهایی سفارش<i
                        class="mdi mdi-chevron-double-left"></i></a>
            </div>
        </section>
    </div>
    <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
        <div class="dt-sn dt-sn--box border mb-2">
            <ul class="checkout-summary-summary">
                <li>
                    <span>مبلغ کل ({{count($carts)}} کالا)</span><span>{{number_format($total_price)}} تومان</span>
                </li>
                <li class="checkout-summary-discount">
                    <span>سود شما از خرید</span><span>{{number_format($discount_price)}} تومان</span>
                </li>
            </ul>
            <div class="checkout-summary-devider">
                <div></div>
            </div>
            <div class="checkout-summary-content">
                <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                <div class="checkout-summary-price-value">
                    <span class="checkout-summary-price-value-amount">{{number_format($total_price)}}</span>تومان
                </div>
                <a href="{{route('payment')}}" class="mb-2 d-block">
                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                        <i class="mdi mdi-arrow-left"></i>
                        پرداخت و ثبت نهایی سفارش
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
                    <img src="{{url('frontend/img/svg/return-policy.svg')}}" alt="">
                    هفت روز ضمانت تعویض
                </li>
                <li class="checkout-feature-aside-item">
                    <img src="{{url('frontend/img/svg/payment-terms.svg')}}" alt="">
                    پرداخت در محل با کارت بانکی
                </li>
                <li class="checkout-feature-aside-item">
                    <img src="{{url('frontend/img/svg/delivery.svg')}}" alt="">
                    تحویل اکسپرس
                </li>
            </ul>
        </div>
    </div>
</div>
