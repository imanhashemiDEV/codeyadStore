<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'product_id',
        'property_group_id',
    ];

    public function product()
    {
        return $this->belongsto(Product::class);
    }

    public function propertyGroup()
    {
        return $this->belongsTo(PropertyGroup::class);
    }
}
