<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Address;
use Livewire\Component;

class Addresses extends Component
{
    protected $listeners=[
        'refreshProfileAddress'=>'$refresh'
    ];

    public function render()
    {
        $user = auth()->user();
        $addresses = Address::query()->where('user_id',$user->id)->get();
        return view('livewire.frontend.profile.addresses',compact('addresses'));
    }
}
