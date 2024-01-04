<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Enums\VendorEventType;
use App\Models\ProductGuaranty;
use App\Models\VendorLog;
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
        'refreshComponent' => '$refresh',
        'refreshVendorList' => '$refresh'
    ];

    public function addToVendor($product_guaranty_id,$product_guaranty_count,$vendor_id)
    {
        VendorProduct::query()->create([
            'vendor_id'=>$vendor_id,
            'product_guaranty_id'=>$product_guaranty_id,
            'count'=>$product_guaranty_count
        ]);

        VendorLog::query()->create([
            'user_id'=>auth()->user()->id,
            'vendor_id'=>$vendor_id,
            'product_guaranty_id'=>$product_guaranty_id,
            'event_type'=>VendorEventType::AddToVendor->value,
            'count'=>$product_guaranty_count
        ]);
        session()->flash('message','محصول به انبار اضافه شد');
    }

    public function deleteFromVendor($vendor_product_id)
    {
        $vendor_product = VendorProduct::query()->find($vendor_product_id);

        VendorLog::query()->create([
            'user_id'=>auth()->user()->id,
            'vendor_id'=>$vendor_product->vendor_id,
            'product_guaranty_id'=>$vendor_product->product_guaranty_id,
            'event_type'=>VendorEventType::RemoveFromVendor->value,
            'count'=>$vendor_product->count
        ]);

          $vendor_product->delete();
        session()->flash('message','محصول از انبار حذف شد');
    }

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
        $existProductsInVendor = VendorProduct::query()->select('product_guaranty_id')->get()->toArray();
        $product_guarantees = ProductGuaranty::query()->whereNotIn('id',$existProductsInVendor)->
        whereHas('product',function ($q){
            $q->where('title','like','%'.$this->search.'%');
        })->
        paginate(5);
        return view('livewire.admin.vendor.products',compact('product_guarantees','vendor_products'));
    }
}
