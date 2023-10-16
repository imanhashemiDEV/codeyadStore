<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\CartType;
use App\Enums\OrderDetailStatus;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\GiftCart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductGuaranty;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentController extends Controller
{
    public function payment()
    {
        $shop_data = Session::get('shop_data');
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

        // gift cart calculation
        if($shop_data['gift_cart_code']){
            $gift_cart = GiftCart::query()
                ->where('code', $shop_data['gift_cart_code'])
                ->where('user_id', auth()->user()->id)
                ->where('expiration_date','>=', Carbon::now()->toDateTimeString())
                ->first();
            if ($gift_cart) {
                $this->total_price -= $gift_cart->gift_price;
                $this->discount_price += $gift_cart->gift_price;
                $gift_cart_price = $gift_cart->gift_price;
            }
        }else{
            $gift_cart_price =0;
        }


        // discount calculation
        if($shop_data['discount_code']){
            $discount = Discount::query()
                ->where('code', $shop_data['discount_code'])
                ->where('expiration_date','>=', Carbon::now()->toDateTimeString())
                ->first();
            if ($discount) {
                $this->total_price -= $discount->discount;
                $this->discount_price += $discount->discount;
                $discount_price = $discount->discount;
            }
        }else{
            $discount_price = 0 ;
        }


        $order = Order::query()->create([
            'user_id'=>$user->id,
            'order_code'=>rand(11111,99999),
            'status'=>OrderStatus::WaitForPayment->value,
            'address_id'=>$address->id,
            'total_price'=>$total_price,
            'receive_date'=>$shop_data['receive_day'],
            'receive_time'=>$shop_data['receive_time'],
            'send_type'=>$shop_data['send_type'],
            'discount_price'=>$discount_price,
            'discount_code'=>$shop_data['discount_code'],
            'gift_cart_price'=>$gift_cart_price,
            'gift_cart_code'=>$shop_data['gift_cart_code'],
            'payment_type_id'=>$shop_data['payment_type']
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

        return Payment::purchase(
            (new Invoice)->amount($total_price),
            function ($driver,$transactionId) use ($order){
                $order->update(['transaction_id'=>$transactionId]);
            })->pay()->render();
    }

    public function callback(Request $request)
    {
        $authority = $request->Authority;
        $order = Order::query()->where('transaction_id', $authority)->first();
        $order_details = OrderDetail::query()->where('order_id', $order->id)->get();
        if($request->Status=="OK"){
            DB::beginTransaction();
            try{

                 $order->update([
                     'status'=>OrderStatus::Payed->value,
                 ]);

                 foreach ($order_details as $order_detail){
                   $order_detail->update([
                       'status'=>OrderDetailStatus::Received->value,
                   ]);
                     $product_guaranty = ProductGuaranty::query()->where([
                         'product_id' => $order_detail->product_id,
                         'color_id' => $order_detail->color_id,
                         'guaranty_id' => $order_detail->guaranty_id,
                     ])->first();
                     $product_guaranty->update([
                         'count'=> $product->count - $order_detail->count
                     ]);

                     $product= Product::query()->find($order_detail->product_id);
                     $product->update([
                         'sold'=>$product->sold + $order_detail->count
                     ]);
                 }


                DB::commit();
                return view('frontend.shipping_result');
            }catch (\Exception $exception){
                DB::rollBack();
                return view('frontend.shipping_result');
            }

        }else{
          return view('frontend.shipping_result');
        }
    }
}
