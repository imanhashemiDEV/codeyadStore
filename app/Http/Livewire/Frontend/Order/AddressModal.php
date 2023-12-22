<?php

namespace App\Http\Livewire\Frontend\Order;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Livewire\Component;

class AddressModal extends Component
{

    public $name;
    public $mobile;
    public $province;
    public $city;
    public $address;
    public $zip_code;

    public $provinces;
    public $cities;

    protected $rules = [
        'name' => 'required',
        'mobile' => 'required|digits:11',
        'province' => 'required',
        'city' => 'required',
        'address' => 'required',
        'zip_code' => 'required|digits:10',
    ];

    public function mount()
    {
        $this->provinces = Province::query()->pluck('province', 'id');
        $this->cities = collect();
    }

    public function changeProvince($province_id)
    {
        $this->cities = City::query()->where('province_id', $province_id)->pluck('city', 'id');
    }

    public function submit()
    {
        $this->validate();
        $address = Address::query()
            ->where('user_id', auth()->user()->id)
            ->where('is_default', true)
            ->first();
        if ($address) {
            $address->update([
                'is_default' => false
            ]);
        }
        Address::query()->create([
            'user_id' => auth()->user()->id,
            'province_id' => $this->province,
            'city_id' => $this->city,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'zip_code' => $this->zip_code,
            'is_default' => true
        ]);


        $this->reset(['name', 'mobile', 'province', 'city', 'address', 'zip_code']);

        $this->dispatchBrowserEvent('closeAddressModal');

        $this->emit('refreshCart');
        $this->emit('refreshProfileAddress');
    }

    public function render()
    {
        return view('livewire.frontend.order.address-modal');
    }
}
