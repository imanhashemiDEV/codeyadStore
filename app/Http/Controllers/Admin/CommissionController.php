<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGroupRequest;
use App\Models\Category;
use App\Models\Commission;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست کمیسیون ها";
        return view('admin.commissions.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد کمیسیون ها ";
        $categories = Category::getLevel3Categories();
        return view('admin.commissions.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Commission::createCommission($request);
        return redirect()->route('commissions.index')->with('message','کمیسیون با موفقیت ایجاد شد');
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
        $title = "ویرایش کمیسیون ها";
        $categories = Category::getLevel3Categories();
        $commission =  Commission::query()->findOrfail($id);
        return view('admin.commissions.edit', compact('title', 'categories', 'commission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Commission::updateCommission($request,$id);
        return redirect()->route('commissions.index')->with('message','کمیسیون با موفقیت ویرایش شد');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
