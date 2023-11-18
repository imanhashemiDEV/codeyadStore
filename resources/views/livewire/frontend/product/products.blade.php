<div class="col-lg-9 col-md-12 col-sm-12 search-card-res">
    <div class="d-md-none">
        <button class="btn-filter-sidebar">
            جستجوی پیشرفته <i class="fad fa-sliders-h"></i>
        </button>
    </div>
    <div class="dt-sl dt-sn px-0 search-amazing-tab">
        <div class="ah-tab-wrapper dt-sl">
            <div class="ah-tab dt-sl">
                <a class="ah-tab-item" wire:click.prevent="allProducts" @if(count($products)>0) data-ah-tab-active="true" @endif  href="">مرتبط ترین</a>
                <a class="ah-tab-item" wire:click.prevent="moreViewedProducts" @if(count($moreViewedProducts)>0) data-ah-tab-active="true" @endif  href="">پربازدید ترین</a>
                <a class="ah-tab-item" wire:click.prevent="newestProducts"  @if(count($newestProducts)>0) data-ah-tab-active="true" @endif href="">جدید ترین</a>
                <a class="ah-tab-item" wire:click.prevent="moreSoldProducts"  @if(count($moreSoldProducts)>0) data-ah-tab-active="true" @endif href="">پرفروش ترین</a>
                <a class="ah-tab-item" wire:click.prevent="cheapestProducts"  @if(count($cheapestProducts)>0) data-ah-tab-active="true" @endif href="">ارزان ترین</a>
                <a class="ah-tab-item" wire:click.prevent="mostExpensiveProducts"  @if(count($mostExpensiveProducts)>0) data-ah-tab-active="true" @endif href="">گران ترین</a>
            </div>
        </div>
        <div class="ah-tab-content-wrapper dt-sl px-res-0">
            <div class="ah-tab-content dt-sl" @if(count($products)>0) data-ah-tab-active="true" @endif>
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
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" wire:click="compareProducts({{$product->id}})"
                                                   id="customCheck{{$product->id}}">
                                            <label class="form-check-label"
                                                   for="customCheck{{$product->id}}">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}"> {{$product->title}}</a>
                                    </h5>
                                    <a class="product-meta" href="#">{{$product->category->title}}</a>
                                    <span class="product-price">{{$product->price}}تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(count($products)>0)
                        {{$products->links('vendor.pagination.products-pagination.all-products')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl " @if(count($moreViewedProducts)>0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($moreViewedProducts as $product)
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
                                    <a class="product-meta" href="#">{{$product->category->title}}</a>
                                    <span class="product-price">{{$product->price}}تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(count($moreViewedProducts)>0)
                        {{$moreViewedProducts->withQueryString()->links('vendor.pagination.products-pagination.more-viewed-products')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($newestProducts)>0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($newestProducts as $product)
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
                                    <a class="product-meta" href="#">{{$product->category->title}}</a>
                                    <span class="product-price">{{$product->price}}تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(count($newestProducts)>0)
                        {{$newestProducts->links('vendor.pagination.products-pagination.newest-products')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($moreSoldProducts)>0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($moreSoldProducts as $product)
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
                                    <a class="product-meta" href="#">{{$product->category->title}}</a>
                                    <span class="product-price">{{$product->price}}تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(count($moreSoldProducts)>0)
                        {{$moreSoldProducts->links('vendor.pagination.products-pagination.more-sold-products')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($cheapestProducts)>0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($cheapestProducts as $product)
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
                                    <a class="product-meta" href="#">{{$product->category->title}}</a>
                                    <span class="product-price">{{$product->price}}تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(count($cheapestProducts)>0)
                        {{$cheapestProducts->links('vendor.pagination.products-pagination.cheapest-products')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($mostExpensiveProducts)>0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($mostExpensiveProducts as $product)
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
                                    <a class="product-meta" href="#">{{$product->category->title}}</a>
                                    <span class="product-price">{{$product->price}}تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                    @if(count($mostExpensiveProducts)>0)
                    {{$mostExpensiveProducts->links('vendor.pagination.products-pagination.most-expensive-products')}}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
