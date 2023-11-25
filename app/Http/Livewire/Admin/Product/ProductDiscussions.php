<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Discussion;
use Livewire\Component;
use Livewire\WithPagination;

class ProductDiscussions extends Component
{

    use WithPagination;
    public $product_id;
    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyDiscussion',
        'refreshComponent' => '$refresh'
    ];

    public function deleteDiscussion($id)
    {
        $this->dispatchBrowserEvent('deleteDiscussion',['id'=>$id]);
    }

    public function destroyDiscussion($id)
    {
        Discussion::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $discussions = Discussion::query()->where('product_id',$this->product_id)->
        where('title','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.product.product-discussions',compact('discussions'));
    }
}
