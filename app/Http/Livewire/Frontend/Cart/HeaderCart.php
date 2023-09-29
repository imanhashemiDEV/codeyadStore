<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Enums\CartType;
use App\Models\Cart;
use App\Models\ProductGuaranty;
use Livewire\Component;

class HeaderCart extends Component
{

    protected $listeners = [
        'refreshCart' => '$refresh'
    ];

    public function deleteCart($cart_id)
    {
        $cart = Cart::query()->find($cart_id);
        $cart->delete();
        $this->emit('refreshCart');
    }

    public function render()
    {
        $carts = Cart::query()->where('type',CartType::Main->value)->get();
        $total_price=0;
        foreach ($carts as $cart ){
            $product = ProductGuaranty::query()->where([
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'guaranty_id'=>$cart->guaranty_id,
            ])->first();

            $total_price += ($product->price) * $cart->count;
        }
        return view('livewire.frontend.cart.header-cart', compact('carts','total_price'));
    }
}
