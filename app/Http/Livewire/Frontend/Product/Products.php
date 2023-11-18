<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme='bootstrap';
    private $products,$moreViewedProducts,$newestProducts,$moreSoldProducts,
            $cheapestProducts,$mostExpensiveProducts;
    public $main_slug,$sub_slug,$child_slug;
    public $productList=[];
    public $page=1;
    protected $pagination_theme = 'bootstrap';

    protected $listeners=[
        'filteredProducts'
    ];

    public function mount()
    {
       $this->products =  Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'id','DESC',$this->page);
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }
    public function allProducts()
    {
        $this->products =  Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'id','DESC',$this->page);
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }
    public function moreViewedProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =  Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'viewed','DESC',$this->page);
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }
    public function newestProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'created_at','DESC',$this->page);
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }
    public function moreSoldProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'sold','DESC',$this->page);;
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }
    public function cheapestProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'price','ASC',$this->page);;
        $this->mostExpensiveProducts =[];
    }
    public function mostExpensiveProducts()
    {
        $this->products=[];
        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug,'price','DESC',$this->page);;
    }
    public function changePage($page,$index)
    {
        $this->page=$page;
        switch ($index){
            case 1:
                $this->allProducts();
                break;
            case 2:
                $this->moreViewedProducts();
                break;
            case 3:
                $this->newestProducts();
                break;
            case 4:
                $this->moreSoldProducts();
                break;
            case 5:
                $this->cheapestProducts();
                break;
            case 6:
                $this->mostExpensiveProducts();
                break;
            default :
                $this->allProducts();
        }
    }
    public function filteredProducts($brands,$guaranties,$colors)
    {
        if($this->main_slug){
            $this->products =  Category::getProductsByMainCategory($this->main_slug,'id','DESC',$this->page,$brands,$guaranties,$colors);
        }elseif ( $this->sub_slug){
            $this->products =  Category::getProductsBySubCategory($this->sub_slug,'id','DESC',$this->page,$brands,$guaranties,$colors);
        }elseif ($this->child_slug){
            $this->products =  Category::getProductsByChildCategory($this->child_slug,'id','DESC',$this->page,$brands,$guaranties,$colors);
        }

        $this->moreViewedProducts =[];
        $this->newestProducts =[];
        $this->moreSoldProducts =[];
        $this->cheapestProducts =[];
        $this->mostExpensiveProducts =[];
    }

    public function compareProducts($product_id)
    {
        if (!in_array($product_id, $this->productList)) {
            array_push($this->productList, $product_id);
        }else{
            if(($key=array_search($product_id,$this->productList)) !== false){
                unset($this->productList[$key]);
            }
        }

        if(count($this->productList)==2){
            return redirect()->route('compare.products',[$this->productList[0],$this->productList[1]]);
        }

        $this->allProducts();
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
