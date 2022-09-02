<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function ProfileUpdate(Request $request)
    {
        //return  $user;
        $user = Auth::user();
        // $user = User::find($request->user);
        $user->name = $request->name;
        $user->email = $request->email;

         //User Profile Change
         if ($request->hasFile('profile_photo')) {
            //delete File
            // if(file_exists($user->image)){
            //    unlink($user->image);

            // }
            //file upload
            $file = $request->file('profile_photo');
            @unlink(public_path('user/' . $user->image));
            $filename = time() . '.' . $file->getClientOriginalextension();
            $file->move(public_path('user/'), $filename);
            
           // $user['image'] = $filename;
            $user->image = 'user/'.$filename;

        //      $filename = time() . '.' .$request->user_picture->getClientOriginalextension();
        //  $request->user_picture->move(public_path('backend/user/'), $filename);
        //  $user->image = 'backend/user/'.$filename;
        //  $user->save();


        }

        $user->save();

        return redirect()->route('user.dashboard');
    }

    public function UserPasswordChange()
    {
        $user = Auth::user();
        // $user = User::find($id);
        // return $user->password;
        return view('user.user_password', compact('user'));
    }


    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $hashedPassword = Auth::user()->password;
        //return $hashedPassword;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = Auth::user();
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            // return redirect()->route('admin');
            return redirect()->route('login')->with('message', 'password update successfully, please login now !');
        } else {
            return redirect()->route('user.dashboard');

            // return redirect()->route('admin.profile');
        }
    }
}