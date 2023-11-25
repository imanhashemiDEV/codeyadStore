<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        $title = "لیست نقد و بررسی ها";
        return view('admin.discussions.list', compact('title','product_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product_id)
    {
        $title = "ایجاد نقد و بررسی";
        return view('admin.discussions.create', compact('title','product_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$product_id)
    {
        Discussion::createDiscussion($request,$product_id);
        return redirect()->route('product.discussions',$product_id)->with('message','نقد و بررسی با موفقیت ایجاد شد');
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
    public function edit(string $id,$product_id)
    {
        $title = "ویرایش نقد و بررسی";
        $discussion =  Discussion::findOrfail($id);
        return view('admin.discussions.edit', compact('title', 'discussion','product_id'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,$product_id)
    {
        Discussion::updateDiscussion($request, $id,$product_id);
        return redirect()->route('product.discussions',$product_id)->with('message','نقد و بررسی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
