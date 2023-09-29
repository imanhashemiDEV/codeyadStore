<?php

namespace App\Helpers;

use App\Models\Discount;
use App\Models\User;

class UniqueCodeGenerator
{
    public static function generateRandomString($length = 6 , $model)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $codeExist = $model::query()->where('code', $randomString)->first();
        if ($codeExist) {
            return self::generateRandomString(6,$model);
        } else {
            return $randomString;
        }
    }

    public static function generateRandomInteger($length = 6,$model)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $codeExist = $model::query()->where('code', $randomString)->first();
        if ($codeExist) {
            return self::generateRandomInteger(6,$model);
        } else {
            return $randomString;
        }
    }
}
