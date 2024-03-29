<div class="row">
    <div class="cart-page-content col-xl-9 col-lg-8 col-12 px-0">
        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
            <h2>انتخاب آدرس تحویل سفارش</h2>
        </div>
        <section class="page-content dt-sl">
            <div class="address-section">
                <div class="checkout-contact dt-sn dt-sn--box border px-0 pt-0 pb-0">

                    @if($selected_address)
                        <div class="checkout-contact-content">
                            <ul class="checkout-contact-items">
                                <li class="checkout-contact-item">
                                    گیرنده:
                                    <span class="full-name">{{$selected_address->name}}</span>
                                    <a class="checkout-contact-btn-edit">اصلاح این آدرس</a>
                                </li>
                                <li class="checkout-contact-item">
                                    <div class="checkout-contact-item checkout-contact-item-mobile">
                                        شماره تماس:
                                        <span class="mobile-phone">{{$selected_address->mobile}}</span>
                                    </div>
                                    <div class="checkout-contact-item-message">
                                        کد پستی:
                                        <span class="post-code">{{$selected_address->zip_code}}</span>
                                    </div>
                                    <br>
                                    استان
                                    <span class="state">{{$selected_address->province->province}}</span>
                                    ، ‌شهر
                                    <span class="city">{{$selected_address->city->city}}</span>
                                    ،
                                    <span class="address-part">{{$selected_address->address}}</span>
                                </li>
                            </ul>
                            <a class="checkout-contact-location" id="btn-checkout-contact-location">تغییر
                                آدرس
                                ارسال</a>
                            <div class="checkout-contact-badge">
                                <i class="mdi mdi-check-bold"></i>
                            </div>
                        </div>
                        <div class="checkout-address dt-sn px-0 pt-0 pb-0" id="user-address-list-container">
                            <div class="checkout-address-content">
                                <div class="checkout-address-headline">آدرس مورد نظر خود را جهت تحویل
                                    انتخاب فرمایید:
                                </div>
                                <div class="checkout-address-row">
                                    <div class="checkout-address-col">
                                        <button class="checkout-address-location" data-toggle="modal"
                                                data-target="#modal-location">
                                            <strong>ایجاد آدرس جدید</strong>
                                        </button>
                                    </div>
                                </div>
                                @foreach($addresses as $address)
                                    <div class="checkout-address-row">
                                        <div class="checkout-address-col">
                                            <div class="checkout-address-box @if($address->is_default) is-selected @endif">
                                                <h5 class="checkout-address-title">{{$address->name}}</h5>
                                                <p class="checkout-address-text">
                                                    <span>{{$address->province->province}}، {{$address->city->city}}،{{$address->address}}</span>
                                                </p>
                                                <ul class="checkout-address-list">
                                                    <li>
                                                        <ul class="checkout-address-contact-info">
                                                            <li class="">کدپستی: <span>{{$address->zip_code}}</span></li>
                                                            <li>شماره همراه: <span>{{$address->mobile}}</span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li>
                                                                <button class="checkout-address-btn-edit"
                                                                        wire:click="$emit('editAddress',{{$address->id}})"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-location-edit">ویرایش
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button class="checkout-address-btn-remove"
                                                                        wire:click="$emit('showDeleteAddress',{{$address->id}})"
                                                                        data-toggle="modal"
                                                                        data-target="#remove-location">حذف
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                @if($address->is_default)
                                                    <button class="checkout-address-btn-submit">سفارش به این آدرس
                                                        ارسال می‌شود.
                                                    </button>
                                                @else
                                                    <button wire:click="setDefaultAddress({{$address->id}})" class="checkout-address-btn-submit">ارسال سفارش به این
                                                        آدرس
                                                    </button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="checkout-address-cancel" id="cancel-change-address-btn"></button>
                        </div>
                    @else
                            <div class="checkout-address-col">
                                <button class="checkout-address-location" data-toggle="modal"
                                        data-target="#modal-location">
                                    <strong>ایجاد آدرس جدید</strong>
                                </button>
                            </div>
                    @endif

                    <!-- Start Modal location new -->
                    <livewire:frontend.order.address-modal/>
                    <!-- End Modal location new -->

                    <!-- Start Modal location edit -->
                    <livewire:frontend.order.edit-address-modal/>
                    <!-- End Modal location edit -->

                    <!-- Start Modal remove-location -->
                    <livewire:frontend.order.delete-address-modal/>
                    <!-- End Modal remove-location -->
                </div>
            </div>
            <form method="post" id="shipping-data-form" class="dt-sn dt-sn--box pt-3 pb-3">
                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                    <h2>انتخاب نحوه ارسال</h2>
                </div>
                <div class="checkout-shipment border-bottom pb-3 mb-4">
                    <div class="custom-control custom-radio pl-0 pr-3">
                        <input type="radio" class="custom-control-input" name="send_type" id="radio1" wire:model="send_type"
                               value="usual" checked>
                        <label for="radio1" class="custom-control-label">
                            عادی
                        </label>
                    </div>
                    @error('send_type')  <div class="alert alert-danger">{{$message}}</div> @enderror
                </div>
                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                    <h2>لیست محصولات در سبد خرید</h2>
                </div>
                <div class="checkout-pack" wire:ignore>
                    <section class="products-compact">
                        <!-- Start Product-Slider -->
                        <div class="col-12">
                            <div class="products-compact-slider carousel-md owl-carousel owl-theme">
                                @foreach($carts as $cart)
                                    <div class="item">
                                        <div class="product-card mb-3">
                                            <a class="product-thumb"
                                               href="{{route('single.product',$cart->product->slug)}}">
                                                <img src="{{url('images/products/small/'.$cart->product->image)}}"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="{{route('single.product',$cart->product->slug)}}">{{$cart->product->title}}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Product-Slider -->
                    </section>
                    <hr>
                    <div class="row mx-0">
                        <div class="col-12">
                            <div class="checkout-tab-times dt-sl">
                                <ul class="nav nav-tabs dt-sl" id="myTab" role="tablist">
                                    @for($i=0; $i<5; $i++)
                                        @if(\Carbon\Carbon::now()->addDays($i+$send_day)->dayOfWeek != \Carbon\Carbon::FRIDAY)
                                        <li class="nav-item" wire:click.prevent="receiveDay({{$i}})">
                                            <a class="nav-link @if($i==$selected_day_index) active @endif" id="home-tab" data-toggle="tab"
                                               href="#home" role="tab" aria-controls="home"
                                               aria-selected="true">
                                                {{ \Hekmatinasser\Verta\Verta::instance(\Carbon\Carbon::now()->addDays($i+$send_day))->formatWord('l')}}
                                                <span>{{ \Hekmatinasser\Verta\Verta::instance(\Carbon\Carbon::now()->addDays($i+$send_day))->format('%d %B')}}</span>
                                            </a>
                                        </li>
                                        @endif
                                    @endfor

                                </ul>
                                <div class="tab-content dt-sl" id="myTabContent">
                                    <div class="tab-pane px-2 pt-2 fade show active" id="home"
                                         role="tabpanel" aria-labelledby="home-tab">
                                            <div class="custom-control custom-radio pl-0 pr-3">
                                                <input type="radio" class="custom-control-input" wire:model="receive_time"
                                                       name="receive_time" id="radio4" value="9-12">
                                                <label for="radio4" class="custom-control-label">
                                                    ساعت 12 تا 9
                                                </label>
                                            </div>
                                        <div class="custom-control custom-radio pl-0 pr-3">
                                            <input type="radio" class="custom-control-input" wire:model="receive_time"
                                                   name="receive_time" id="radio5" value="14-18">
                                            <label for="radio5" class="custom-control-label">
                                                ساعت 18 تا 14
                                            </label>
                                        </div>
                                    </div>
                                    @error('receive_time')  <div class="alert alert-danger">{{$message}}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
                    <h2>صدور فاکتور</h2>
                </div>
                <div class="checkout-invoice">
                    <div class="checkout-invoice-headline">
                        <div class="custom-control custom-checkbox pl-0 pr-3">
                            <input type="checkbox" class="form-check-input" @if($request_factor) checked @endif  wire:model="request_factor">
                            <label class="form-check-label" style="margin-right: 15px !important;">درخواست ارسال فاکتور خرید</label>
                        </div>
                        @error('request_factor')  <div class="alert alert-danger">{{$message}}</div> @enderror
                    </div>
                </div>
            </form>
            <div class="mt-5">
                <a href="#" class="float-right border-bottom-dt"><i
                        class="mdi mdi-chevron-double-right"></i>بازگشت به سبد خرید</a>
                <a href="#" class="float-left border-bottom-dt">تایید و ادامه ثبت سفارش<i
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
                <li>
                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip" data-html="true"
                                                           data-placement="bottom"
                                                           title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                            <span class="mdi mdi-information-outline"></span>
                                        </span></span><span>@if($total_price > 150000)
                            رایگان
                        @else
                            {{number_format($send_price)}}
                        @endif</span>
                </li>
                <li class="checkout-club-container">
                                    <span>کدیادکلاب<span class="help-sn" data-toggle="tooltip" data-html="true"
                                                         data-placement="bottom"
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
                    <span class="checkout-summary-price-value-amount">{{number_format($total_price)}}</span>تومان
                </div>
                <a href="#" class="mb-2 d-block" wire:click.prevent="submitOrderInfo">
                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0 pl-0">
                        <i class="mdi mdi-arrow-left"></i>
                        تایید و ادامه ثبت سفارش
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

