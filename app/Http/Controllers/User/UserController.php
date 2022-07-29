<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    //__Homepage view
    public function index()
    {
        $posts = DB::table('posts')
                ->leftjoin('users', 'users.id', '=', 'posts.user_id')
                ->leftjoin('students', 'users.email', 'students.email')
                ->select('posts.*', 'users.name', 'users.user_image', 'students.department')
                ->where('visibility', '=', '1')
                ->orderBy('posts.post_date', 'desc')
                ->paginate(10);

        $peoples = DB::table('users')
                ->inRandomOrder()
                ->paginate(10);

        return view('home', compact('posts', 'peoples'));
    }

    //__User profile view
    public function profile($id)
    {
        $user = DB::table('users')->leftjoin('students', 'users.email', 'students.email')->select('users.*', 'students.department')->where('users.id', '=', $id)->first();

        if(Auth::user()->id == $user->id) {
            $posts = DB::table('posts')
                ->leftjoin('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*', 'users.name', 'users.user_image', 'users.created_at')
                ->where('posts.user_id', '=', $id)
                ->orderBy('posts.post_date', 'desc')
                ->paginate(10);
        }
        else {
            $posts = DB::table('posts')
                ->leftjoin('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*', 'users.name', 'users.user_image', 'users.created_at')
                ->where('posts.user_id', '=', $id)
                ->where('visibility', '=', '1')
                ->orderBy('posts.post_date', 'desc')
                ->paginate(10);
        }

        $xi_marks_mt = $xi_marks_hy = $xi_marks_fnl = $xii_marks_mt = $xii_marks_hy = $xii_marks_fnl = 0;

        if(Auth::user()->id == $user->id) {
            $xi_marks_mt = DB::table('model_test_exam')->leftjoin('students', 'model_test_exam.st_id', 'students.id')->select('model_test_exam.*', 'students.email')->where('students.email', $user->email)->where('model_test_exam.c_class', 'XI')->first();
            $xi_marks_hy = DB::table('half_yearly_exam')->leftjoin('students', 'half_yearly_exam.st_id', 'students.id')->select('half_yearly_exam.*', 'students.email')->where('students.email', $user->email)->where('half_yearly_exam.c_class', 'XI')->first();
            $xi_marks_fnl = DB::table('final_exam')->leftjoin('students', 'final_exam.st_id', 'students.id')->select('final_exam.*', 'students.email')->where('students.email', $user->email)->where('final_exam.c_class', 'XI')->first();

            $xii_marks_mt = DB::table('model_test_exam')->leftjoin('students', 'model_test_exam.st_id', 'students.id')->select('model_test_exam.*', 'students.email')->where('students.email', $user->email)->where('model_test_exam.c_class', 'XII')->first();
            $xii_marks_hy = DB::table('half_yearly_exam')->leftjoin('students', 'half_yearly_exam.st_id', 'students.id')->select('half_yearly_exam.*', 'students.email')->where('students.email', $user->email)->where('half_yearly_exam.c_class', 'XII')->first();
            $xii_marks_fnl = DB::table('final_exam')->leftjoin('students', 'final_exam.st_id', 'students.id')->select('final_exam.*', 'students.email')->where('students.email', $user->email)->where('final_exam.c_class', 'XII')->first();
        }

        return view('user.profile', compact('user', 'posts', 'xi_marks_mt', 'xi_marks_hy', 'xi_marks_fnl', 'xii_marks_mt', 'xii_marks_hy', 'xii_marks_fnl'));
    }


    //__View videos
    public function videos()
    {
        $videos = DB::table('posts')
                ->leftjoin('users', 'users.id', '=', 'posts.user_id')
                ->leftjoin('students', 'users.email', 'students.email')
                ->select('posts.*', 'users.name', 'users.user_image', 'students.department')
                ->where('video', '!=', 'NULL')
                ->where('visibility', '=', '1')
                ->orderBy('posts.post_date', 'desc')
                ->paginate(10);

        $peoples = DB::table('users')
                ->inRandomOrder()
                ->paginate(10);

        return view('user.videos', compact('videos', 'peoples'));
    }


    //__View Routines
    public function routines() {

        $xi_routine = DB::table('class_routine_xi')->get();
        $xii_routine = DB::table('class_routine_xii')->get();

        return view('user.routine.routines', compact('xi_routine', 'xii_routine'));
    }
    //__Print or download routine
    public function export($class, $dept)
    {
        if($class == 'XI') {
            $data = DB::table('class_routine_xi')->get();
        }
        else {
            $data = DB::table('class_routine_xii')->get();
        }

        return view('user.routine.print', compact('data', 'dept', 'class'));
    }

    //__Teacher and student info
    public function teacher_student_view()
    {
        $teacher = DB::table('teachers')->get();
        $student = DB::table('students')->get();

        return view('user.teacher_student_info.index', compact('teacher', 'student'));
    }
}
