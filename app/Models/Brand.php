<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function createBrand($request)
    {
        Brand::query()->create([
            'title'=>$request->input('title'),
            'image'=>ImageManager::saveImage('brands',$request->image)
        ]);
    }

    public static function updateBrand($request, $id)
    {
        $brand =Brand::query()->find($id);
        $brand->update([
            'title'=>$request->input('title'),
            'image'=>$request->image ? ImageManager::saveImage('brands',$request->image) : $brand->image,
        ]);
    }
}
