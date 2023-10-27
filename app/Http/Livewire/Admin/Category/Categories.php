<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $categories;
    public $searched_categories=[];

    protected $listeners = [
        'destroyCategory',
        'refreshComponent' => '$refresh'
    ];

    public function mount()
    {
         $this->categories= Category::query()->
        where('parent_id',0)->get();
    }

    public function updatingSearch($value)
    {
        $this->searched_categories =  Category::query()->
            where('title','like','%'.$value.'%')
            ->get();

    }

    public function deleteCategory($id)
    {
        $this->dispatchBrowserEvent('deleteCategory',['id'=>$id]);
    }

    public function destroyCategory($id)
    {
        Category::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        return view('livewire.admin.category.categories');
    }
}
