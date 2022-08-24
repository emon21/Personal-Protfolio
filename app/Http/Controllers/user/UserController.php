<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {

        return view('user.dashboard');
    }


    //logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('website')->with('success', 'You have been Successfull logged out');
    }

    //    public function logout(){
    //     Auth::logout();
    //     return redirect('/login');
    // }

    public function UserProfile()
    {
        $user = Auth::user();
        // return $user;
        return view('user.user_profile', compact('user'));
    }
}
