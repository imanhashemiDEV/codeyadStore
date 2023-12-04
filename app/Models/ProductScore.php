<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductScore extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'score',
        'count'
    ];
}
