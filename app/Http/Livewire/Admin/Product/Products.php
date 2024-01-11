<?php

namespace App\Http\Livewire\Admin\Product;

use App\Enums\ProductStatus;
use App\Models\Product;
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
        if(auth()->user()->is_admin){
            $products = Product::query()->
            where('title','like','%'.$this->search.'%')->
            paginate(10);
        }else{
            $products = Product::query()->
            where('status',ProductStatus::Verified->value)->
            where('title','like','%'.$this->search.'%')->
            paginate(10);
        }
        return view('livewire.admin.product.products', compact('products'));
    }

}
