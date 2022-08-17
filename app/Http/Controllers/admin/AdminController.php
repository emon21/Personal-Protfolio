<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
       return view('admin.dashboard');
    }


    //logout
    public function logout()
    {
       auth()->logout();
       return redirect()->route('admin')->with('success','You have been Successfull logged out');

    }

}
