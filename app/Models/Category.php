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
            ->withDefault(['title'=>"دسته اصلی"]);
    }

    public function childCategory()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function commission()
    {
        return $this->hasOne(Commission::class);
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

    public static function getLevel2Categories()
    {
        $array = [];
        $categories = self::query()->with('childCategory')->where('parent_id',0)->get();
        foreach ($categories as $category1){
            foreach ($category1->childCategory as $category2){
                $array[$category2->id]= ' - ' . $category2->title;
            }
        }

        return $array;
    }

    public static function getLevel3Categories()
    {
        $array = [];
        $categories = self::query()->with('childCategory')->where('parent_id',0)->get();
        foreach ($categories as $category1){
            foreach ($category1->childCategory as $category2){
                foreach ($category2->childCategory as $category3){
                    $array[$category3->id]= $category3->title;
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

    public static function getProductByCategory($main_slug,$sub_slug,$child_slug,$column,$orderBy,$page)
    {
        if($main_slug !=null &&  $sub_slug==null &&  $child_slug==null){
           return Category::getProductsByMainCategory($main_slug,$column,$orderBy,$page);
        }elseif ($main_slug ==null &&  $sub_slug!=null &&  $child_slug==null){
            return Category::getProductsBySubCategory($sub_slug,$column,$orderBy,$page);
        }elseif ($main_slug ==null &&  $sub_slug!=null &&  $child_slug!=null){
            return Category::getProductsByChildCategory($child_slug,$column,$orderBy,$page);
        }
    }
    public static function getProductsByMainCategory($slug,$column,$orderBy,$page=null,$brands=null,$guaranties=null,$colors=null)
    {
        $category = Category::query()->where('slug',$slug)->first();
        $catList =[];
        if(sizeof($category->childCategory) > 0 ) {
            foreach ($category->childCategory as $cat1) {
                if (sizeof($cat1->childCategory) > 0) {
                    foreach ($cat1->childCategory as $cat2) {
                        array_push($catList, $cat2->id);
                    }
                }
            }
        }
        if($page){
            return Product::query()->whereIn('category_id',$catList)
                ->when($brands,function ($q) use ($brands){
                    $q->whereIn('brand_id',$brands);
                })
                ->when($guaranties,function ($q) use ($guaranties){
                    $q->whereHas('productGuaranties',function ($q2) use ($guaranties){
                        $q2->whereIn('guaranty_id',$guaranties);
                    });
                })
                ->when($colors,function ($q) use ($colors){
                    $q->whereHas('colors',function ($q2) use ($colors){
                        $q2->whereIn('color_id',$colors);
                    });
                })
                ->orderBy($column,$orderBy)
                ->paginate(12,['*'],'page',$page);
        }else{
           return Product::query()->whereIn('category_id',$catList)
                ->orderBy($column,$orderBy)
                ->get();
        }

    }

    public static function getProductsBySubCategory($slug,$column,$orderBy,$page=null,$brands=null,$guaranties=null,$colors=null)
    {
        $category = Category::query()->where('slug',$slug)->first();
        $catList =[];
        if(sizeof($category->childCategory) > 0 ) {
            foreach ($category->childCategory as $cat1) {
                array_push($catList, $cat1->id);
            }
        }

        if($page){
            return Product::query()->whereIn('category_id',$catList)
                ->when($brands,function ($q) use ($brands){
                    $q->whereIn('brand_id',$brands);
                })
                ->when($guaranties,function ($q) use ($guaranties){
                    $q->whereHas('productGuaranties',function ($q2) use ($guaranties){
                        $q2->whereIn('guaranty_id',$guaranties);
                    });
                })
                ->when($colors,function ($q) use ($colors){
                    $q->whereHas('colors',function ($q2) use ($colors){
                        $q2->whereIn('color_id',$colors);
                    });
                })
                ->orderBy($column,$orderBy)
                ->paginate(12,['*'],'page',$page);
        }else{
            return Product::query()->whereIn('category_id',$catList)
                ->orderBy($column,$orderBy)
                ->get();
        }

    }

    public static function getProductsByChildCategory($slug,$column,$orderBy,$page=null,$brands=null,$guaranties=null,$colors=null)
    {
        $category = Category::query()->where('slug',$slug)->first();

        if($page){
            return Product::query()->where('category_id',$category->id)
                ->when($brands,function ($q) use ($brands){
                    $q->whereIn('brand_id',$brands);
                })
                ->when($guaranties,function ($q) use ($guaranties){
                    $q->whereHas('productGuaranties',function ($q2) use ($guaranties){
                        $q2->whereIn('guaranty_id',$guaranties);
                    });
                })
                ->when($colors,function ($q) use ($colors){
                    $q->whereHas('colors',function ($q2) use ($colors){
                        $q2->whereIn('color_id',$colors);
                    });
                })
                ->orderBy($column,$orderBy)
                ->paginate(12,['*'],'page',$page);
        }else{
            return Product::query()->where('category_id',$category->id)
                ->orderBy($column,$orderBy)
                ->get();
        }

    }

}
