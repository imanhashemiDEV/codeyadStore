<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class TrashedCategory extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'forceDestroyCategory',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteCategory($id)
    {
        $this->dispatchBrowserEvent('forceDeleteCategory',['id'=>$id]);
    }

    public function forceDestroyCategory($id)
    {
        Category::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreCategory($id)
    {
        Category::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $categories = Category::query()->onlyTrashed()->
        where('title','like','%'.$this->search.'%')->
        Orwhere('etitle','like','%'.$this->search.'%')->
        where('deleted_at','!=', null)->
        paginate(10);
        return view('livewire.admin.category.trashed-category', compact('categories'));
    }

}
