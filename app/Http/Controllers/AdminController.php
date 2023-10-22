<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(3);
        return view('users.index')->with('users',$users);
    }
    public function create()
    {
        return view('users.create')
            ->with('roles',Role::all());
    }
    public function store(CreateUserRequest $request)
    {
        //dd($request->all());
        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);
        session()->flash('success','User Created Successfully');
        return redirect(route('users.index'));
    }

    public function grantAdminPrivileges(int $id)
    {
        $user= User::find($id);
        if ($user) {
            $user->role_id = 2;
            $user->save();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Administrator Privileges Granted Successfully!'
        ]);
    }
    public function revokeAdminPrivileges(int $id)
    {
        $user= User::find($id);
        if ($user) {
            $user->role_id = 3;
            $user->save();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Administrator Privileges Revoked Successfully!'
        ]);

    }
    public function deleteUser(int $id)
    {
        $user= User::find($id);
        if ($user) {
            $user->delete();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'User Deleted Successfully!'
        ]);

    }
}
