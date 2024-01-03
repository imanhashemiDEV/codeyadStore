<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    use HasFactory;

    protected $fillable =[
        'vendor_id',
        'product_guaranty_id',
        'count'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function productGuaranty()
    {
        return $this->belongsTo(ProductGuaranty::class);
    }


}
