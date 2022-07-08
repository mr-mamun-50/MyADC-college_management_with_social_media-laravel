<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NoticeViewController extends Controller
{
    public function index()
    {
        $notice = DB::table('notices')
                ->orderBy('id', 'DESC')
                ->paginate(5);

        $peoples = DB::table('users')
                ->inRandomOrder()
                ->paginate(10);

        return view('user.notice.index', compact('notice', 'peoples'));
    }
}
