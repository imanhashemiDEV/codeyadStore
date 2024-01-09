<?php

namespace App\Http\Livewire\Admin\Product;

use App\Enums\ProductStatus;
use App\Enums\UserStatus;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyProduct',
        'refreshComponent' => '$refresh'
    ];

    public function deleteProduct($id)
    {
        $this->dispatchBrowserEvent('deleteProduct',['id'=>$id]);
    }

    public function destroyProduct($id)
    {
        Product::destroy($id);
        $this->emit('refreshComponent');
    }

    public function chaneProductStatus($product_id)
    {
        $product = Product::query()->find($product_id);
        if($product->status== ProductStatus::Waiting->value){
            $product->update([
                'status'=>ProductStatus::Available->value
            ]);
        }elseif($product->status== ProductStatus::Available->value){
            $product->update([
                'status'=>ProductStatus::UnAvailable->value
            ]);
        }elseif($product->status== ProductStatus::UnAvailable->value){
            $product->update([
                'status'=>ProductStatus::StopProduction->value
            ]);
        }
        elseif($product->status== ProductStatus::StopProduction->value){
            $product->update([
                'status'=>ProductStatus::Rejected->value
            ]);
        }
        elseif($product->status== ProductStatus::Rejected->value){
            $product->update([
                'status'=>ProductStatus::Waiting->value
            ]);
        }
    }
    public function render()
    {
        $products = Product::query()->
        where('title','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.product.products', compact('products'));
    }

}
