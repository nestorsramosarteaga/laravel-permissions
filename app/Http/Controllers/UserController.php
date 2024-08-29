<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller  implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:View user', only: ['index']),
            new Middleware('permission:Create user', only:['create','store']),
            new Middleware('permission:Update user', only:['edit','update']),
            new Middleware('permission:Delete user', only:['destroy']),
        ];
    }

    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles($request->roles);

        return to_route('users.index')->with('status', 'User created successfully with roles');

    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit',compact('user','roles','userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if ( ! empty($request->password) ) {
            $data += [
                'password' => Hash::make($request->password)
            ];
        }

        $user->update($data);

        $user->syncRoles($request->roles);

        return to_route('users.index')->with('status', 'User updated successfully with roles');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('status','User deleted successfully');
    }

}
