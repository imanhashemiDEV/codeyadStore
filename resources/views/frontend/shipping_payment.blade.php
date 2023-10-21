@extends('frontend.layouts.master')
@section('content')
    <div class="wrapper shopping-page">
        <!-- Start header-shopping -->
        <header class="header-shopping dt-sl">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center pt-2">
                        <div class="header-shopping-logo dt-sl">
                            <a href="#">
                                <img src="{{url('frontend/img/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <ul class="checkout-steps">
                            <li>
                                <a href="#" class="active">
                                    <span>اطلاعات ارسال</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#" class="active">
                                    <span>پرداخت</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>اتمام خرید و ارسال</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- End header-shopping -->
        <!-- Start main-content -->
        <main class="main-content dt-sl mt-4 mb-3">
            <div class="container main-container">
                <livewire:frontend.order.payment/>
            </div>
        </main>
        <!-- End main-content -->
        <!-- Start mini-footer -->
        <footer class="mini-footer dt-sl">
            <div class="container main-container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-left">
                        <i class="mdi mdi-phone-outline"></i>
                        شماره تماس : <a href="#">
                            ۶۱۹۳۰۰۰۰
                            - ۰۲۱
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <i class="mdi mdi-email-outline"></i>
                        آدرس ایمیل : <a href="#">info@gmail.com</a>
                    </div>
                    <div class="col-12 text-center mt-2">
                        <p class="text-secondary text-footer">
                            استفاده از کارت هدیه یا کد تخفیف، درصفحه ی پرداخت امکان پذیر است.
                        </p>
                    </div>
                    <div class="col-12 text-center">
                        <div class="copy-right-mini-footer">
                            Copyright © 2019 codeyadkala
                        </div>
                    </div>
                </div>
            </div>
        </footer>
@endsection

