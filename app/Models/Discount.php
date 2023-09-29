<?php

namespace App\Models;

use App\Helpers\DateManager;
use App\Helpers\UniqueCodeGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
