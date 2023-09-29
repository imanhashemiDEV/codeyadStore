<?php

namespace App\Http\Livewire\Admin\City;

use App\Models\Category;
use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class Cities extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyCity',
        'refreshComponent' => '$refresh'
    ];

    public function deleteCity($id)
    {
        $this->dispatchBrowserEvent('deleteCity',['id'=>$id]);
    }

    public function destroyCity($id)
    {
        City::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $cities = City::query()->
        where('city','like','%'.$this->search.'%')->
        paginate(20);
        return view('livewire.admin.city.cities', compact('cities'));
    }
}
