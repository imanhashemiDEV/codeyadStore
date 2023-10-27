<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGroupRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\PropertyGroup;
use App\Models\Tag;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست گروه ویژگی ها";
        return view('admin.property_groups.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد گروه ویژگی ها ";
        $categories = Category::getLevel2Categories();
        return view('admin.property_groups.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyGroupRequest $request)
    {
        PropertyGroup::createPropertyGroup($request);
        return redirect()->route('property_groups.index')->with('message','گروه وبژگی با موفقیت ایجاد شد');
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
        $title = "ویرایش گروه ویژگی ها";
        $categories = Category::getCategories();
        $property_group =  PropertyGroup::query()->findOrfail($id);
        return view('admin.property_groups.edit', compact('title', 'categories', 'property_group'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyGroupRequest $request, string $id)
    {
        PropertyGroup::updatePropertyGroup($request,$id);
        return redirect()->route('property_groups.index')->with('message','گروه ویژگی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
