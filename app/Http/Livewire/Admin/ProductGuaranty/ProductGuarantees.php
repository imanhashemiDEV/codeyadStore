<?php

namespace App\Http\Livewire\Admin\ProductGuaranty;

use App\Enums\ProductStatus;
use App\Helpers\DateManager;
use App\Models\Product;
use App\Models\ProductGuaranty;
use Livewire\Component;
use Livewire\WithPagination;

class ProductGuarantees extends Component
{
    use WithPagination;

    public $product_id;
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

    public function changeProductGuarantyStatus($product_guaranty_id)
    {
        $product = ProductGuaranty::query()->find($product_guaranty_id);
        if($product->status== ProductStatus::Waiting->value){
            $product->update([
                'status'=>ProductStatus::Verified->value
            ]);
        }elseif($product->status== ProductStatus::Verified->value){
            $product->update([
                'status'=>ProductStatus::Rejected->value
            ]);
        }elseif($product->status== ProductStatus::Rejected->value){
            $product->update([
                'status'=>ProductStatus::StopProduction->value
            ]);
        }
        elseif($product->status== ProductStatus::StopProduction->value){
            $product->update([
                'status'=>ProductStatus::Waiting->value
            ]);
        }
    }
    public function render()
    {
        $product_id = $this->product_id;
        if(auth()->user()->is_admin){
            $product_guarantees = ProductGuaranty::query()
                ->where('product_id', $this->product_id)
                ->paginate(10);
        }else{
            $product_guarantees = ProductGuaranty::query()
                ->where('product_id', $this->product_id)
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
        }

        return view('livewire.admin.product-guaranty.product-guarantees', compact('product_guarantees', 'product_id'));
    }
}
