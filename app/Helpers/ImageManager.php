<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as IM;

class ImageManager
{
    public static function saveImage($table,$image): string
    {
        if($image){
            $name = pathinfo($image->hashName() , PATHINFO_FILENAME).'.png';
            $manager = new IM(new Driver());
            $smallImage = $manager->read($image->getRealPath());
            $bigImage = $manager->read($image->getRealPath());
            $smallImage->resize(256,256);

            Storage::disk('local')->put($table.'/small/'.$name,  $smallImage->encode());
            Storage::disk('local')->put($table.'/big/'.$name,  $bigImage->encode());
            return $name;
        }else{
            return "";
        }
    }

    public static function unlinkImage($table,$object): void
    {
        $path_small = public_path(). "/images/$table/small/".$object->image;
        $path_big = public_path(). "/images/$table/big/".$object->image;
        unlink($path_small);
        unlink($path_big);
    }

    public static function ckImage($table,$image){

        $name = $image->hashName();
        $manager = new IM(new Driver());
        $bigImage = $manager->read($image->getRealPath());
        Storage::disk('local')->put($table.'/big/'.$name, $bigImage->encode());
        return url("images/$table/big/".$name);

    }
}
