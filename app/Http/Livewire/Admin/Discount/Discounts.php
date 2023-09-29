<?php

namespace App\Http\Livewire\Admin\Discount;

use App\Enums\DiscountStatus;
use App\Enums\UserStatus;
use App\Models\Discount;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Discounts extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyDiscount',
        'refreshComponent' => '$refresh'
    ];

    public function deleteDiscount($id)
    {
        $this->dispatchBrowserEvent('deleteDiscount',['id'=>$id]);
    }

    public function destroyDiscount($id)
    {
        Discount::destroy($id);
        $this->emit('refreshComponent');
    }

    public function chaneDiscountStatus($id)
    {
        $discount = Discount::query()->find($id);
        if($discount->status== DiscountStatus::Active->value){
            $discount->update([
                'status'=>DiscountStatus::InActive->value
            ]);
        }elseif($discount->status== DiscountStatus::InActive->value){
            $discount->update([
                'status'=>DiscountStatus::Active->value
            ]);
        }
    }

    public function render()
    {
        $discounts = Discount::query()->
        where('code','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.discount.discounts', compact('discounts'));
    }
}
