<?php

namespace App\Http\Livewire\Admin\GiftCart;

use App\Helpers\DateManager;
use App\Helpers\UniqueCodeGenerator;
use App\Models\Discount;
use App\Models\GiftCart;
use App\Models\User;
use Livewire\Component;

class AddGiftCart extends Component
{
    public $users;
    public $selected_user;
    public $search;
    public $gift_title;
    public $gift_price;
    public $expiration_date;
    public function mount()
    {
        $this->users = collect();
        $this->selected_user=null;
    }

    public function submit()
    {
        $this->users = User::query()->
        where('name','like','%'.$this->search.'%')->
        Orwhere('mobile','like','%'.$this->search.'%')->
        Orwhere('email','like','%'.$this->search.'%')->
        get();
    }

    public function selectUser($user)
    {
        $this->selected_user=$user;
    }

    public function addGiftCart()
    {
        GiftCart::query()->create([
            'code'=>UniqueCodeGenerator::generateRandomString(6,Discount::class),
            'gift_title'=>$this->gift_title,
            'gift_price'=>$this->gift_price,
            'expiration_date'=> DateManager::shamsi_to_miladi($this->expiration_date),
        ]);
    }
    public function render()
    {
        return view('livewire.admin.gift-cart.add-gift-cart');
    }
}
