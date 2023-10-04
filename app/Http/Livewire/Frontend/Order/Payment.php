<?php

namespace App\Http\Livewire\Frontend\Order;

use App\Enums\CartType;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\GiftCart;
use App\Models\PaymentType;
use App\Models\ProductGuaranty;
use Livewire\Component;

class Payment extends Component
{
    public $payment_type;

    public function checkDiscountCode($code)
    {
        $discount = Discount::query()->where('code',$code)->first();
    }

    public function checkGiftCartCode($code)
    {
       $gift_cart = GiftCart::query()->where('code',$code)->first();
    }
    public function render()
    {
        $payment_types = PaymentType::query()->get();
        $carts = Cart::query()->where('type',CartType::Main->value)->get();
        $total_price=0;
        $discount_price=0;
        foreach ($carts as $cart ){
            $product = ProductGuaranty::query()->where([
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'guaranty_id'=>$cart->guaranty_id,
            ])->first();
            $total_price += ($product->price) * $cart->count;
            $discount_price += ($product->main_price - $product->price) * $cart->count;
        }
        return view('livewire.frontend.order.payment',
            compact('carts','total_price',
            'discount_price','payment_types'
        ));
    }
}
