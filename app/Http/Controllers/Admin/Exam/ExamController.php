<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ExamController extends Controller
{
    public function update_mt(Request $request, $c_class, $id) {

        $data = [
            'bangla1' => $request->bangla1,
            'bangla2' => $request->bangla2,
            'english1' => $request->english1,
            'english2' => $request->english2,
            'ict' => $request->ict,
            'physics1' => $request->physics1,
            'physics2' => $request->physics2,
            'chemistry1' => $request->chemistry1,
            'chemistry2' => $request->chemistry2,
            'biology1' => $request->biology1,
            'biology2' => $request->biology2,
            'h_math1' => $request->h_math1,
            'h_math2' => $request->h_math2,
            'accounting1' => $request->accounting1,
            'accounting2' => $request->accounting2,
            'management1' => $request->management1,
            'management2' => $request->management2,
            'economics1' => $request->economics1,
            'economics2' => $request->economics2,
            'fbi1' => $request->fbi1,
            'fbi2' => $request->fbi2,
            'logic1' => $request->logic1,
            'logic2' => $request->logic2,
            'civics1' => $request->civics1,
            'civics2' => $request->civics2,
            'history1' => $request->history1,
            'history2' => $request->history2,
        ];

        $isInfo = DB::table('model_test_exam')->where('c_class', $c_class)->where('st_id', $id)->first();

        if($isInfo != null) {
            DB::table('model_test_exam')->where('c_class', $c_class)->where('st_id', $id)->update($data);
        }
        else {
            $data['c_class'] = $c_class;
            $data['st_id'] = $id;
            DB::table('model_test_exam')->insert($data);
        }

        $notify = ['message'=>'Marks successfully updated', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }

    public function update_hy(Request $request, $c_class, $id) {

        $data = [
            'bangla1' => $request->bangla1,
            'bangla2' => $request->bangla2,
            'english1' => $request->english1,
            'english2' => $request->english2,
            'ict' => $request->ict,
            'physics1' => $request->physics1,
            'physics2' => $request->physics2,
            'chemistry1' => $request->chemistry1,
            'chemistry2' => $request->chemistry2,
            'biology1' => $request->biology1,
            'biology2' => $request->biology2,
            'h_math1' => $request->h_math1,
            'h_math2' => $request->h_math2,
            'accounting1' => $request->accounting1,
            'accounting2' => $request->accounting2,
            'management1' => $request->management1,
            'management2' => $request->management2,
            'economics1' => $request->economics1,
            'economics2' => $request->economics2,
            'fbi1' => $request->fbi1,
            'fbi2' => $request->fbi2,
            'logic1' => $request->logic1,
            'logic2' => $request->logic2,
            'civics1' => $request->civics1,
            'civics2' => $request->civics2,
            'history1' => $request->history1,
            'history2' => $request->history2,
        ];

        $isInfo = DB::table('half_yearly_exam')->where('c_class', $c_class)->where('st_id', $id)->first();

        if($isInfo != null) {
            DB::table('half_yearly_exam')->where('c_class', $c_class)->where('st_id', $id)->update($data);
        }
        else {
            $data['c_class'] = $c_class;
            $data['st_id'] = $id;
            DB::table('half_yearly_exam')->insert($data);
        }

        $notify = ['message'=>'Marks successfully updated', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }

    public function update_fnl(Request $request, $c_class, $id) {

        $data = [
            'bangla1' => $request->bangla1,
            'bangla2' => $request->bangla2,
            'english1' => $request->english1,
            'english2' => $request->english2,
            'ict' => $request->ict,
            'physics1' => $request->physics1,
            'physics2' => $request->physics2,
            'chemistry1' => $request->chemistry1,
            'chemistry2' => $request->chemistry2,
            'biology1' => $request->biology1,
            'biology2' => $request->biology2,
            'h_math1' => $request->h_math1,
            'h_math2' => $request->h_math2,
            'accounting1' => $request->accounting1,
            'accounting2' => $request->accounting2,
            'management1' => $request->management1,
            'management2' => $request->management2,
            'economics1' => $request->economics1,
            'economics2' => $request->economics2,
            'fbi1' => $request->fbi1,
            'fbi2' => $request->fbi2,
            'logic1' => $request->logic1,
            'logic2' => $request->logic2,
            'civics1' => $request->civics1,
            'civics2' => $request->civics2,
            'history1' => $request->history1,
            'history2' => $request->history2,
        ];

        $isInfo = DB::table('final_exam')->where('c_class', $c_class)->where('st_id', $id)->first();

        if($isInfo != null) {
            DB::table('final_exam')->where('c_class', $c_class)->where('st_id', $id)->update($data);
        }
        else {
            $data['c_class'] = $c_class;
            $data['st_id'] = $id;
            DB::table('final_exam')->insert($data);
        }

        $notify = ['message'=>'Marks successfully updated', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
