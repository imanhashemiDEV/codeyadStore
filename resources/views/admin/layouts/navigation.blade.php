<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            @hasanyrole("مدیر کل|مدیر کاربران")
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title=" کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('مدیر فروش|مدیر کل')
            <li data-toggle="tooltip" title="فروشگاه">
                <a href="#store" title=" فروشگاه">
                    <i class="icon ti-folder"></i>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('مدیر سفارشات|مدیر کل')
            <li data-toggle="tooltip" title="سفارش‌ها">
                <a href="#orders" title="سفارش‌ها">
                    <i class="icon ti-shopping-cart"></i>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('مدیر انبار|مدیر کل')
            <li data-toggle="tooltip" title="انبار">
                <a href="#vendors" title="انبار">
                    <i class="icon ti-truck"></i>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('فروشنده')
            <li data-toggle="tooltip" title="فروشنده">
                <a href="#seller" title=" فروشنده">
                    <i class="icon ti-panel"></i>
                </a>
            </li>
            @endhasanyrole
        </ul>
        <ul>
            <li data-toggle="tooltip" title="خروج">
                <a href="{{route('logout')}}" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        @hasanyrole('مدیر کاربران|مدیر کل')
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul @if( Request::RouteIs('panel') || Request::RouteIs('users.index') || Request::RouteIs('users.create') ) style="display: block"  @endif>
                    <li><a href="{{route('users.create')}}">ایجاد کاربر</a></li>
                    {{--                    @can('لیست کاربران')--}}
                    <li><a href="{{route('users.index')}}">لیست کاربران</a></li>
                    {{--                        @endcan--}}
                </ul>
            </li>
            <li>
                <a href="#">نقش ها</a>
                <ul>
                    <li><a href="{{route('roles.create')}}">ایجاد نقش</a></li>
                    <li><a href="{{route('roles.index')}}">لیست نقش ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">مجوز ها</a>
                <ul>
                    <li><a href="{{route('permissions.create')}}">ایجاد مجوز</a></li>
                    <li><a href="{{route('permissions.index')}}">لیست مجوز ها</a></li>
                </ul>
            </li>

            <li>
                <a href="#">استان ها</a>
                <ul>
                    <li><a href="{{route('provinces.create')}}">ایجاد استان</a></li>
                    <li><a href="{{route('provinces.index')}}">لیست استان ها</a></li>
                </ul>
            </li>

            <li>
                <a href="#">شهر ها</a>
                <ul>
                    <li><a href="{{route('cities.create')}}">ایجاد شهر</a></li>
                    <li><a href="{{route('cities.index')}}">لیست شهر ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">فروشندگان</a>
                <ul>
                    <li><a href="{{route('panel.sellers')}}">لیست فروشندگان </a></li>
                </ul>
            </li>
        </ul>
        @endhasanyrole
        @hasanyrole('مدیر فروش|مدیر کل')
        <ul id="store">
            <li>
                <a href="#">اسلایدر</a>
                <ul>
                    <li><a href="{{route('sliders.create')}}">ایجاد اسلایدر</a></li>
                    <li><a href="{{route('sliders.index')}}">لیست اسلایدرها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">بنرها</a>
                <ul>
                    <li><a href="{{route('banners.create')}}">ایجاد بنر</a></li>
                    <li><a href="{{route('banners.index')}}">لیست بنرها</a></li>
                </ul>
            </li>
            {{--            @hasanyrole('مدیر فروش')--}}
            <li>
                <a href="#">دسته بندی</a>
                <ul>
                    <li><a href="{{route('categories.create')}}">ایجاد دسته بندی</a></li>
                    <li><a href="{{route('categories.index')}}">لیست دسته بندی</a></li>
                    <li><a href="{{route('livewire.category')}}">دسته بندی با لایووایر</a></li>
                </ul>
            </li>
            {{--            @endhasanyrole--}}
            <li>
                <a href="#">برند ها</a>
                <ul>
                    <li><a href="{{route('brands.create')}}">ایجاد برند</a></li>
                    <li><a href="{{route('brands.index')}}">لیست برندها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">رنگ ها</a>
                <ul>
                    <li><a href="{{route('colors.create')}}">ایجاد رنگ</a></li>
                    <li><a href="{{route('colors.index')}}">لیست رنگ ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">تگ ها</a>
                <ul>
                    <li><a href="{{route('tags.create')}}">ایجاد تگ</a></li>
                    <li><a href="{{route('tags.index')}}">لیست تگ ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">گارانتی ها</a>
                <ul>
                    <li><a href="{{route('guarantees.create')}}">ایجاد گارانتی</a></li>
                    <li><a href="{{route('guarantees.index')}}">لیست گارانتی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">گروه ویژگی ها</a>
                <ul>
                    <li><a href="{{route('property_groups.create')}}">ایجاد گروه ویژگی</a></li>
                    <li><a href="{{route('property_groups.index')}}">لیست گروه ویژگی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">محصولات</a>
                <ul>
                    <li><a href="{{route('products.create')}}">ایجاد محصول</a></li>
                    <li><a href="{{route('products.index')}}">لیست محصولات</a></li>
                </ul>
            </li>
            <li>
                <a href="#">نظرات</a>
                <ul>
                    <li><a href="{{route('users.comments')}}">نظرات محصول</a></li>
                </ul>
            </li>
            <li>
                <a href="#">پرسش و پاسخ</a>
                <ul>
                    <li><a href="{{route('users.questions')}}">پرسش و پاسخ</a></li>
                </ul>
            </li>
            <li>
                <a href="#">تخفیفات</a>
                <ul>
                    <li><a href="{{route('discounts.create')}}">ایجاد تخفیف</a></li>
                    <li><a href="{{route('discounts.index')}}">لیست تخفیف ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">کارت هدیه</a>
                <ul>
                    <li><a href="{{route('gift_carts.create')}}">ایجاد کارت هدیه</a></li>
                    <li><a href="{{route('gift_carts.index')}}">لیست کارتهای هدیه</a></li>
                </ul>
            </li>
            <li>
                <a href="#">کمیسیون ها</a>
                <ul>
                    <li><a href="{{route('commissions.create')}}">ایجاد کمیسیون</a></li>
                    <li><a href="{{route('commissions.index')}}">لیست کمیسیون ها</a></li>
                </ul>
            </li>

        </ul>
        @endhasanyrole
        @hasanyrole('مدیر سفارش‌ها|مدیر کل')
        <ul id="orders">
            <li>
                <a href="#">سفارش‌ها</a>
                <ul>
                    <li><a href="{{route('panel.orders')}}">لیست سفارش‌ها</a></li>
                </ul>
            </li>
        </ul>
        @endhasanyrole
        @hasanyrole('مدیر انبار|مدیر کل')
        <ul id="vendors">
            <li>
                <a href="#">انبار</a>
                <ul>
                    <li><a href="{{route('vendors.create')}}">ایجاد انبار </a></li>
                    <li><a href="{{route('vendors.index')}}">لیست انبارها</a></li>
                </ul>
            </li>
        </ul>
        @endhasanyrole
        @hasanyrole('فروشنده')
        <ul id="seller">
            <li>
                <a href="#">محصولات</a>
                <ul>
                    <li><a href="{{route('products.index')}}">لیست همه محصولات</a></li>
                    <li><a href="{{route('seller.products')}}">لیست محصولات من</a></li>
                </ul>
            </li>
            <li>
                <a href="#">تراکنش ها</a>
                <ul>
                    <li><a href="{{route('seller.transactions')}}">لیست تراکنش ها</a></li>
                </ul>
            </li>
        </ul>
        @endhasanyrole
    </div>
</div>
