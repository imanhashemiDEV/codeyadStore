<?php

namespace App\Models;

use App\Helpers\DateManager;
use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGuaranty extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_price',
        'price',
        'discount',
        'count',
        'max_sell',
        'product_id',
        'color_id',
        'guaranty_id',
        'special_start',
        'special_expiration',
        'user_id',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public static function createProductGuaranty($request,$product_id)
    {
        $less_price = ProductGuaranty::query()->orderBy('price',"ASC")
            ->where('product_id',$product_id)->first();

        $price = ($request->input('main_price') ) - (($request->input('main_price')* $request->input('discount'))/100);
       ProductGuaranty::query()->create([
            'user_id'=>auth()->user()->id,
            'main_price'=>$request->input('main_price'),
            'discount'=>$request->input('discount'),
            'price'=> $price,
            'count'=>$request->input('count'),
            'max_sell'=>$request->input('max_sell'),
            'product_id'=>$product_id,
            'color_id'=>$request->input('color_id'),
            'guaranty_id'=>$request->input('guaranty_id'),
            'special_start'=> $request->input('special_start') !=null ? DateManager::shamsi_to_miladi($request->input('special_start')) : null,
            'special_expiration'=>  $request->input('special_start') !=null ? DateManager::shamsi_to_miladi($request->input('special_expiration')) : null ,
        ]);

        if($less_price){
            $product = Product::query()->find($product_id);
            if($price < $less_price->price){
                self::updateProduct($product, $price, $request);
                self::getColors($product_id, $request, $product);
            }else{
                if($product->guaranty_id == $request->input('guaranty_id') ){
                    self::getColors($product_id, $request, $product);
                }
            }
        }else{
            $product = Product::query()->find($product_id);
            self::updateProduct($product, $price, $request);
            self::getColors($product_id, $request, $product);
        }
    }

    public static function updateProductGuaranty($request,$id,$product_id)
    {
        $less_price = ProductGuaranty::query()->orderBy('price',"ASC")
            ->where('product_id',$product_id)->first();

        $price = ($request->input('main_price') ) - (($request->input('main_price')* $request->input('discount'))/100);
        $product_guaranty = ProductGuaranty::query()->find($id);
        $product_guaranty->update([
            'user_id'=>auth()->user()->id,
            'main_price'=>$request->input('main_price'),
            'discount'=>$request->input('discount'),
            'price'=> $price,
            'count'=>$request->input('count'),
            'max_sell'=>$request->input('max_sell'),
            'product_id'=>$product_id,
            'color_id'=>$request->input('color_id'),
            'guaranty_id'=>$request->input('guaranty_id'),
            'special_start'=> $request->input('special_start') !=null ? DateManager::shamsi_to_miladi($request->input('special_start')) : null,
            'special_expiration'=>  $request->input('special_start') !=null ? DateManager::shamsi_to_miladi($request->input('special_expiration')) : null ,
        ]);
        $product = Product::query()->find($product_id);
            if($price <= $less_price->price){
                self::updateProduct($product, $price, $request);
                self::getColors($product_id, $request, $product);
            }else{
                if($product->guaranty_id == $request->input('guaranty_id') ){
                    self::getColors($product_id, $request, $product);
                }
            }

    }

    public static function getColors($product_id, $request,$product)
    {

            $check = $product->colors()->where('color_id',$request->color_id)->exists();
            if(!$check){
                $product->colors()->attach($request->input('color_id'));
            }

    }

    public static function updateProduct($product, float|int $price, $request): void
    {
        $product->update([
            'user_id'=>auth()->user()->id,
            'price' => $price,
            'discount' => $request->input('discount'),
            'count' => $request->input('count'),
            'max_sell' => $request->input('max_sell'),
            'guaranty_id' => $request->input('guaranty_id'),
            'special_start' => $request->input('special_start') != null ? DateManager::shamsi_to_miladi($request->input('special_start')) : null,
            'special_expiration' => $request->input('special_start') != null ? DateManager::shamsi_to_miladi($request->input('special_expiration')) : null,
        ]);
    }

    public static function getProductInCart($cart)
    {
      return  ProductGuaranty::query()
            ->where('product_id',$cart->product_id)
            ->where('color_id',$cart->color_id)
            ->where('guaranty_id',$cart->guaranty_id)
            ->first();
    }
    public static function calculateTotalPriceInCart($carts,$total_price)
    {
        foreach ($carts as $cart) {
            $product = ProductGuaranty::query()->where([
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'guaranty_id' => $cart->guaranty_id,
            ])->first();
            $total_price += ($product->price) * $cart->count;
        }

        return $total_price;
    }
}
