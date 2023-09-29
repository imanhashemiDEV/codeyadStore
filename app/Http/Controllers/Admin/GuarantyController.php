<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guaranty;
use App\Models\Tag;
use Illuminate\Http\Request;

class GuarantyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست گارانتی ها";
        return view('admin.guarantees.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد گارانتی ";
        return view('admin.guarantees.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Guaranty::createGuaranty($request);
        return redirect()->route('guarantees.index')->with('message', 'گارانتی با موفقیت ثبت شد');
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
        $title = "ویرایش گارانتی ";
        $guaranty = Guaranty::query()->find($id);
        return view('admin.guarantees.edit', compact('title','guaranty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Guaranty::updateGuaranty($request,$id);
        return redirect()->route('guarantees.index')->with('message', 'گارانتی با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
