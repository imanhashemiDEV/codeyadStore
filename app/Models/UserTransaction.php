<?php

namespace App\Models;

use App\Enums\UserTransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'amount',
        'type',
        'description',
    ];


    public function user()
    {
        $this->belongsTo(User::class);
    }

    public static function sellerSoldProduct($order_details)
    {
       foreach ($order_details as $order_detail){
           UserTransaction::query()->create([
               'user_id'=>$order_detail->seller_id,
               'amount'=> OrderDetail::getProductCommissionPrice($order_detail),
               'type'=>UserTransactionType::Deposit->value,
               'description'=>"واریز فروش محصول",
           ]);
       }
    }
}
