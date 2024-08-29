<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:View permission', only: ['index']),
            new Middleware('permission:Create permission', only:['create','store']),
            new Middleware('permission:Update permission', only:['edit','update']),
            new Middleware('permission:Delete permission', only:['destroy']),
        ];
    }

    public function index()
    {
        $permissions = Permission::get();
        return view('role-permission.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return to_route('permissions.index')->with('status','Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        return view('role-permission.permission.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,' . $permission->id
            ]
        ]);

        $permission->update($validated);

        return to_route('permissions.index')->with('status','Permission Updated Successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return to_route('permissions.index')->with('status','Permission Deleted Successfully');
    }

}
