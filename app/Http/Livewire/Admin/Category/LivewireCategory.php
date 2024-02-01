<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class LivewireCategory extends Component
{
    public $categories;
    public $subcategories;

   public $parent_id;



    protected $listeners=[
        'listenerGetId'
    ];

    public function mount()
    {
        $this->categories = Category::query()->where('parent_id', 0)->pluck('title', 'id');
        $this->subcategories = collect();
    }

//    public function updatedParentId()
//    {
//        $this->subcategories = Category::query()->where('parent_id', $this->parent_id)->pluck('title', 'id');
//    }

    public function listenerGetId($id)
    {
        $this->subcategories = Category::query()->where('parent_id', $id)->pluck('title', 'id');
        $this->parent_id=$id;
       $this->emit('idSelected');
    }

    public function render()
    {
        return view('livewire.admin.category.livewire-category');
    }
}
