<?php

namespace App\Http\Livewire\Admin\Guaranty;

use App\Models\Guaranty;
use Livewire\Component;
use Livewire\WithPagination;

class Guarantees extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyGuaranty',
        'refreshComponent' => '$refresh'
    ];

    public function deleteGuaranty($id)
    {
        $this->dispatchBrowserEvent('deleteGuaranty',['id'=>$id]);
    }

    public function destroyGuaranty($id)
    {
        Guaranty::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $guarantees = Guaranty::query()->
        where('title','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.guaranty.guarantees', compact('guarantees'));
    }
}
