<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Enums\CartType;
use App\Models\Cart;
use App\Models\ProductGuaranty;
use Livewire\Component;

class CartDetail extends Component
{

    protected $listeners = [
        'refreshCart' => '$refresh'
    ];
    public function increaseCart($product_id,$color_id,$guaranty_id)
    {
        $cart = Cart::query()->where('user_id',auth()->user()->id)
            ->where('product_id',$product_id)
            ->where('color_id',$color_id)
            ->where('guaranty_id',$guaranty_id)
            ->first();
        $product_guaranty = ProductGuaranty::query()
            ->where('product_id',$product_id)
            ->where('color_id',$color_id)
            ->where('guaranty_id',$guaranty_id)
            ->first();
        if($cart &&   $cart->count < $cart->product->max_sell && $product_guaranty->count > $cart->count){
            $cart->update([
                'count'=>$cart->count + 1
            ]);
        }
        $this->emit('refreshCart');
    }

    public function decreaseCart($product_id,$color_id,$guaranty_id)
    {
        $cart = Cart::query()->where('user_id',auth()->user()->id)
            ->where('product_id',$product_id)
            ->where('color_id',$color_id)
            ->where('guaranty_id',$guaranty_id)
            ->first();
        if($cart && $cart->count > 1 ){
            $cart->update([
                'count'=>$cart->count - 1
            ]);
        }else{
            $cart->delete();
        }

        $this->emit('refreshCart');
    }

    public function moveToReserveCart($cart_id)
    {
       $cart = Cart::query()->find($cart_id);
        $cart->update([
            'type'=>CartType::Reserve->value
        ]);
        $this->emit('refreshCart');
    }

    public function moveToMainCart($cart_id)
    {
        $cart = Cart::query()->find($cart_id);
        $cart->update([
            'type'=>CartType::Main->value
        ]);
        $this->emit('refreshCart');
    }

    public function moveAllToMainCart()
    {
        $carts = Cart::query()->where('type',CartType::Reserve->value)
            ->where('user_id',auth()->user()->id)->get();
        foreach ($carts as $cart){
            $cart->update([
                'type'=>CartType::Main->value
            ]);
        }
        $this->emit('refreshCart');
    }

    public function deleteCart($cart_id)
    {
        $cart = Cart::query()->find($cart_id);
        $cart->delete();
        $this->emit('refreshCart');
    }

    public function render()
    {
        $carts = Cart::query()->where('type',CartType::Main->value)->get();
        $reserved_carts = Cart::query()->where('type',CartType::Reserve->value)->get();
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
        return view('livewire.frontend.cart.cart-detail', compact('carts','reserved_carts','total_price','discount_price'));
    }
}
