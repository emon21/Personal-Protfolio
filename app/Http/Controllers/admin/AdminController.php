<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function AdminProfile()
    {
        $user = Auth::user();
        // return $user;
        return view('admin.profile', compact('user'));
    }

    public function AdminProfileUpdate(Request $req)
    {
        // return $req->all();
        $user = Auth::user();
        $user->name = $req->name;
        $user->email = $req->email;


        //User Profile Change
        if ($req->hasFile('profile_photo')) {
            //delete File
            // if(file_exists($user->image)){
            //    unlink($user->image);
              
            // }
            //file upload
            $file = $req->file('profile_photo');
            @unlink(public_path('admin/' . $user->image));
            $filename = time() . '.' . $file->getClientOriginalextension();
            $file->move(public_path('admin/'), $filename);
            $user['image'] = $filename;
           
       

        }

             //User Profile Change
    //   if($request->hasFile('profile_photo')) { 
    //     //delete File
    //     // if(file_exists($user->profile_photo)){
    //     //    unlink($user->profile_photo);
    //     //    }
    //     //file upload
    //     $file = $request->file('profile_photo');
    //     @unlink(public_path('upload/user_images/'.$user->profile_photo));

    //     //upload user image
    //     $filename = time() . '.' .$file->getClientOriginalextension();
    //     $file->move(public_path('upload/user_images/'), $filename); 
    //     $user->profile_photo = $filename;
    //  }



        $user->save();
        return redirect()->route('admin.profile');
    }

    //Change Password
    public function AdminPasswordChange()
    {
        $adminEdit = Auth::user();

        return view('admin.change_password', compact('adminEdit'));
    }

    //Update Password
    public function AdminPasswordUpdate(Request $request)
    {

        // $validateData = $request->validate([
        //    'current_password' => 'required',
        //    'new_password' => 'required|confirmed',

        // ]);

        $validateData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $hashedPassword = Auth::user()->password;
        //return $hashedPassword;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $admin = Auth::user();
            $admin->password = Hash::make($request->new_password);
            $admin->save();
            Auth::logout();
            // return redirect()->route('admin');
            return redirect()->route('login')->with('message', 'password update successfully, please login now !');
        } else {
            return redirect()->route('admin.profile');
        }
    }



    //logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin')->with('success', 'You have been Successfull logged out');
    }
}
