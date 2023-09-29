<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    use HasFactory;

    protected $fillable=[
        'image',
        'type'
    ];


    public static function createBanner($request)
    {
        Cache::forget('banners');
        Banner::query()->create([
            'type'=>$request->input('type'),
            'image'=>ImageManager::saveImage('banners',$request->image)
        ]);
    }

    public static function updateBanner($request, $id)
    {
        Cache::forget('banners');
        $banner =Banner::query()->find($id);
        $banner->update([
            'type'=>$request->input('type'),
            'image'=>$request->image ? ImageManager::saveImage('banners',$request->image) : $brand->image,
        ]);
    }

}
