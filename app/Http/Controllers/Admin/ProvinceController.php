<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست استان ها";
        return view('admin.provinces.list',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد استان ";
        return view('admin.provinces.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProvinceRequest $request)
    {
        Province::createProvince($request);
        return redirect()->route('provinces.index')->with('message', 'استان با موفقیت ثبت شد');
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
        $title = "ویرایش استان";
        $province = Province::query()->find($id);
        return view('admin.provinces.edit',compact('title','province'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProvinceRequest $request, string $id)
    {
        Province::updateProvince($request,$id);
        return redirect()->route('provinces.index')->with('message', 'استان با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
