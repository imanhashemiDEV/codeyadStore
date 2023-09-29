<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست نقش ها";
        return view('admin.roles.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد نقش ";
        return view('admin.roles.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        Role::query()->create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('roles.index')->with('message',"نقش با موفقیت ایجاد شد");
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
        $title = "ویرایش نقش";
        $role = Role::query()->find($id);
        return view('admin.roles.edit',compact('title','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = Role::query()->find($id);
        $role->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('roles.index')->with('message',"نقش با موفقیت ایجاد شد");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        $role = Role::destroy($id);
//        return redirect()->route('roles.index')->with('message',"نقش با موفقیت حذف شد");
    }
}
