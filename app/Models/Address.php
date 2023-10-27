<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'user_id',
        'province_id',
        'city_id',
        'name',
        'mobile',
        'address',
        'zip_code',
        'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public static function getUserAddress($user)
    {
       return Address::query()->where('user_id', $user->id)
            ->where('is_default', true)->first();
    }
}
