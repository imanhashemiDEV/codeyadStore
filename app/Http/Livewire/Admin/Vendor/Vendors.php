<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Enums\VendorStatus;
use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class Vendors extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'refreshVendor' => '$refresh',
        'destroyVendor'
    ];

    public function deleteVendor($id)
    {
        $this->dispatchBrowserEvent('deleteVendor',['id'=>$id]);
    }

    public function destroyVendor($id)
    {
        Vendor::destroy($id);
        $this->emit('refreshVendor');
    }
    public function changeStatus($vendor_id)
    {
        $vendor = Vendor::query()->find($vendor_id);
        if($vendor->status == VendorStatus::Active->value){
            $vendor->update([
                'status'=> VendorStatus::InActive->value
            ]);
        }elseif($vendor->status == VendorStatus::InActive->value){
            $vendor->update([
                'status'=> VendorStatus::Active->value
            ]);
        }
    }


    public function render()
    {
        $vendors = Vendor::query()->
        where('title','like','%'.$this->search.'%')->
        paginate(20);
        return view('livewire.admin.vendor.vendors',compact('vendors'));
    }
}
