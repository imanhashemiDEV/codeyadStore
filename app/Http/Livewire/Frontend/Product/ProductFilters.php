<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;

class ProductFilters extends Component
{

    public $main_slug;
    public $sub_slug;
    public $child_slug;

    public $brands;

    public function mount()
    {
        $products =  Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'id','DESC',null);
        $brandsList = [];
        foreach ($products as $product){
            if(!in_array($product->brand_id,$brandsList)){
                array_push($brandsList, $product->brand_id);
            }
        }

       $this->brands =  Brand::query()->whereIn('id',$brandsList)->get();

    }

    public function render()
    {
        return view('livewire.frontend.product.product-filters');
    }
}
