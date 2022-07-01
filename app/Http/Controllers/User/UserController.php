<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
                ->leftjoin('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*', 'users.name', 'users.user_image')
                ->where('visibility', '=', '1')
                ->orderBy('posts.post_date', 'desc')
                ->get();

        return view('home', compact('posts'));
    }
}
