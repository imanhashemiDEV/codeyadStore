<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageManager
{
    public static function saveImage($table,$image){
        if($image){
            $name = $image->hashName();
            $smallImage = Image::make($image->getRealPath());
            $bigImage = Image::make($image->getRealPath());
            $smallImage->resize(256,256, function ($constraint){
                $constraint->aspectRatio();
            });

            Storage::disk('local')->put($table.'/small/'.$name, (string) $smallImage->encode('png',90));
            Storage::disk('local')->put($table.'/big/'.$name, (string) $bigImage->encode('png',90));
            return $name;
        }else{
            return "";
        }
    }

    public static function unlinkImage($table,$object)
    {
        $path_small = public_path(). "/images/$table/small/".$object->image;
        $path_big = public_path(). "/images/$table/big/".$object->image;
        unlink($path_small);
        unlink($path_big);
    }
}
