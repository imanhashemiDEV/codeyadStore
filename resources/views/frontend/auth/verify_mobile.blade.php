@extends('frontend.auth.layouts.master')
@section('content')
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                    <div class="logo-area text-center mb-3">
                        <a href="#"><img src="{{url('frontend/img/logo.png')}}" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="auth-wrapper form-ui border pt-4">
                        <div class="section-title title-wide mb-1 no-after-title-wide">
                            <h2 class="font-weight-bold">تایید شماره</h2>
                        </div>
                        <div class="message-light">
                            برای شماره همراه {{\Illuminate\Support\Facades\Session::get('mobile')}} کد تایید ارسال گردید
                            <a href="#" class="btn-link-border">
                                ویرایش شماره
                            </a>
                        </div>
                        <form action="{{route('verify.code')}}" method="POST">
                            @csrf
                            <div class="form-row-title">
                                <h3>کد تایید را وارد کنید</h3>
                            </div>
                            <div class="form-row">
                                <div class="numbers-verify">
                                    <div class="lines-number-input">
                                        <input name="code[]" type="text" class="line-number" maxlength="1" autofocus="">
                                        <input name="code[]" type="text" class="line-number" maxlength="1">
                                        <input name="code[]" type="text" class="line-number" maxlength="1">
                                        <input name="code[]" type="text" class="line-number" maxlength="1">
                                        <input name="code[]" type="text" class="line-number" maxlength="1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="d-flex align-items-center">
                                    <span class="text-primary btn-link-border ml-1">دریافت مجدد کد تایید</span>
                                    <span>(</span>
                                    <p id="countdown-verify-end"></p>
                                    <span>)</span>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <button type="submit" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                    <i class="fad fa-arrow-right"></i>
                                    تایید و ادامه
                                </button>
                            </div>
                        </form>
                        <div class="form-footer mt-3">
                            <div>
                                <span class="font-weight-bold">کاربر جدید هستید؟</span>
                                <a href="{{route('register')}}" class="mr-3 mt-2">ثبت نام در کدیادکالا</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
