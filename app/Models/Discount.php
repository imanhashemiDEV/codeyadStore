<?php

namespace App\Models;

use App\Helpers\DateManager;
use App\Helpers\UniqueCodeGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Discount extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'discount',
        'status',
        'expiration_date'
    ];


    public static function createDiscount($request)
    {
        Discount::query()->create([
            'code'=>UniqueCodeGenerator::generateRandomString(6,Discount::class),
            'discount'=>$request->input('discount'),
            'expiration_date'=> DateManager::shamsi_to_miladi($request->input('expiration_date')),
        ]);

    }

    public static function updateDiscount($request,$id)
    {

        $discount = Discount::query()->find($id);
        $discount->update([
            'code'=>$request->input('main_price'),
            'discount'=>$request->input('discount'),
            'expiration_date'=> DateManager::shamsi_to_miladi($request->input('expiration_date')),
        ]);
    }

    public static function calculateDiscount($shop_data,$total_price, $discount_code_price)
    {
        $discount = Discount::query()
            ->where('code', $shop_data['discount_code'])
            ->where('expiration_date','>=', Carbon::now()->toDateTimeString())
            ->first();
        if ($discount) {
            $total_price -= $discount->discount;
            $discount_code_price = $discount->discount;
        }

        return [
            'total_price'=>$total_price,
            'discount_code_price'=>$discount_code_price,
        ];
    }

}
