<div class="nav-item cart--wrapper">
    <a class="nav-link" href="#">
        <span class="label-dropdown">سبد خرید</span>
        <i class="mdi mdi-cart-outline"></i>
        <span class="count">{{count($carts)}}</span>
    </a>
    <div class="header-cart-info">
        <div class="header-cart-info-header">
            <div class="header-cart-info-count">
                {{count($carts)}}   کالا
            </div>
            <a href="{{route('user.cart')}}" class="header-cart-info-link">
                <span>مشاهده سبد خرید</span>
            </a>
        </div>
        <ul class="header-basket-list do-nice-scroll">
            @foreach($carts as $cart)
                <li class="cart-item">
                    <a href="#" class="header-basket-list-item">
                        <div class="header-basket-list-item-image">
                            <img src="{{url('images/products/small/'.$cart->product->image)}}" alt="">
                        </div>
                        <div class="header-basket-list-item-content">
                            <p class="header-basket-list-item-title">
                                {{$cart->product->title}}
                            </p>
                            <div class="header-basket-list-item-footer">
                                <div class="header-basket-list-item-props">
                                                            <span class="header-basket-list-item-props-item">
                                                                {{$cart->count}} x
                                                            </span>
                                    <span class="header-basket-list-item-props-item">
                                                                <div class="header-basket-list-item-color-badge"
                                                                     style="background: {{$cart->color->code}}"></div>
                                                                {{$cart->color->title}}
                                                            </span>
                                </div>
                                <button wire:click="deleteCart({{$cart->id}})" class="header-basket-list-item-remove">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach

        </ul>
       @if(count($carts) > 0 )
            <div class="header-cart-info-footer">
                <div class="header-cart-info-total">
                    <span class="header-cart-info-total-text">مبلغ قابل پرداخت:</span>
                    <p class="header-cart-info-total-amount">
                                                <span class="header-cart-info-total-amount-number">
                                                    {{number_format($total_price)}} <span>تومان</span></span>
                    </p>
                </div>

                <div>
                    <a href="{{route('user.shipping')}}" class="header-cart-info-submit">
                        ثبت سفارش
                    </a>
                </div>
            </div>
        @else
            <div class="header-cart-info-footer">
                <div class="header-cart-info-total">
                    <span class="header-cart-info-total-text">سبد خرید شما خالی است</span>
                </div>
            </div>
        @endif
    </div>
</div>
