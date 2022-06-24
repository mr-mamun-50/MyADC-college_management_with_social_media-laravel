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

    public function generate($id)
    {
        $data = DB::table('students')
                ->where('id', $id)
                ->first();
        $type = 'student_ID_card';

        $notify = ['message' => 'New student successfully added!', 'alert-type' => 'success'];
        return view('admin.download.id_card.id_card', compact('data', 'type'))->with($notify);
    }

    public function teachers_id_generate($id)
    {
        $data = DB::table('teachers')
                ->where('id', $id)
                ->first();
        $type = 'teacher_ID_card';

        $notify = ['message' => 'New student successfully added!', 'alert-type' => 'success'];
        return view('admin.download.id_card.teachers_id_card', compact('data', 'type'))->with($notify);
    }
}
