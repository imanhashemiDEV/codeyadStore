<?php

namespace App\Models;

use App\Enums\CartType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'product_id',
        'color_id',
        'guaranty_id',
        'count',
        'type'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

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

    public function productPrice($product_id,$color_id,$guaranty_id)
    {
      $product =  ProductGuaranty::query()->where('product_id',$product_id)
           ->where('color_id',$color_id)
           ->where('guaranty_id',$guaranty_id)
           ->first();
      if($product){
          return $product->price;
      }
    }

    public function productMainPrice($product_id,$color_id,$guaranty_id)
    {
        $product =  ProductGuaranty::query()->where('product_id',$product_id)
            ->where('color_id',$color_id)
            ->where('guaranty_id',$guaranty_id)
            ->first();
        if($product){
            return $product->main_price;
        }
    }

    public static function getUserCart($user)
    {
       return Cart::query()->where('user_id', $user->id)->
        where('type', CartType::Main->value)->get();
    }
}
