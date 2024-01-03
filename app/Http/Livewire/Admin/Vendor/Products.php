<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Product;
use App\Models\ProductGuaranty;
use App\Models\VendorProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $vendor_id;
    protected $paginationTheme = 'bootstrap';
    public $search,$search_vendor;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function render()
    {
        $vendor_products = VendorProduct::query()->
        where('vendor_id',$this->vendor_id)->
        whereHas('productGuaranty',function ($q){
            $q->whereHas('product',function ($q){
                $q->where('title','like','%'.$this->search_vendor.'%');
            });
        })->
        paginate(5);
        $product_guarantees = ProductGuaranty::query()->
        whereHas('product',function ($q){
            $q->where('title','like','%'.$this->search.'%');
        })->
        paginate(5);
        return view('livewire.admin.vendor.products',compact('product_guarantees','vendor_products'));
    }
}
