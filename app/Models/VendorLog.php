<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorLog extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'vendor_id',
        'product_guaranty_id',
        'event_type',
        'count'
    ];
}
