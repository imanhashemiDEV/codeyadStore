<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    protected $fillable =[
        'mobile',
        'email',
        'code'
    ];

    public static function checkTwoMinutes($entry)
    {
        $check =  self::query()->where('mobile',$entry)
            ->orWhere('email',$entry)
            ->where('created_at','<', Carbon::now()->subMinute(2))->first();
        if($check){
            return false;
        }
        return true;
    }


    public static function createVerificationCode($entry, $code)
    {
        if(filter_var($entry, FILTER_VALIDATE_EMAIL)){
            self::query()->create([
                'email'=>$entry,
                'code'=>$code
            ]);
        }elseif(preg_match('/^([0-9\s\-\+\(\)]*)$/', $entry)){
            self::query()->create([
                'mobile'=>$entry,
                'code'=>$code
            ]);
        }

    }

    public static  function checkVerificationCode($entry,$code)
    {
        if(filter_var($entry, FILTER_VALIDATE_EMAIL)){
            $check =  self::query()->where('email',$entry)
                ->where('code',$code)->first();
            if($check){
                return true;
            }
            return false;
        }elseif(preg_match('/^([0-9\s\-\+\(\)]*)$/', $entry)){
            $check =  self::query()->where('mobile',$entry)
                ->where('code',$code)->first();
            if($check){
                return true;
            }
            return false;
        }
    }

}
