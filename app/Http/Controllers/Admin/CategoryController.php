<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست دسته بندی ها";
        return view('admin.categories.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد دسته بندی ";
        $categories = Category::getCategories();
        return view('admin.categories.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::createCategory($request);
        return redirect()->route('categories.index')->with('message','دسته بندی با موفقیت ایجاد شد');
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
        $title = "ویرایش دسته بندی";
        $categories = Category::getCategories();
        $category =  Category::findOrfail($id);
        return view('admin.categories.edit', compact('title', 'categories', 'category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::query()->find($id);
        Category::updateCategory($request, $category);
        return redirect()->route('categories.index')->with('message','دسته بندی با موفقیت ویرایش شد');
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
        $title = " لیست دسته بندی های حذف شده";
        return view('admin.categories.trashed_list', compact('title'));
    }

    public function livewireCategory()
    {
        $title = "دسته بندی لایووایری";
        return view('admin.categories.livewire_category', compact('title'));
    }
}
