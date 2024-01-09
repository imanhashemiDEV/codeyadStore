<?php

namespace App\Http\Livewire\Seller\Product;

use App\Models\Product;
use App\Models\ProductGuaranty;
use Livewire\Component;
use Livewire\WithPagination;

class SellerProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyProductGuaranty',
        'refreshComponent' => '$refresh'
    ];

    public function deleteProductGuaranty($product_guaranty_id)
    {
        $this->dispatchBrowserEvent('deleteProductGuaranty', ['product_guaranty_id' => $product_guaranty_id]);
    }

    public function destroyProductGuaranty($product_guaranty_id)
    {
        $product_guaranty = ProductGuaranty::query()->find($product_guaranty_id);
        $product_id = $product_guaranty->product_id;
        $product_guaranty->delete();
        $less_price = ProductGuaranty::query()->orderBy('price', "ASC")
            ->where('product_id', $product_id)->first();
        $product = Product::query()->find($product_id);
        if ($less_price) {
            $product->update([
                'price' => $less_price->price,
                'discount' => $less_price->discount,
                'count' => $less_price->count,
                'max_sell' => $less_price->max_sell,
                'guaranty_id' => $less_price->guaranty_id,
                'is_spacial' => $less_price->is_special != null ? $less_price->is_special : false,
                'special_expiration' => $less_price->special_expiration,
            ]);

        } else {
            $product->update([
                'price' => 0,
                'discount' => 0,
                'count' => 0,
                'max_sell' => 0,
                'guaranty_id' => null,
                'is_spacial' => false,
                'special_expiration' => null,
            ]);

        }

        $colors = [];
        if($less_price){
            $product_guarantees = ProductGuaranty::query()
                ->where('product_id', $product_id)
                ->where('guaranty_id', $less_price->guaranty_id)
                ->get();
            foreach ($product_guarantees as $product_guaranty) {
                array_push($colors, $product_guaranty->color_id);
            }
            $product->colors()->sync($colors);
        }


        $this->emit('refreshComponent');
    }

    public function render()
    {
        $product_guarantees = ProductGuaranty::query()
            ->where('user_id', auth()->user()->id)
            ->paginate(10);
        return view('livewire.seller.product.seller-products',compact('product_guarantees'));
    }
}
