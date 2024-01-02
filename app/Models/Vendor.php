<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'address',
        'status'
    ];


    public static function createVendor($request)
    {
        Vendor::query()->create([
            'title'=>$request->input('title'),
            'address'=>$request->input('address'),
        ]);
    }

    public static function updateVendor($request, $id)
    {
        $vendor =Vendor::query()->find($id);
        $vendor->update([
            'title'=>$request->input('title'),
            'address'=>$request->input('address'),
        ]);
    }
}
