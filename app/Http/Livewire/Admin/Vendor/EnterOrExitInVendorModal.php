<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Enums\VendorEventType;
use App\Models\ProductGuaranty;
use App\Models\VendorLog;
use App\Models\VendorProduct;
use Livewire\Component;

class EnterOrExitInVendorModal extends Component
{

    public $type='enter';
    public $count,$title,$product_guaranty,$vendor_product;

    protected $listeners=[
        'enterOrExitInVendor'
    ];
    public function enterOrExitInVendor($product_guaranty_id,$vendor_id)
    {
        $this->vendor_product = VendorProduct::query()
            ->where('vendor_id',$vendor_id)
            ->where('product_guaranty_id',$product_guaranty_id)
            ->first();
        $this->product_guaranty = ProductGuaranty::query()->find($product_guaranty_id);
        $this->title = $this->product_guaranty->product->title;

    }

    public function submitEnterOrExit()
    {

       if($this->type==VendorEventType::Enter->value){

           $this->product_guaranty->update([
               'count'=>$this->product_guaranty->count + $this->count
           ]);

           $this->vendor_product->update([
               'count'=>$this->vendor_product->count + $this->count
           ]);

           VendorLog::query()->create([
               'user_id'=>auth()->user()->id,
               'vendor_id'=>$this->vendor_product->vendor_id,
               'product_guaranty_id'=>$this->product_guaranty->id,
               'event_type'=>VendorEventType::Enter->value,
               'count'=>$this->count
           ]);

           $this->dispatchBrowserEvent('closeModal');
           $this->emit('refreshVendorList');
           $this->reset('count','type');
       }else{
           $this->product_guaranty->update([
               'count'=>$this->product_guaranty->count - $this->count
           ]);
           $this->vendor_product->update([
               'count'=>$this->vendor_product->count - $this->count
           ]);

           VendorLog::query()->create([
               'user_id'=>auth()->user()->id,
               'vendor_id'=>$this->vendor_product->vendor_id,
               'product_guaranty_id'=>$this->product_guaranty->id,
               'event_type'=>VendorEventType::Exit->value,
               'count'=>$this->count
           ]);

           $this->dispatchBrowserEvent('closeModal');
           $this->emit('refreshVendorList');
           $this->reset('count','type');
       }
    }
    public function render()
    {
        return view('livewire.admin.vendor.enter-or-exit-in-vendor-modal');
    }
}
