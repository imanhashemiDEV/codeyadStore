<div class="container main-container">
    <div class="compare">
        <div class="compare-products">
            <h4 class="compare-quick-title">لیست محصولات برای مقایسه</h4>
            <!-- Start Product-Slider -->
            <div class="product-carousel carousel-md owl-carousel owl-theme mb-3">

                @foreach($products as $product)
                <div class="item">
                    <div class="product-card">
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
                        <a class="product-thumb"  href="{{route('single.product',$product->slug)}}">
                            <img src="{{url('images/products/big/'.$product->image)}}" alt="Product Thumbnail">
                        </a>
                        <div class="product-card-body">
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
            <!-- End Product-Slider -->
            <h4 class="compare-quick-title">مشخصات کلی</h4>
            <ul class="compare-quick-list">
                @foreach($propertyGroups as $propertyGroup)
                    <li>
                        <div class="compare-list-title">
                            {{$propertyGroup->title}}
                        </div>
                    </li>
                    <li>
                        @foreach($products as $product)
                            <ul class="list-group w-50">
                                @foreach($product->properties()->where('property_group_id',$propertyGroup->id)->get() as $property)
                                    <li class="list-group-item"><span class="block">{{$property->title}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
