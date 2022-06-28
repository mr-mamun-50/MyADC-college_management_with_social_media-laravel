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
                ->get();

        return view('user.notice.index', compact('notice'));
    }
}
