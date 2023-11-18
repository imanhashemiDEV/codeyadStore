<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use App\Models\PropertyGroup;
use Livewire\Component;

class ProductsCompare extends Component
{
    public  $product_id1,$product_id2;
    public $productList=[];

    public $products;
    public $propertyGroups;

    public function mount()
    {
        array_push($this->productList, $this->product_id1);
        array_push($this->productList, $this->product_id2);

        $this->products = Product::query()->whereIn('id',$this->productList)->get();

        $product = Product::query()->find($this->product_id1);
        $category_id = $product->category->parentCategory->id;
        $this->propertyGroups = PropertyGroup::query()->where('category_id',$category_id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.product.products-compare');
    }
}
