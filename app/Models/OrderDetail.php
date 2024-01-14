<?php

namespace App\Models;

use App\Enums\OrderDetailStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'color_id',
        'guaranty_id',
        'main_price',
        'price',
        'discount',
        'count',
        'status',
        'seller_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }

    public static function createOrderDetails( $order, $cart,$product)
    {
        return OrderDetail::query()->create([
            'seller_id' => $product->user_id,
            'order_id' => $order->id,
            'product_id' => $cart->product_id,
            'color_id' => $cart->color_id,
            'guaranty_id' => $cart->guaranty_id,
            'main_price' => $product->main_price,
            'price' => $product->price,
            'discount' => $product->discount,
            'count' => $cart->count,
            'status' => OrderDetailStatus::Waiting->value,
        ]);
    }

    public static function getProductCommissionPrice($order_detail)
    {
        if($order_detail->product->category->commission){
           return $order_detail->price - ((($order_detail->product->category->commission->percentage)*$order_detail->price)/100);
        }else{
            return $order_detail->price;
        }

    }
}
