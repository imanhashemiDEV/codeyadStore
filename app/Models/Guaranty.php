<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guaranty extends Model
{
    use HasFactory;

    protected $fillable=[
        'title'
    ];

    public static function createGuaranty($request)
    {
        Guaranty::query()->create([
            'title'=>$request->input('title'),
        ]);
    }

    public static function updateGuaranty($request, $id)
    {
        $guaranty =Guaranty::query()->find($id);
        $guaranty->update([
            'title'=>$request->input('title'),
        ]);
    }
}
