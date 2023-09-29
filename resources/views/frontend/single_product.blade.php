@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start title - breadcrumb -->
            <div class="title-breadcrumb-special dt-sl mb-3">
                <div class="breadcrumb dt-sl">
                    <nav>
                        <a href="#">موبایل</a>
                        <a href="#">سامسونگ</a>
                        <a href="#">{{$product->etitle}}</a>
                    </nav>
                </div>
            </div>
            <!-- End title - breadcrumb -->
            <!-- Start Product -->
            <livewire:frontend.product.single-product :product="$product"/>
            <!-- sellers -->
            <div class="product-sellers shadow-around mb-5" id="product-seller-all">
                @foreach($product->productGuaranties()->where('price','!=', $product->price)->get() as $productGuaranty)
                    <div class="product-seller">
                        <div class="product-seller-col">
                            <div class="product-seller-title">
                                <div class="icon">
                                    <i class="fas fa-store-alt"></i>
                                </div>
                                <div class="detail">
                                    <div class="name">کدیادکالا <span
                                            class="badge badge-light rounded-pill">برگزیده</span>
                                    </div>
                                    <div class="rating">
                                        <span class="value">۹۰.۲٪</span>
                                        <span class="label">رضایت خریداران</span>
                                        <span class="divider">|</span>
                                        <span class="label">عملکرد</span>
                                        <span class="value">عالی</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-seller-col">
                            <div class="product-seller-conditions">
                                <div class="product-seller-info">
                                    <i class="fad fa-truck-container"></i>
                                    <span>ارسال از کدیادکالا</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-seller-col">
                            <div class="product-seller-guarantee">
                                <div class="product-seller-info">
                                    <i class="fad fa-shield-check"></i>
                                    <span>{{$productGuaranty->guaranty->title}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-seller-col">
                            <div class="product-seller-price-action">
                                <div class="product-seller-price">{{$productGuaranty->price}}<span class="currency">تومان</span></div>
                                <div class="product-seller-action"><a href="#" class="btn btn-outline-danger">افزودن به
                                        سبد</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="dt-sn mb-5 px-0 dt-sl pt-0">
                <!-- Start tabs -->
                <section class="tabs-product-info mb-3 dt-sl">
                    <div class="ah-tab-wrapper border-bottom dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href=""><i
                                    class="mdi mdi-glasses"></i>نقد و بررسی</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-format-list-checks"></i>مشخصات</a>
                            <a class="ah-tab-item" href=""><i
                                    class="mdi mdi-comment-text-multiple-outline"></i>نظرات کاربران</a>
                            <a class="ah-tab-item" href=""><i class="mdi mdi-comment-question-outline"></i>پرسش و
                                پاسخ</a>
                        </div>
                    </div>
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>نقد و بررسی</h2>
                            </div>
                            <div class="product-title dt-sl">
                                <h1>گوشی موبایل سامسونگ مدل Galaxy A50 SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                </h1>
                                <h3>Samsung Galaxy A50 SM-A505F/DS Dual SIM 128GB Mobile Phone</h3>
                            </div>
                            <div class="description-product dt-sl mt-3 mb-3">
                                <div class="container">
                                    <p>سامسونگ سال 2019 را با متنوع کردن هرچند بیشتر سری گوشی‌های A خود آغاز کرد.
                                        این سری از تولیدات سامسونگ به داشتن صفحه‌نمایش بسیار با کیفیت AMOLED و
                                        دوربین‌هایی با امکانات بالا شهرت دارند. در این میان به نظر می‌رسد گوشی
                                        «Galaxy A50» حرف‌های زیادی در هر دوی این زمینه‌ها داشته باشد. گوشی موبایل
                                        Galaxy A50 با صفحه‌نمایش سوپر آمولد طراحی شده است و ظاهر زیبایی دارد.
                                        سامسونگ تلاش کرده است حاشیه را در این تولید جدید خود تا حد امکان کم کند. این
                                        گوشی قاب پشتی از جنس پلاستیک دارد و قاب جلویی آن را شیشه پوشانده که البته
                                        جلوه‌ی زیبایی به گوشی داده است. این محصول سامسونگ با جدیدترین نسخه از
                                        سیستم‌عامل اندروید (Pie) روانه بازار شده است تا از هر نظر گوشی مدرن به‌حساب
                                        بیاید. صفحه‌نمایش استفاده‌شده در این گوشی 6.4 اینچ با رزولوشن FullHD+ است که
                                        با استفاده از فناوری Super AMOLED و پنل OLED تصاویر شفاف و بی‌نظیری را به
                                        نمایش می‌گذارد. این صفحه‌نمایش در هر اینچ 403 پیکسل را نشان می‌دهد که این
                                        یعنی جزئیات و وضوح تصویر عالی است. همچنین روکش این نمایشگر لایه‌ی محافظ
                                        Corning Gorilla Glass است که از خط‌وخش و ضربه جلوگیری می‌کند. تراشه‌ی این
                                        محصول، Exynos 9610 از تراشه‌های 10 نانومتری سامسونگ است که به همراه 4
                                        گیگابایت رم عرضه می‌شود. این تراشه یکی از قوی‌ترین تراشه‌های موجود در حال
                                        حاضر است و برای انجام بازی‌های سنگین و بازکردن چندین برنامه به صورت هم‌زمان
                                        و تماشای ویدئو کاملا مناسب است و کم نمی‌آورد. تراشه‌ی گرافیکی Mali-G72 MP3
                                        هم برای پخش ویدئو و بازی مناسب است. این گوشی در دو ظرفیت 64 و 128 گیگابایتی
                                        عرضه شده است و با استفاده از یک کارت حافظه‌ی جانبی قادر خواهید بود حافظه
                                        داخلی را تا یک ترابایت دیگر هم افزایش دهید. دوربین اصلی A50 سنسور
                                        25مگاپیکسلی دارد و از نوع عریض (Wide) است. دو سنسور 8 و 5 مگاپیکسلی دیگر هم
                                        در کنار این دوربین اصلی مجموعه دوربین‌های قاب پشتی A50 را تشکیل داده‌اند.
                                        دوربین سلفی 25مگاپیکسلی هم در قاب جلویی این گوشی به کار گرفته شده است. باتری
                                        4000 میلی‌آمپرساعتی، پشتیبانی از فناوری شارژ سریع 15 واتی، درگاه USB Type-C
                                        و حسگر اثرانگشت در زیر قاب اصلی هم از دیگر ویژگی‌های این تازه‌وارد است.
                                        سامسونگ در ساخت این گوشی از جدیدترین فناوری‌های ساخت گوشی استفاده کرده است
                                        تا میان‌رده‌ای با قابلیت‌های نزدیک به یک بالارده خوش‌ساخت را روانه بازار
                                        کند.</p>
                                </div>
                            </div>
                            <div class="accordion dt-sl accordion-product" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                Face ID (کسی به‌غیراز تو را نمی‌شناسم)
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="{{url('frontend/img/single-product/1406986.jpg')}}" alt="">
                                            <p>
                                                در فناوری تشخیص چهره‌ی اپل، یک دوربین و
                                                فرستنده‌ی مادون‌قرمز در بالای نمایشگر قرار داده
                                                ‌شده‌ است؛ هنگامی‌که آیفون
                                                می‌خواهد چهره‌ی شما را تشخیص دهد، فرستنده‌ی نوری
                                                نامرئی را به ‌صورت شما می‌تاباند. دوربین
                                                مادون‌قرمز، این نور را تشخیص
                                                داده و با الگویی که قبلا از صورت شما ثبت کرده،
                                                مطابقت می‌دهد و در صورت یکی‌بودن، قفل گوشی را
                                                باز می‌کند. اپل ادعا کرده،
                                                الگوی صورت را با استفاده از سی هزار نقطه ذخیره
                                                می‌کند که دورزدن آن اصلا کار ساده‌ای نیست.
                                                استفاده از ماسک، عکس یا موارد
                                                مشابه نمی‌تواند امنیت اطلاعات شما را به خطر
                                                اندازد؛ اما اگر برادر یا خواهر دوقلو دارید، باید
                                                برای امنیت اطلاعاتتان نگران
                                                باشید.
                                            </p>
                                            <img src="{{url('frontend/img/single-product/1431842.jpg')}}" alt="">
                                            <p>
                                                فقط یک نکته‌ی مثبت در مورد Face ID وجود ندارد؛
                                                بلکه موارد زیادی هستند که دانستن آن‌ها ضروری به
                                                نظر می‌رسد. آیفون 10 فقط
                                                چهره‌ی یک نفر را می‌شناسد و نمی‌توانید مثل
                                                اثرانگشت، چند چهره را به آیفون معرفی کنید تا از
                                                آن‌ها برای بازکردنش استفاده
                                                کنید. اگر آیفون در تلاش اول، صورت شما را نشناسد،
                                                باید نمایشگر را برای شناختن مجدد خاموش و روشن
                                                کنید یا اینکه آن را پایین
                                                ببرید و دوباره روبه‌روی صورتتان قرار دهید. این
                                                تمام ماجرا نیست؛ اگر آیفون 10 بین افراد زیادی که
                                                چهره‌شان را نمی‌شناسد
                                                دست‌به‌دست شود، دیگر به شناخت چهره عکس‌العمل
                                                نشان نمی‌دهد و حتما باید از پین یا پسوورد برای
                                                بازکردن آن استفاده کنید تا
                                                دوباره صورتتان را بشناسد.
                                            </p>
                                            <img src="{{url('frontend/img/single-product/1439653.jpg')}}" alt="">
                                            <p>
                                                اپل سعی کرده نهایت استفاده را از این فناوری جدید
                                                بکند؛ استفاده از آن برای ثبت تصاویر پرتره با
                                                دوربین سلفی، استفاده برای
                                                ساختن شکلک‌های بامزه که آن‌ها را Animoji نامیده
                                                است و همچنین استفاده برای روشن نگه‌داشتن گوشی
                                                زمانی که کاربر به آن نگاه
                                                می‌کند، مواردی هستند که iPhone X به کمک حسگر
                                                اینفرارد، بدون نقص آن‌ها را انجام می‌دهد.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                نمایش‌گر (رنگی‌تر از همیشه)
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="{{url('frontend/img/single-product/1429172.jpg')}}" alt="">
                                            <p>
                                                اولین تجربه‌ی استفاده از پنل‌های اولد سامسونگ
                                                روی گوشی‌های اپل، نتیجه‌ای جذاب برای همه به
                                                همراه آورده است. مهندسی
                                                افزوده‌ی اپل روی این پنل‌ها باعث شده تا غلظت
                                                رنگ‌ها کاملا متعادل باشد، نه مثل آیفون 8 کم باشد
                                                و نه مثل گلکسی S8 اشباع
                                                باشد تا از حد تعادل خارج شود. اپل این نمایشگر را
                                                Super Retina نامیده تا ثابت کند، بهترین نمایشگر
                                                موجود در دنیا را طراحی
                                                کرده و از آن روی iPhone X استفاده کرده است.
                                            </p>
                                            <img src="{{url('frontend/img/single-product/1436228.jpg')}}" alt="">
                                            <p>
                                                این نمایشگر در مقایسه با پنل‌های معمولی، مصرف
                                                انرژی کمتری دارد و این به خاطر استفاده از
                                                پنل‌های اولد است؛ اما این مشخصه
                                                باعث نشده تا نور نمایشگر مثل محصولات دیگری که
                                                پنل اولد دارند کم باشد؛ بلکه این پنل در هر
                                                شرایطی بهترین بازده‌ی ممکن را
                                                دارد. استفاده زیر نور شدید خورشید یا تاریکی مطلق
                                                فرقی ندارد، آیفون 10 خود را با شرایط تطبیق
                                                می‌دهد. این تمام ماجرا نیست.
                                                در نمایشگر آیفون 10 نقطه‌ی حساس به تراز سفیدی
                                                نور محیط قرار داده ‌شده‌اند تا آیفون 10 را با
                                                شرایط نوری محیطی که از آن
                                                استفاده می‌کنید، هماهنگ کند و تراز سفیدی نمایشگر
                                                را به‌صورت خودکار تغییر دهد. این فناوری که با
                                                نام True-Tone نام‌گذاری
                                                شده، کمک می‌کند رنگ‌های نمایشگر در هر نوری
                                                نزدیک‌ترین غلظت و تراز سفیدی ممکن را به رنگ‌های
                                                طبیعی داشته باشد.
                                            </p>
                                            <img src="{{url('frontend/img/single-product/1406339.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                طراحی و ساخت (قربانی کردن سنت برای امروزی شدن)
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="{{url('frontend/img/single-product/1398679.jpg')}}" alt="">
                                            <p>
                                                اپل پا جای پای سامسونگ گذاشته و برای داشتن ظاهری
                                                امروزی و استفاده از جدیدترین فناوری‌های روز، سنت
                                                ده‌ساله‌ی طراحی
                                                گوشی‌هایش را شکسته است. دیگر کلید خانه‌ای وجود
                                                ندارد و تمام قاب جلویی را نمایشگر پر کرده است.
                                                حتی نمایشگر هم برای
                                                استفاده از فناوری تشخیص چهره قربانی شده و قسمت
                                                بالایی آن بریده ‌شده است و لبه‌ی بالایی آن در
                                                مقایسه با هر گوشی دیگری که
                                                تا به امروز دیده بودیم، حالت متفاوتی دارد. ابعاد
                                                iPhone X کمی بزرگ‌تر از ابعاد آیفون 6 است؛ اما
                                                نمایشگرش حدود یک اینچ
                                                بزرگ‌تر از آیفون 6 است. این نشان می‌دهد، فاصله‌ی
                                                لبه‌ها تا نمایشگر تا جای ممکن از طراحی جدیدترین
                                                آیفون اپل حذف‌ شده‌
                                                است.
                                            </p>
                                            <img src="{{url('frontend/img/single-product/1441226.jpg')}}" alt="">
                                            <p>
                                                زبان طراحی جدید، آیفون 10 را به‌طور عجیبی به سمت
                                                تبدیل‌شدنش به یک کالای لوکس پیش برده است. نگاه
                                                کلی به طراحی این گوشی
                                                نشان می‌دهد، اپل سنت‌شکنی کرده و کالایی تولید
                                                کرده تا از هر نظر با نسخه‌های قبلی آیفون متفاوت
                                                باشد. استفاده از شیشه برای
                                                قاب پشتی، فلزی براق برای قاب اصلی، حذف کلید خانه
                                                و در انتها استفاده از نمایشگری بزرگ مواردی هستند
                                                که نشان‌دهنده‌ی تفاوت
                                                iPhone X با نسخه‌های قبلی آیفون است. تمام سطوح
                                                آیفون براق و صیقلی طراحی ‌شده‌اند و تنها برآمدگی
                                                آیفون جدید مربوط به
                                                مجموعه‌ی دوربین آن می‌شود که حدود یک میلی‌متری
                                                از قاب پشتی بیرون زده است. برخلاف آیفون 8پلاس،
                                                دوربین‌های روی قاب پشتی به
                                                حالت عمودی روی قاب پشتی قرار گرفته‌اند.
                                            </p>
                                            <img src="{{url('frontend/img/single-product/1418947.jpg')}}" alt="">
                                            <p>
                                                آیفون جدید در دو رنگ خاکستری و نقره‌ای راهی
                                                بازار شده که در هر دو مدل قاب جلویی به رنگ مشکی
                                                است و این بابت استفاده از
                                                سنسورهای متعدد در بخش بالایی نمایشگر است. برخلاف
                                                تمام آیفون‌های فلزی که تا امروز ساخته‌ شده‌اند،
                                                قاب اصلی از فلزی براق
                                                ساخته ‌شده تا زیر نور خودنمایی کند.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content params dt-sl">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>مشخصات فنی</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h1>{{$product->title}}
                                </h1>
                                <h3>{{$product->etitle}}</h3>
                            </div>
                            <section>
                                <h3 class="params-title">مشخصات کلی</h3>
                                <ul class="params-list">
                                    @foreach($product->propertyGroups as $propertyGroup)
                                        <li>
                                            <div class="params-list-key">
                                                <span class="d-block">{{$propertyGroup->title}}</span>
                                            </div>
                                            @foreach($propertyGroup->properties as $property)
                                                <div class="params-list-value">
                                                <span class="d-block">
                                                    {{$property->title}}
                                                </span>
                                                </div>
                                            @endforeach

                                        </li>
                                    @endforeach
                                </ul>
                            </section>

                        </div>
                        <div class="ah-tab-content comments-tab dt-sl">
                            <div class="section-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>امتیاز کاربران به:</h2>
                            </div>
                            <div class="product-title dt-sl mb-3">
                                <h1>{{$product->title}}
                                </h1>
                                <h3>{{$product->etitle}}<span
                                        class="rate-product">(4 از 5 | 15 نفر)</span></h3>
                            </div>
                            <div class="dt-sl">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <ul class="content-expert-rating">
                                            <li>
                                                <div class="cell">طراحی</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 70%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">ارزش خرید</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 20%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">کیفیت ساخت</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">صدای مزاحم</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">مصرف انرژی و آب</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cell">امکانات و قابلیت ها</div>
                                                <div class="cell">
                                                    <div class="rating rating--general" data-rate-digit="عالی">
                                                        <div class="rating-rate" data-rate-value="100%"
                                                             style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="comments-summary-note">
                                                <span>شما هم می‌توانید در مورد این کالا نظر
                                                    بدهید.</span>
                                            <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود
                                                شوید. اگر این محصول را قبلا از دیجی‌کالا خریده
                                                باشید، نظر
                                                شما به عنوان مالک محصول ثبت خواهد شد.
                                            </p>
                                            <div class="dt-sl mt-2">
                                                <a href="#" class="btn-primary-cm btn-with-icon">
                                                    <i class="mdi mdi-comment-text-outline"></i>
                                                    افزودن نظر جدید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comments-area dt-sl">
                                    <div
                                        class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                        <h2>نظرات کاربران</h2>
                                        <p class="count-comment">123 نظر</p>
                                    </div>
                                    <ol class="comment-list">

                                        @foreach($product->submittedComments as $comment)
                                            <!-- #comment-## -->
                                            <li>
                                                <div class="comment-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="message-light message-light--purchased">
                                                                خریدار این محصول</div>
                                                            <ul class="comments-user-shopping">
                                                                <li>
                                                                    <div class="cell">رنگ خریداری
                                                                        شده:</div>
                                                                    <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="cell">خریداری شده
                                                                        از:</div>
                                                                    <div class="cell seller-cell">
                                                                        <span class="o-text-blue">دیجی‌کالا</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <div class="message-light message-light--opinion-positive">
                                                                خرید این محصول را توصیه می‌کنم</div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12 comment-content">
                                                            <div class="comment-title">
                                                                {{$product->title}}
                                                            </div>
                                                            <div class="comment-author">
                                                               {{$comment->user->name}}
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6 col-12">
                                                                    <div class="content-expert-evaluation-positive">
                                                                        <span>نقاط قوت</span>
                                                                        <ul>
                                                                            <li>دوربین‌های 4گانه پرقدرت
                                                                            </li>
                                                                            <li>باتری باظرفیت بالا</li>
                                                                            <li>حسگر اثرانگشت زیر قاب
                                                                                جلویی</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6 col-12">
                                                                    <div class="content-expert-evaluation-negative">
                                                                        <span>نقاط ضعف</span>
                                                                        <ul>
                                                                            <li>نرم‌افزار دوربین</li>
                                                                            <li>نبودن Nano SD در بازار
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                {{$comment->body}}
                                                            </p>

                                                            <div class="footer">
                                                                <div class="comments-likes">
                                                                    آیا این نظر برایتان مفید بود؟
                                                                    <button class="btn-like" data-counter="۱۱">بله
                                                                    </button>
                                                                    <button class="btn-like" data-counter="۶">خیر
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content dt-sl">
                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <h2>پرسش و پاسخ</h2>
                                <p class="count-comment">پرسش خود را در مورد محصول مطرح نمایید</p>
                            </div>
                            <div class="form-question-answer dt-sl mb-3">
                                <form action="">
                                    <textarea class="form-control mb-3" rows="5"></textarea>
                                    <button class="btn btn-dark float-right ml-3" disabled="">ثبت پرسش</button>
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">اولین پاسخی که به
                                            پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.</label>
                                    </div>
                                </form>
                            </div>
                            <div class="comments-area default">
                                <div
                                    class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                    <h2>پرسش ها و پاسخ ها</h2>
                                    <p class="count-comment">123 پرسش</p>
                                </div>
                                <ol class="comment-list">
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">حسن</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                        ا ۱۳۹۶ در ۹:۴۱ ب.ظ
                                                    </a>
                                                </div>
                                            </div>



                                            <p>لورم ایپسوم متن ساختگی</p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                    </li>
                                    <!-- #comment-## -->
                                    <li>
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <span class="icon-comment">?</span>
                                                <cite class="fn">رضا</cite>
                                                <span class="says">گفت:</span>
                                                <div class="commentmetadata">
                                                    <a href="#">
                                                         ۱۳۹۶ در ۹:۴۲ ب.ظ
                                                    </a>
                                                </div>
                                            </div>
                                            <p>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                صنعت چاپ و با استفاده از طراحان گرافیک است.
                                            </p>

                                            <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                        </div>
                                        <ol class="children">
                                            <li>
                                                <div class="comment-body">
                                                    <div class="comment-author">
                                                            <span
                                                                class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                        <cite class="fn">بهرامی راد</cite> <span
                                                            class="says">گفت:</span>
                                                        <div class="commentmetadata">
                                                            <a href="#">
                                                                 ۱۳۹۶ در ۹:۴۷ ب.ظ
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی
                                                        نامفهوم از صنعت چاپ و با استفاده از
                                                        طراحان گرافیک است.
                                                        چاپگرها و متون بلکه روزنامه و مجله در
                                                        ستون و سطرآنچنان که لازم است و برای
                                                        شرایط فعلی تکنولوژی
                                                        مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                        ابزارهای کاربردی می باشد.</p>

                                                    <div class="reply"><a class="comment-reply-link"
                                                                          href="#">پاسخ</a></div>
                                                </div>
                                                <ol class="children">
                                                    <li>
                                                        <div class="comment-body">
                                                            <div class="comment-author">
                                                                <span class="icon-comment">?</span>
                                                                <cite class="fn">محمد</cite>
                                                                <span class="says">گفت:</span>
                                                                <div class="commentmetadata">
                                                                    <a href="#">
                                                                        ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <p>عالیه</p>

                                                            <div class="reply"><a class="comment-reply-link"
                                                                                  href="#">پاسخ</a></div>
                                                        </div>
                                                        <ol class="children">
                                                            <li>
                                                                <div class="comment-body">
                                                                    <div class="comment-author">
                                                                            <span
                                                                                class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                                        <cite class="fn">اشکان</cite>
                                                                        <span class="says">گفت:</span>
                                                                        <div class="commentmetadata">
                                                                            <a href="#">
                                                                                 ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <p>لورم ایپسوم متن ساختگی با
                                                                        تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از
                                                                        طراحان
                                                                        گرافیک است. چاپگرها و
                                                                        متون بلکه روزنامه و مجله
                                                                        در ستون و سطرآنچنان که
                                                                        لازم است و
                                                                        برای شرایط فعلی تکنولوژی
                                                                        مورد نیاز و کاربردهای
                                                                        متنوع با هدف بهبود
                                                                        ابزارهای
                                                                        کاربردی می باشد.</p>

                                                                    <div class="reply"><a class="comment-reply-link"
                                                                                          href="#">پاسخ</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- #comment-## -->
                                                        </ol>
                                                        <!-- .children -->
                                                    </li>
                                                    <!-- #comment-## -->
                                                </ol>
                                                <!-- .children -->
                                            </li>
                                            <!-- #comment-## -->
                                        </ol>
                                        <!-- .children -->
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End tabs -->
            </div>
            <!-- End Product -->
            <!-- Start Product-Slider -->
            <section class="slider-section dt-sl mb-5">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="section-title text-sm-title title-wide no-after-title-wide">
                            <h2>خریداران این محصول، محصولات زیر را هم خریده‌اند</h2>
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>

                    <!-- Start Product-Slider -->
                    <div class="col-12">
                        <div class="product-carousel carousel-lg owl-carousel owl-theme">
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                        <div class="discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/07.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">157,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/017.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">کت مردانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس مردانه</a>
                                        <span class="product-price">199,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/013.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه مدل هودی تیک تین</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">135,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/09.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">145,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/010.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">170,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                        <div class="discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/011.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">مانتو زنانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس زنانه</a>
                                        <span class="product-price">185,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-card mb-3">
                                    <div class="product-head">
                                        <div class="rating-stars">
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star active"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </div>
                                    <a class="product-thumb" href="#">
                                        <img src="{{url('frontend/img/products/019.jpg')}}" alt="Product Thumbnail">
                                    </a>
                                    <div class="product-card-body">
                                        <h5 class="product-title">
                                            <a href="#">تیشرت مردانه</a>
                                        </h5>
                                        <a class="product-meta" href="#">لباس مردانه</a>
                                        <span class="product-price">54,000 تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product-Slider -->

                </div>
            </section>
            <!-- End Product-Slider -->
        </div>
    </main>
    <!-- End main-content -->
@endsection

