<?php

namespace App\Http\Controllers\Admin\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class IDcardController extends Controller
{
    public function index()
    {
        return view('admin.download.idcard.index');
    }

    public function download($id)
    {
        $data = DB::table('students')
                ->where('id', $id)
                ->first();
        // dd($data);

        $notify = ['message' => 'New student successfully added!', 'alert-type' => 'success'];
        return view('admin.download.id_card', compact('data'))->with($notify);
    }
}
