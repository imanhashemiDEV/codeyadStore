<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست محصول ها";
        return view('admin.products.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد محصول ";
        $categories = Category::getCategories();
        $brands = Brand::query()->pluck('title','id');
        $tags = Tag::query()->pluck('title', 'id');
        return view('admin.products.create', compact('title', 'categories','brands','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::createProduct($request);
        return redirect()->route('products.index')->with('message','محصول با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "ویرایش محصول";
        $categories = Category::getCategories();
        $brands = Brand::query()->pluck('title','id');
        $tags = Tag::query()->pluck('title', 'id');
        $product =  Product::findOrfail($id);
        return view('admin.products.edit', compact('title', 'categories', 'product','brands','tags'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::updateProduct($request,$id);
        return redirect()->route('products.index')->with('message','محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trashed()
    {
        $title = " لیست محصولات حذف شده";
        return view('admin.products.trashed_list', compact('title'));
    }


    public function addGallery($id)
    {
        $product = Product::query()->find($id);
        return view('admin.products.add_gallery',compact('product'));
    }

    public function storeGallery(Request $request, $id)
    {
        Gallery::query()->create([
            'product_id'=>$id,
            'image'=>ImageManager::saveImage('products',$request->file),
            'position' => Gallery::query()->where('product_id', $id)->count(),
            ]);

        return redirect()->back();
    }

    public function ckeditor_image(Request $request)
    {
        if ($request->hasFile('upload') ){
            $url = ImageManager::ckImage('products',$request->upload);
            return response()->json(['url' => $url]);
        }
    }

    public function createProductProperties( Product $product)
    {

        return view('admin.products.product_properties', compact('product'));
    }

}
