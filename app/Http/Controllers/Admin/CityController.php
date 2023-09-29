<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Requests\ProvinceRequest;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست شهر ها";
        return view('admin.cities.list',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد شهر ";
        $provinces = Province::query()->pluck('province','id');
        return view('admin.cities.create', compact('title','provinces'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        City::createCity($request);
        return redirect()->route('cities.index')->with('message', 'شهر با موفقیت ثبت شد');
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
        $title = "ویرایش شهر";
        $city = City::query()->find($id);
        $provinces = Province::query()->pluck('province', 'id');

        return view('admin.cities.edit',compact('title','city','provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $id)
    {
        City::updateCity($request,$id);
        return redirect()->route('cities.index')->with('message', 'شهر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
