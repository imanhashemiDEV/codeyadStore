<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست انبارها";
        return view('admin.vendors.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد انبار ";
        return view('admin.vendors.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vendor::createVendor($request);
        return redirect()->route('vendors.index')->with('message', 'انبار با موفقیت ثبت شد');
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
        $title = "ویرایش انبار ";
        $vendor = Vendor::query()->find($id);
        return view('admin.vendors.edit', compact('title','vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Vendor::updateVendor($request,$id);
        return redirect()->route('vendors.index')->with('message', 'انبار با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addProductToVendor($vendor_id)
    {
        $title = "لیست محصولات";
        return view('admin.vendors.add_products', compact('title','vendor_id'));
    }
}
