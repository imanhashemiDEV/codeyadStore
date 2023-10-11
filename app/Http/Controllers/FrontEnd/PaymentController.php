<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\CartType;
use App\Enums\OrderDetailStatus;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductGuaranty;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $address = Address::query()->where('user_id', $user->id)
            ->where('is_default', true)->first();
        $carts = Cart::query()->where('user_id', auth()->user()->id)->where('type', CartType::Main->value)->get();

        $total_price = 0;
        $discount_price = 0;
        foreach ($carts as $cart) {
            $product = ProductGuaranty::query()->where([
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'guaranty_id' => $cart->guaranty_id,
            ])->first();
            $total_price += ($product->price) * $cart->count;
            $discount_price += ($product->main_price - $product->price) * $cart->count;
        }

        $order = Order::query()->create([
            'user_id'=>$user->id,
            'order_code'=>rand(11111,99999),
            'status'=>OrderStatus::WaitForPayment->value,
            'address_id'=>$address->id,
            'total_price'=>$total_price,
            'receive_date'=>"",
            'receive_time'=>"",
            'send_type'=>"",
            'discount_price'=>"",
            'discount_code'=>"",
            'gift_cart_price'=>"",
            'gift_cart_code'=>"",
            'payment_type_id'=>""
        ]);

        foreach ($carts as $cart){

            $product =  ProductGuaranty::query()->where('product_id',$cart->product_id)
                ->where('color_id',$cart->color_id)
                ->where('guaranty_id',$cart->guaranty_id)
                ->first();

            OrderDetail::query()->create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'guaranty_id'=>$cart->guaranty_id,
                'main_price'=>$product->main_price,
                'price'=>$product->price,
                'discount'=>$product->discount,
                'count'=>$cart->count,
                'status'=>OrderDetailStatus::Waiting->value,
            ]);
        }

    }

    public function callback()
    {

    }
}
