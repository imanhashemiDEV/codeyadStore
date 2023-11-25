<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function createDiscussion($request,$product_id)
    {
        Discussion::query()->create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'product_id'=>$product_id
        ]);
    }


    public static function updateDiscussion($request,$id,$product_id)
    {
        $discussion =  Discussion::query()->find($id);
        $discussion->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'product_id'=>$product_id
        ]);
    }
}
