<div class="row">
    @foreach($favorites as $favorite)
        <div class="col-lg-6 col-md-12">
            <div class="card-horizontal-product border-bottom rounded-0">
                <div class="card-horizontal-product-thumb">
                    <a href="#">
                        <img src="{{url('images/products/big/'.$favorite->product->image)}}" alt="">
                    </a>
                </div>
                <div class="card-horizontal-product-content">
                    <div class="card-horizontal-product-title">
                        <a href="#">
                            <h3>{{$favorite->product->title}}</h3>
                        </a>
                    </div>
                    <div class="rating-stars">
                        <i class="mdi mdi-star active"></i>
                        <i class="mdi mdi-star active"></i>
                        <i class="mdi mdi-star active"></i>
                        <i class="mdi mdi-star active"></i>
                        <i class="mdi mdi-star"></i>
                    </div>
                    <div class="card-horizontal-product-price">
                        <span>{{$favorite->product->price}} تومان</span>
                    </div>
                    <div class="card-horizontal-product-buttons">
                        <a href="{{route('single.product',$favorite->product->slug)}}" class="btn">مشاهده محصول</a>
                        <button class="remove-btn" wire:click="deleteFavorite({{$favorite->product->id}})">
                            <i class="mdi mdi-trash-can-outline"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
