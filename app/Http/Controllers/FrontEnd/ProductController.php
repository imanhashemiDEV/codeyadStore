<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function singleProduct($slug)
    {
        $product = Product::query()
            ->with(['category', 'brand', 'colors', 'properties', 'propertyGroups', 'galleries'])
            ->where('slug', $slug)->first();
        $product->increment('viewed');
        return view('frontend.single_product', compact('product'));
    }

    public function mainCategoryProductList($main_category_slug)
    {
        $sub_category_slug=null;
        $child_category_slug=null;
        return view('frontend.product_list',compact('main_category_slug','sub_category_slug','child_category_slug'));
    }

    public function searchCategoryProductList($sub_category_slug,$child_category_slug=null)
    {
        $main_category_slug=null;
        return view('frontend.product_list',compact('main_category_slug','sub_category_slug','child_category_slug'));
    }

    public function compareProducts($product_id1,$product_id2)
    {
        return view('frontend.compare_products', compact('product_id1','product_id2'));
    }

    public function productComment($product_id)
    {
        $product = Product::query()->find($product_id);
        return view('frontend.product_comment', compact('product'));
    }
}
