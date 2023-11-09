<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyGroup extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'title',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class ,'product_property_group');
    }

    public static function createPropertyGroup($request)
    {
       PropertyGroup::query()->create([
            'title'=>$request->input('title'),
            'category_id'=>$request->input('category_id'),
        ]);

    }

    public static function updatePropertyGroup($request,$id)
    {
        $property_group = PropertyGroup::query()->find($id);
        $property_group->update([
            'title'=>$request->input('title'),
            'category_id'=>$request->input('category_id'),
        ]);
    }
}
