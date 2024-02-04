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

    }

    public function updatingSearch($value)
    {
        if($value !=="" ){
            $this->searched_categories =  Category::query()->
            where('title','like','%'.$value.'%')
                ->get();
        }else{
            $this->searched_categories =[];
        }

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
        $this->categories= Category::query()->
        where('parent_id',0)->get();
        return view('livewire.admin.category.categories');
    }
}
