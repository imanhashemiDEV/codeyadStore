<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\ProductGuaranty;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public $product_guaranty;

    public function mount()
    {
        $this->product_guaranty = ProductGuaranty::query()->
        where('product_id',$this->product->id)->
        orderBy('price', 'ASC')->first();
    }

    public function AddFavorite($product_id)
    {
        if(Auth::user()){
            $favorite = Favorite::query()->where([
                'user_id'=> auth()->user()->id,
                'product_id'=>$product_id
            ])->first();
            if($favorite){
                $favorite->delete();
            }else{
                Favorite::query()->create([
                    'user_id'=> auth()->user()->id,
                    'product_id'=>$product_id
                ]);
            }
        }else{
            session()->flash('message','برای اضافه شدن به لیست علاقه مندی ها باید وارد سایت شوید');
        }

    }
    public function changeProduct($color_id)
    {
        $this->product_guaranty = ProductGuaranty::query()->
        where('product_id',$this->product->id)->
            where('color_id',$color_id)->
        orderBy('price', 'ASC')->first();
    }

    public function addToCart($color_id,$guaranty_id)
    {
        if(auth()->user()){
            $cart = Cart::query()->where('user_id',auth()->user()->id)
                ->where('product_id',$this->product->id)
                ->where('color_id',$color_id)
                ->where('guaranty_id',$guaranty_id)
                ->first();
            if($cart){
                $cart->update([
                    'count'=>$cart->count + 1
                ]);
            }else{
                Cart::query()->create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$this->product->id,
                    'color_id'=>$color_id,
                    'guaranty_id'=>$guaranty_id,
                    'count'=>1,
                ]);
            }

            return redirect()->route('user.cart');
        }else{
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.single-product');
    }
}
