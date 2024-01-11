<?php

namespace App\Http\Livewire\Admin\Commission;

use App\Models\Commission;
use Livewire\Component;
use Livewire\WithPagination;

class Commissions extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;


    public function render()
    {
        $commissions = Commission::query()->
//        where('title','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.commission.commissions',compact('commissions'));
    }
}
