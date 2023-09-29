<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'title',
        'etitle',
        'slug',
        'image',
        'parent_id'
    ];


    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')
            ->withTrashed()
            ->withDefault(['title'=>"---"]);
    }

    public function childCategory()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function propertyGroups()
    {
        return $this->hasMany(PropertyGroup::class);
    }


    public static function createCategory($request)
    {
        Category::query()->create([
            'title'=>$request->input('title'),
            'etitle'=>$request->input('etitle'),
            'slug'=>str()->slug($request->etitle),
            'parent_id'=>$request->input('parent_id'),
            'image'=>ImageManager::saveImage('categories',$request->image)
        ]);
    }

    public static function updateCategory($request, $category)
    {
        $category->update([
            'title'=>$request->input('title'),
            'etitle'=>$request->input('etitle'),
            'slug'=>str()->slug($request->etitle),
            'parent_id'=>$request->input('parent_id'),
            'image'=>$request->image ? ImageManager::saveImage('categories',$request->image) : $category->image,
        ]);
    }



    public static function getCategories()
    {
        $array = [];
        $categories = self::query()->with('childCategory')->where('parent_id',0)->get();
        foreach ($categories as $category1){
            $array[$category1->id]=$category1->title;
            foreach ($category1->childCategory as $category2){
                $array[$category2->id]= ' - ' . $category2->title;
                foreach ($category2->childCategory as $category3){
                    $array[$category3->id]= ' - - ' . $category3->title;
                }
            }
        }

        return $array;
    }

    public static function getMainCategoryCount($id)
    {
        $sum = 0;
        $categories = self::query()->with('childCategory')->where('parent_id',$id)->get();
        foreach ($categories as $cat1){
            foreach ($cat1->childCategory as $cat2){
                $sum += $cat2->products()->count();
            }
        }

        return $sum;
    }


    protected static function boot()
    {
        parent::boot();
        self::deleting(function($category){
            foreach ($category->childCategory()->withTrashed()->get() as $cat){
                if($category->isForceDeleting()){
                    $cat->forcedelete();
                }else{
                    $cat->delete();
                }
            }
        });

        self::restoring(function ($category){
            foreach ($category->childCategory()->withTrashed()->get() as $cat){
                $cat->restore();
            }
        });
    }


}
