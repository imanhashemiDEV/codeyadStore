<?php

namespace App\Http\Livewire\Admin\Product;

use App\Helpers\ImageManager;
use App\Models\Gallery;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Galleries extends Component
{
    use WithPagination;

    public $product;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyGallery',
        'refreshComponent' => '$refresh'
    ];

    public function deleteGallery($id)
    {
        $this->dispatchBrowserEvent('deleteGallery',['id'=>$id]);
    }

    public function destroyGallery($id)
    {
        $gallery = Gallery::query()->find($id);
        ImageManager::unlinkImage('products',$gallery);
        $gallery->delete();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $galleries = Gallery::query()->where('product_id',$this->product->id)
        ->orderBy('position','DESC')->paginate(10);
        return view('livewire.admin.product.galleries', compact('galleries'));
    }
}
