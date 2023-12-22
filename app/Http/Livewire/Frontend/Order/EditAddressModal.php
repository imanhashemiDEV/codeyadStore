<?php

namespace App\Http\Livewire\Frontend\Order;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Livewire\Component;

class EditAddressModal extends Component
{
    public  $name;
    public  $mobile;
    public  $province;
    public  $city;
    public  $address;
    public  $zip_code;

    public $provinces;
    public $cities;

    public $address_id;

    protected $rules = [
        'name'=>'required',
        'mobile'=>'required|digits:11',
        'province'=>'required',
        'city'=>'required',
        'address'=>'required',
        'zip_code'=>'required|digits:10',
    ];

    protected $listeners=[
       'editAddress'
    ];

    public function mount()
    {
        $this->provinces = Province::query()->pluck('province', 'id');
        $this->cities = collect();
    }

    public function editAddress($address_id)
    {
        $address = Address::query()->find($address_id);
        $this->address_id=$address_id;
        $this->name=$address->name;
        $this->mobile=$address->mobile;
        $this->province=$address->province_id;
        $this->city=$address->city_id;
        $this->address=$address->address;
        $this->zip_code=$address->zip_code;
        $this->cities = City::query()->where('province_id',$address->province_id)->pluck('city', 'id');

    }

    public function changeProvince($province_id)
    {
        $this->cities = City::query()->where('province_id',$province_id)->pluck('city', 'id');
    }

    public function submit()
    {
        $this->validate();
        $prv_address = Address::query()
            ->where('user_id',auth()->user()->id)
            ->where('is_default',true)
            ->first();
        if($prv_address){
            $prv_address->update([
                'is_default'=>false
            ]);
        }
            $address = Address::query()->find($this->address_id);
             $address->update([
                'province_id'=>$this->province,
                'city_id'=>$this->city,
                'name'=>$this->name,
                'mobile'=>$this->mobile,
                'address'=>$this->address,
                'zip_code'=>$this->zip_code,
                'is_default'=>true
            ]);


        $this->reset(['name','mobile','province','city','address','zip_code']);

        $this->dispatchBrowserEvent('closeEditAddressModal');

        $this->emit('refreshCart');
        $this->emit('refreshProfileAddress');
    }



    public function render()
    {
        return view('livewire.frontend.order.edit-address-modal');
    }
}
