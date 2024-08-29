<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', compact('roles'));
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return to_route('roles.index')->with('status','Role Created Successfully');
    }

    public function edit(Role $role)
    {
        return view('role-permission.role.edit',compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id
            ]
        ]);

        $role->update($validated);

        return to_route('roles.index')->with('status','Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('roles.index')->with('status','Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        
        return view('role-permission.role.add-permissions', compact('role','permissions','rolePermissions'));
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $validated = $request->validate([
            'permissions' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        // collect($validated['permissions'])->map(fn($val)=>(int)$val)
        $role->syncPermissions($request->permissions);

        return to_route('givePermissions', $role->id)->with('status','Permissions Synced to role');
    }

}
