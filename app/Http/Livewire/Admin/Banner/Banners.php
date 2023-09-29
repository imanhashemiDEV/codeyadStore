<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Banners extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyBanner',
        'refreshComponent' => '$refresh'
    ];

    public function deleteBanner($id)
    {
        $this->dispatchBrowserEvent('deleteBanner',['id'=>$id]);
    }

    public function destroyBanner($id)
    {
        Banner::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $banners = Banner::query()->
        where('type','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.banner.banners', compact('banners'));
    }

}
