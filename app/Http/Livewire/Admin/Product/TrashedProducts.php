<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class TrashedProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'forceDestroyProduct',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteProduct($id)
    {
        $this->dispatchBrowserEvent('forceDeleteProduct',['id'=>$id]);
    }

    public function forceDestroyProduct($id)
    {
        Product::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreProduct($id)
    {
        Product::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $products = Product::query()->onlyTrashed()->
        where('title','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.product.trashed-products', compact('products'));
    }
}
