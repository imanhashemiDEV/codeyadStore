<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';
    private $products;
    private $moreViewedProducts;
    private $newestProducts;
    private $moreSoldProducts;
    private $cheapestProducts;
    private $mostExpensiveProducts;
    public $main_slug;
    public $sub_slug;
    public $child_slug;

    protected $pagination_theme = 'bootstrap';
    public function mount()
    {
       $this->products =  Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'id','DESC');
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }

    public function allProducts()
    {
        $this->products =  Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'id','DESC');
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }

    public function moreViewedProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =  Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'viewed','DESC');
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }

    public function newestProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'created_at','DESC');
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }

    public function moreSoldProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'sold','DESC');;
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }

    public function cheapestProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'price','ASC');;
        $this->mostExpensiveProducts =[];
    }


    public function mostExpensiveProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'price','DESC');;
    }
    public function render()
    {
        $products = $this->products;
        $moreViewedProducts = $this->moreViewedProducts;
        $newestProducts = $this->newestProducts;
        $moreSoldProducts = $this->moreSoldProducts;
        $cheapestProducts = $this->cheapestProducts;
        $mostExpensiveProducts = $this->mostExpensiveProducts;
        return view('livewire.frontend.product.products',
        compact('products','moreViewedProducts','newestProducts',
        'moreSoldProducts','cheapestProducts','mostExpensiveProducts')
        );
    }
}
