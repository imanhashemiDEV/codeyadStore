<div class="col-lg-9 col-md-12 col-sm-12 search-card-res">
    <div class="d-md-none">
        <button class="btn-filter-sidebar">
            جستجوی پیشرفته <i class="fad fa-sliders-h"></i>
        </button>
    </div>
    <div class="dt-sl dt-sn px-0 search-amazing-tab">
        <div class="ah-tab-wrapper dt-sl">
            <div class="ah-tab dt-sl">
                <a class="ah-tab-item" data-ah-tab-active="true" href="">مرتبط ترین</a>
                <a class="ah-tab-item" href="">پربازدید ترین</a>
                <a class="ah-tab-item" href="">جدید ترین</a>
                <a class="ah-tab-item" href="">پرفروش ترین</a>
                <a class="ah-tab-item" href="">ارزان ترین</a>
                <a class="ah-tab-item" href="">گران ترین</a>
            </div>
        </div>
        <div class="ah-tab-content-wrapper dt-sl px-res-0">
            <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                            <div class="product-card mb-2 mx-res-0">
                                @if($product->special_expiration != null && $product->special_expiration > now())
                                    <div class="promotion-badge">
                                        فروش ویژه
                                    </div>
                                @endif
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($product->discount!=0)  <span>{{$product->discount}}%</span> @endif
                                    </div>
                                </div>
                                <a class="product-thumb" href="{{route('single.product',$product->slug)}}">
                                    <img src="{{url('images/products/big/'.$product->image)}}" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <div class="add-to-compare">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck100">
                                            <label class="custom-control-label"
                                                   for="customCheck100">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}"> {{$product->title}}</a>
                                    </h5>
                                    <a class="product-meta" href="shop-categories.html">{{$product->category->title}}</a>
                                    <span class="product-price">{{$product->price}}  تومان  تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl">
                <div class="row mb-3 mx-0 px-res-0">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">170,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">54,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">135,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">145,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/018.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">59,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/020.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl">
                <div class="row mb-3 mx-0 px-res-0">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">135,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">145,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">170,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/018.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">59,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/020.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">54,000 تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl">
                <div class="row mb-3 mx-0 px-res-0">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/018.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">59,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/020.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">54,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">135,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">145,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">170,000 تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl">
                <div class="row mb-3 mx-0 px-res-0">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">170,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">135,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/018.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">59,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/020.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">54,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">145,000 تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl">
                <div class="row mb-3 mx-0 px-res-0">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">145,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">170,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/018.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">59,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="promotion-badge">
                                فروش ویژه
                            </div>
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
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">157,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/020.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">تیشرت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">54,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">کت مردانه</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                <span class="product-price">199,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                        <div class="product-card mb-2 mx-res-0">
                            <div class="product-head">
                                <div class="rating-stars">
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star active"></i>
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <a class="product-thumb" href="shop-single.html">
                                <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                            </a>
                            <div class="product-card-body">
                                <h5 class="product-title">
                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                </h5>
                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                <span class="product-price">135,000 تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
