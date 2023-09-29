@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    @if($cart_count == 0 )
        <main class="main-content dt-sl mb-3" style="margin-top: 204.5px;">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        <div class="dt sl dt-sn dt-sn--box border pt-3 pb-5">
                            <div class="cart-page cart-empty">
                                <div class="circle-box-icon">
                                    <i class="mdi mdi-cart-remove"></i>
                                </div>
                                <p class="cart-empty-title">سبد خرید شما خالیست!</p>
                                <p>می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید:</p>
                                <div class="cart-empty-links mb-5">
                                    <a href="#" class="border-bottom-dt">لیست مورد علاقه من</a>
                                    <a href="#" class="border-bottom-dt">محصولات شگفت‌انگیز</a>
                                    <a href="#" class="border-bottom-dt">محصولات پرفروش روز</a>
                                </div>
                                <a href="#" class="btn-primary-cm">ادامه خرید در کدیادکالا</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @else
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <livewire:frontend.cart.cart-detail/>
            </div>
        </main>
    @endif

@endsection

