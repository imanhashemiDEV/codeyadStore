<?php

namespace App\Http\Livewire\Admin\GiftCart;

use App\Models\GiftCart;
use Livewire\Component;
use Livewire\WithPagination;

class GiftCarts extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyGiftCart',
        'refreshComponent' => '$refresh'
    ];

    public function deleteGiftCart($id)
    {
        $this->dispatchBrowserEvent('deleteGiftCart',['id'=>$id]);
    }

    public function destroyGiftCart($id)
    {
        GiftCart::destroy($id);
        $this->emit('refreshComponent');
    }


    public function render()
    {
        $gifts = GiftCart::query()->
            whereHas('user',function ($q){
             return $q->where('name','like','%'.$this->search.'%');})
            ->orWhere('code','like','%'.$this->search.'%')
            ->orWhere('gift_title','like','%'.$this->search.'%')->
            paginate(10);
        return view('livewire.admin.gift-cart.gift-carts', compact('gifts'));
    }
}
