<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];


    public function products()
    {
      return $this->morphedByMany(Product::class, 'taggable');
    }

    public static function createTag($request)
    {
        Tag::query()->create([
            'title'=>$request->input('title'),
        ]);
    }

    public static function updateTag($request, $id)
    {
        $tag =Tag::query()->find($id);
        $tag->update([
            'title'=>$request->input('title'),
        ]);
    }
}
