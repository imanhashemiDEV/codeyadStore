<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use Livewire\Component;

class Products extends Component
{
    public $prodcuts;
    public $slug;
    public function mount()
    {
        $this->products = Category::getProductsByCategory($this->slug);
    }
    public function render()
    {
        return view('livewire.frontend.product.products');
    }
}
