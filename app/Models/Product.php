<?php

namespace App\Models;

use App\Enums\QuestionStatus;
use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'title',
        'etitle',
        'slug',
        'price',
        'discount',
        'count',
        'max_sell',
        'viewed',
        'sold',
        'image',
        'guaranty_id',
        'description',
        'special_start',
        'special_expiration',
        'status',
        'category_id',
        'brand_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

    public function tags()
    {
       return $this->morphToMany(Tag::class,'taggable');
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function productGuaranties()
    {
        return $this->hasMany(ProductGuaranty::class);
    }

    public function propertyGroups()
    {
       return $this->belongsToMany(PropertyGroup::class ,'product_property_group');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function submittedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('status',QuestionStatus::Approved->value);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function scores()
    {
        return $this->hasMany(ProductScore::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public static function createProduct($request)
    {
        $product = Product::query()->create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->input('title'),
            'etitle'=>$request->input('etitle'),
            'slug'=>str()->slug($request->etitle),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
            'image'=>ImageManager::saveImage('products',$request->image)
        ]);
        $product->tags()->attach($request->tags);
    }

    public static function updateProduct($request,$id)
    {
        $product = Product::query()->find($id);
        $product->update([
            'user_id'=>auth()->user()->id,
            'title'=>$request->input('title'),
            'etitle'=>$request->input('etitle'),
            'slug'=>str()->slug($request->etitle),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
            'image'=>$request->image ? ImageManager::saveImage('products',$request->image) : $product->image,
        ]);
        $product->tags()->sync($request->tags);
    }
}
