<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست مجوز ها";
        return view('admin.permissions.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد مجوز ";
        return view('admin.permissions.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        Permission::query()->create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('permissions.index')->with('message',"مجوز با موفقیت ایجاد شد");
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
        $title = "ویرایش مجوز";
        $permission = Permission::query()->find($id);
        return view('admin.permissions.edit',compact('title','permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $permission = Permission::query()->find($id);
        $permission->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('permissions.index')->with('message',"مجوز با موفقیت ایجاد شد");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
