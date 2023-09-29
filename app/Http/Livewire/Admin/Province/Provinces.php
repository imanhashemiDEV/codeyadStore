<?php

namespace App\Http\Livewire\Admin\Province;

use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class Provinces extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyProvince',
        'refreshComponent' => '$refresh'
    ];

    public function deleteProvince($id)
    {
        $this->dispatchBrowserEvent('deleteProvince',['id'=>$id]);
    }

    public function destroyProvince($id)
    {
        Province::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $provinces = Province::query()->
        where('province','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.province.provinces', compact('provinces'));
    }
}
