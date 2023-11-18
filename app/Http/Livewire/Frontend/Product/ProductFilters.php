<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Guaranty;
use Livewire\Component;

class ProductFilters extends Component
{

    public $main_slug,$sub_slug,$child_slug,$brands,$guaranties,$colors;

    public $filtered_brands=[];
    public $filtered_guaranty=[];
    public $filtered_colors=[];


    public function mount()
    {
        $products = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'id', 'DESC', null);
        $brandsList = [];
        $guarantyList = [];
        $colorList = [];

        foreach ($products as $product) {
            if (!in_array($product->brand_id, $brandsList)) {
                array_push($brandsList, $product->brand_id);
            }
        }

        foreach ($products as $product) {
            foreach ($product->productGuaranties as $sub_product)
            if (!in_array($sub_product->guaranty_id, $guarantyList)) {
                array_push($guarantyList, $sub_product->guaranty_id);
            }
        }

        foreach ($products as $product) {
            foreach ($product->productGuaranties as $sub_product)
                if (!in_array($sub_product->color_id, $colorList)) {
                    array_push($colorList, $sub_product->color_id);
                }
        }


        $this->brands = Brand::query()->whereIn('id', $brandsList)->get();
        $this->guaranties = Guaranty::query()->whereIn('id',$guarantyList)->get();
        $this->colors = Color::query()->whereIn('id',$colorList)->get();
    }

    public function addBrands($brand_id)
    {
        if (!in_array($brand_id, $this->filtered_brands)) {
            array_push($this->filtered_brands, $brand_id);
        }else{
            if(($key=array_search($brand_id,$this->filtered_brands)) !== false){
                unset($this->filtered_brands[$key]);
            }
        }

        $this->emit('filteredProducts', $this->filtered_brands, $this->filtered_guaranty, $this->filtered_colors);
    }

    public function addGuaranties($guaranty_id)
    {
        if (!in_array($guaranty_id, $this->filtered_guaranty)) {
            array_push($this->filtered_guaranty, $guaranty_id);
        }else{
            if(($key=array_search($guaranty_id,$this->filtered_guaranty)) !== false){
                unset($this->filtered_guaranty[$key]);
            }
        }

        $this->emit('filteredProducts', $this->filtered_brands, $this->filtered_guaranty, $this->filtered_colors);
    }

    public function addColors($color_id)
    {
        if (!in_array($color_id, $this->filtered_colors)) {
            array_push($this->filtered_colors, $color_id);
        }else{
            if(($key=array_search($color_id,$this->filtered_colors)) !== false){
                unset($this->filtered_colors[$key]);
            }
        }

        $this->emit('filteredProducts', $this->filtered_brands, $this->filtered_guaranty, $this->filtered_colors);
    }

    public function render()
    {
        return view('livewire.frontend.product.product-filters');
    }
}
