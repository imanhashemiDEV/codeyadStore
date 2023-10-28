<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use Livewire\Component;

class Products extends Component
{
    public $prodcuts;
    public $main_slug;
    public $sub_slug;
    public $child_slug;
    public function mount()
    {
        if($this->main_slug !=null &&  $this->sub_slug==null &&  $this->child_slug==null){
            $this->products = Category::getProductsByMainCategory($this->main_slug);
        }elseif ($this->main_slug ==null &&  $this->sub_slug!=null &&  $this->child_slug==null){
            $this->products = Category::getProductsBySubCategory($this->sub_slug);
        }elseif ($this->main_slug ==null &&  $this->sub_slug!=null &&  $this->child_slug!=null){
            $this->products = Category::getProductsByChildCategory($this->child_slug);
        }

    }
    public function render()
    {
        return view('livewire.frontend.product.products');
    }
}
