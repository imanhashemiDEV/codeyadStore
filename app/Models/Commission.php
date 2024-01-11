<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'percentage'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function createCommission($request)
    {
        Commission::query()->create([
            'percentage'=>$request->input('percentage'),
            'category_id'=>$request->input('category_id'),
        ]);

    }

    public static function updateCommission($request,$id)
    {
        $commission = Commission::query()->find($id);
        $commission->update([
            'percentage'=>$request->input('percentage'),
            'category_id'=>$request->input('category_id'),
        ]);
    }
}
