<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;

class HomeController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function password_change() {
        return view('admin.auth.change_pass');
    }

    public function password_update(Request $request) {
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|max:13|string|confirmed',
            'password_confirmation'=>'required',
        ]);

        $admin = Auth::guard('admin')->user();
        if(Hash::check($request->current_password, $admin->password)){

            $admin->password = Hash::make($request->password);
            $admin->save();

            Auth::guard('admin')->logout();

            $notify = ['message'=>'Password changed successfully !', 'alert-type'=>'success'];
            return redirect()->route('admin.login')->with($notify);
        }else {
            return redirect()->back()->with('Error', 'Current password not matched !');
        }
    }
}
