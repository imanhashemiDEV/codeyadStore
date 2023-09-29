<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductGuarantyRequest;
use App\Models\Color;
use App\Models\Discount;
use App\Models\Guaranty;
use App\Models\Product;
use App\Models\ProductGuaranty;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست تخفیف ها";
        return view('admin.discounts.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد تخفیف";
        return view('admin.discounts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Discount::createDiscount($request);
        return redirect()->route('discounts.index')->with('message','تخفیف با موفقیت ایجاد شد');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,$product_id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
