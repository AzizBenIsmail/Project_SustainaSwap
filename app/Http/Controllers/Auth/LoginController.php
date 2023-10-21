<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // Default redirection
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //This function does not exist by default
    //It overwrites the default behavior after redirection which is on => line 31 => redirection to home
    protected function authenticated(Request $request)
    {
        //If the user is an admin or superAdmin
        if (auth()->user()->isSuperAdmin() || auth()->user()->isAdmin()) {
            //Redirect to admin layout
            return redirect('/admin');
        } else
            //If role is use
            //redirect to user layout
            return redirect('/user');
    }

}
