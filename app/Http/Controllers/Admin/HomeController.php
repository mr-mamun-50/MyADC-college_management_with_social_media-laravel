<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;

class HomeController extends Controller
{
    public function index() {

        $users = DB::table('users')->orderby('id', 'desc')->get();
        $posts = DB::table('posts')->get();
        $students = DB::table('students')->where('c_class', 'XI')->orwhere('c_class', 'XII')->orwhere('c_class', 'HSC_Examinee')->get();
        $teachers = DB::table('teachers')->get();
        $public_post = DB::table('posts')->where('visibility', 1)->get();
        $private_post = DB::table('posts')->where('visibility', 0)->get();
        $xi_students = DB::table('students')->where('c_class', 'XI')->get();
        $xii_students = DB::table('students')->where('c_class', 'XII')->get();
        $hsc_students = DB::table('students')->where('c_class', 'HSC_Examinee')->get();

        return view('admin.dashboard', compact('users', 'posts', 'students', 'teachers', 'public_post', 'private_post', 'xi_students', 'xii_students', 'hsc_students'));
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
