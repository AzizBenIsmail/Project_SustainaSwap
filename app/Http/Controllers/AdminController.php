<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        //dd('here');
        return view('Back_office.dashboard');
    }
    public function create()
    {
        return view('users.create')
            ->with('roles',Role::all());
    }
    public function getAll()
    {
//        dd('here');
        $users = User::orderBy('created_at','desc')->paginate(3);
//        dd(count($users));
        return view('users.index')->with('users',$users);
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
