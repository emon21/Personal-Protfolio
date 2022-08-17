<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
  //  protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


    public function authenticated()
    {
         if (Auth::user()->role_as == 'admin') {
            return redirect()->route('admin.dashboard')->with('status' ,'wellcome to Admin Dashboard');
         }
         else if(Auth::user()->role_as == 'user'){

            return redirect()->route('user.dashboard')->with('status' ,'Login In Successfull');
         }
         else{
            return redirect('/');
         }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
