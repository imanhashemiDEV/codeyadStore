<!-- Start Sidebar -->
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
    <div class="profile-sidebar dt-sl">
        <div class="dt-sl dt-sn border mb-3">
            <div class="profile-sidebar-header dt-sl">
                <div class="d-flex align-items-center">
                    <div class="profile-avatar">
                        <img src="{{url('frontend/img/theme/avatar.png')}}" alt="">
                    </div>
                    <div class="profile-header-content mr-3 mt-2">
                        <span class="d-block profile-username">{{auth()->user()->name}}</span>
                        <span class="d-block profile-phone">{{auth()->user()->mobile}}</span>
                    </div>
                </div>
                <div class="profile-point mt-3 mb-2 dt-sl">
                    <span class="label-profile-point">امتیاز شما:</span>
                    <span class="float-left value-profile-point">120</span>
                </div>
                <div class="profile-link mt-2 dt-sl">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a href="#">
                                <i class="mdi mdi-lock-reset"></i>
                                <span class="d-block">تغییر رمز</span>
                            </a>
                        </div>
                        <div class="col-6 text-center">
                            <a href="{{route('logout')}}">
                                <i class="mdi mdi-logout-variant"></i>
                                <span class="d-block">خروج از حساب</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-sl dt-sn border mb-3">
            <div class="profile-menu-section dt-sl">
                <div class="label-profile-menu mt-2 mb-2">
                    <span>حساب کاربری شما</span>
                </div>
                <div class="profile-menu">
                    <ul>
                        <li>
                            <a href="{{route('profile')}}" @if(\Illuminate\Support\Facades\Route::current()->getName()=='profile') class="active" @endif>
                                <i class="mdi mdi-account-circle-outline"></i>
                                پروفایل
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile.user.company')}}" @if(\Illuminate\Support\Facades\Route::current()->getName()=='profile.user.company') class="active" @endif>
                                <i class="mdi mdi-account-circle-outline"></i>
                                فروشندگی
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile.orders')}}" @if(\Illuminate\Support\Facades\Route::current()->getName()=='profile.orders') class="active" @endif>
                                <i class="mdi mdi-basket"></i>
                                همه سفارش ها
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile.favorites')}}" @if(\Illuminate\Support\Facades\Route::current()->getName()=='profile.favorites') class="active" @endif>
                                <i class="mdi mdi-heart-outline"></i>
                                لیست علاقمندی ها
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile.comments')}}" @if(\Illuminate\Support\Facades\Route::current()->getName()=='profile.comments') class="active" @endif>
                                <i class="mdi mdi-glasses"></i>
                                نقد و نظرات
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile.addresses')}}" @if(\Illuminate\Support\Facades\Route::current()->getName()=='profile.addresses') class="active" @endif>
                                <i class="mdi mdi-sign-direction"></i>
                                آدرس ها
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar -->
