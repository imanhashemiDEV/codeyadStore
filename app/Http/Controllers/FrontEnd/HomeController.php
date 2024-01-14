<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\CartType;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\OrderDetail;
use Melipayamak;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductGuaranty;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Cache::remember('sliders', 60 * 60 * 24 * 7, function () {
            return Slider::query()->get();
        });

        $brands = Cache::remember('brands', 60 * 60 * 24 * 7, function () {
            return Brand::query()->get();
        });

        $most_sold = Product::query()->with('category')->orderBy('sold', 'DESC')->limit(8)->get();
        $newest_products = Product::query()->with('category')->orderBy('updated_at', 'DESC')->limit(8)->get();
        $special_products = ProductGuaranty::query()->with('product')
            ->where('special_start', '<=', now())
            ->where('special_expiration', '>=', now())
            ->where('count', '>', 0)
            ->get();
        return view('frontend.index',
            compact('sliders', 'most_sold',
                'special_products', 'brands', 'newest_products'));
    }



    public function cart()
    {
        $cart_count = Cart::query()->where('type',CartType::Main->value)->count();
        return view('frontend.cart',compact('cart_count'));
    }

    public function shipping()
    {
        return view('frontend.shipping');
    }

    public function shippingPayment()
    {
        return view('frontend.shipping_payment');
    }
}
