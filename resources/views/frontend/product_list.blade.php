@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">
                <!-- Start Sidebar -->
                <div class="col-lg-3 col-md-12 col-sm-12 sticky-sidebar filter-options-sidebar">
                    <div class="d-md-none">
                        <div class="header-filter-options">
                            <span>جستجوی پیشرفته <i class="fad fa-sliders-h"></i></span>
                            <button class="btn-close-filter-sidebar"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                    <div class="dt-sn dt-sn--box mb-3">
                        <form action="">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide">
                                    <h2>فیلتر محصولات</h2>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="widget-search">
                                    <input type="text" name="s"
                                           placeholder="نام محصول یا برند مورد نظر را بنویسید...">
                                    <button class="btn-search-widget">
                                        <img src="./assets/img/theme/search.png" alt="">
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 filter-product mb-3">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                    دسته بندی
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">همه</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">لباس
                                                        مردانه</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">تیشرت
                                                        مردانه</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">شلوار
                                                        مردانه</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">لباس
                                                        زنانه</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck6">
                                                    <label class="custom-control-label"
                                                           for="customCheck6">اکسسوری</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                    برند
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck7">
                                                    <label class="custom-control-label"
                                                           for="customCheck7">همه</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck8">
                                                    <label class="custom-control-label"
                                                           for="customCheck8">پوما</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck9">
                                                    <label class="custom-control-label"
                                                           for="customCheck9">آدیداس</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck10">
                                                    <label class="custom-control-label"
                                                           for="customCheck10">نایک</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                    فروشنده
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck11">
                                                    <label class="custom-control-label"
                                                           for="customCheck11">همه</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck12">
                                                    <label class="custom-control-label" for="customCheck12">کدیاد
                                                        کالا</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck13">
                                                    <label class="custom-control-label" for="customCheck13">فروشنده
                                                        رسمی برند</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                    رنگها
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck14">
                                                    <label class="custom-control-label"
                                                           for="customCheck14">مشکی</label>
                                                    <span class="filter-color"
                                                          style="background-color: rgb(0,0,0)"></span>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck15">
                                                    <label class="custom-control-label" for="customCheck15">نوک
                                                        مدادی</label>
                                                    <span class="filter-color"
                                                          style="background-color: rgb(105,105,105)"></span>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck16">
                                                    <label class="custom-control-label" for="customCheck16">آبی
                                                        روشن</label>
                                                    <span class="filter-color"
                                                          style="background-color: rgb(64,170,255)"></span>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck17">
                                                    <label class="custom-control-label" for="customCheck17">نقره
                                                        ای</label>
                                                    <span class="filter-color"
                                                          style="background-color: rgb(222,222,222)"></span>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck18">
                                                    <label class="custom-control-label"
                                                           for="customCheck18">زرد</label>
                                                    <span class="filter-color"
                                                          style="background-color: rgb(255,255,0)"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mb-1">
                                    <h2>فیلتر براساس قیمت :</h2>
                                </div>
                                <div class="mt-2 mb-2">
                                    <div id="slider-non-linear-step"></div>
                                </div>
                                <div class="mt-2 mb-2 text-center pt-2">
                                    <span>قیمت: </span>
                                    <span class="example-val" id="slider-non-linear-step-value"></span> تومان
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="parent-switcher">
                                    <label class="ui-statusswitcher">
                                        <input type="checkbox" id="switcher-1">
                                        <span class="ui-statusswitcher-slider">
                                                <span class="ui-statusswitcher-slider-toggle"></span>
                                            </span>
                                    </label>
                                    <label class="label-switcher" for="switcher-1">فقط کالاهای موجود</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-info btn-block" type="submit">
                                    فیلتر
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Sidebar -->
                <!-- Start Content -->
                <livewire:frontend.product.products :slug="$slug"/>
                <!-- End Content -->
            </div>
        </div>
    </main>
    <!-- End main-content -->
@endsection

