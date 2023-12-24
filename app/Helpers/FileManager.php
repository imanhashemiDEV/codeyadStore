<?php

namespace App\Helpers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileManager
{
    public static function saveContract($file,$company){
        if($file){
            $name = $file->hashName();
            Storage::disk('files')->put('contracts/'.$company,$file);
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

    public static function ckImage($table,$image){

            $name = $image->hashName();
            $bigImage = Image::make($image->getRealPath());
            Storage::disk('local')->put($table.'/big/'.$name, (string) $bigImage->encode('png',90));
            return url("images/$table/big/".$name);

    }

}
