<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Enums\CompanyStatus;
use App\Models\Seller;
use Livewire\Component;
use Livewire\WithPagination;

class Sellers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function chaneSellerStatus($id)
    {
        $seller = Seller::query()->find($id);
        if($seller->status== CompanyStatus::Active->value){
            $seller->update([
                'status'=>CompanyStatus::Banned->value
            ]);
        }elseif($seller->status== CompanyStatus::Banned->value){
            $seller->update([
                'status'=>CompanyStatus::Request->value
            ]);
        }elseif($seller->status== CompanyStatus::Request->value){
            $seller->update([
                'status'=>CompanyStatus::Active->value
            ]);
        }
    }

    public function render()
    {
        $sellers = Seller::query()->
        where('company_name','like','%'.$this->search.'%')->
        Orwhere('company_economy_number','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.seller.sellers', compact('sellers'));
    }
}
