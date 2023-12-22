<?php

namespace App\Http\Livewire\Frontend\Order;

use App\Models\Address;
use Livewire\Component;

class DeleteAddressModal extends Component
{
    public $address_id;

    protected $listeners=[
        'showDeleteAddress'
    ];

    public function showDeleteAddress($address_id)
    {
        $this->address_id=$address_id;
    }
    public function deleteAddress($address_id)
    {
        Address::destroy($address_id);
        $address = Address::query()->where('user_id',auth()->user()->id)->first();
        $address->update([
            'is_default'=>true
        ]);
        $this->dispatchBrowserEvent('closeDeleteAddressModal');

        $this->emit('refreshCart');
        $this->emit('refreshProfileAddress');
    }

    public function render()
    {
        return view('livewire.frontend.order.delete-address-modal');
    }
}
