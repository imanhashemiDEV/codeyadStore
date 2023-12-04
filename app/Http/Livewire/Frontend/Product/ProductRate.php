<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\ProductScore;
use Livewire\Component;

class ProductRate extends Component
{
    public $product;
    public $scoreList=[];
    protected $listeners=[
        'getScore'
    ];

    public function getScore($rateValue,$id)
    {
       $this->scoreList[$id]=$rateValue;
        $this->emit('setScore', $this->scoreList);
    }

    public function render()
    {
        $scores = ProductScore::query()->where('product_id',$this->product->id)->get();
        return view('livewire.frontend.product.product-rate', compact('scores'));
    }
}
