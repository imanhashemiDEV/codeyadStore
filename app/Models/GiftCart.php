<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCart extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'code',
        'gift_title',
        'gift_price',
        'expiration_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
