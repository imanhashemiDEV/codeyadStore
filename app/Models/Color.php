<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'color_product');
    }
    public static function createColor($request)
    {
        Color::query()->create([
            'title'=> $request->input('title'),
            'code'=> $request->input('code')
        ]);
    }

    public static function updateColor($request, $id)
    {
        $color = Color::query()->find($id);
        $color->update([
            'title'=> $request->input('title'),
            'code'=> $request->input('code')
        ]);
    }
}
