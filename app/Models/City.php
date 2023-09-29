<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable=[
        'province_id',
        'city',
        'send_day',
        'send_price'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public static function createCity($request)
    {
        self::query()->create([
            'city'=>$request->input('city'),
            'province_id'=>$request->input('province_id'),
            'send_day'=>$request->input('send_day'),
            'send_price'=>$request->input('send_price'),
        ]);
    }

    public static function updateCity($request,$id)
    {
        $city = self::query()->find($id);
        $city->update([
            'city'=>$request->input('city'),
            'province_id'=>$request->input('province_id'),
            'send_day'=>$request->input('send_day'),
            'send_price'=>$request->input('send_price'),
        ]);
    }
}
