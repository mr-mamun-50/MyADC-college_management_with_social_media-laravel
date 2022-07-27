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


        function GPA($subject) {
            if($subject >= 80) $gpa = 5.00;
            else if($subject >= 70) $gpa = 4.00;
            else if($subject >= 60) $gpa = 3.50;
            else if($subject >= 50) $gpa = 3.00;
            else if($subject >= 40) $gpa = 2.00;
            else if($subject >= 33) $gpa = 1.00;
            else $gpa = 0.00;

            return $gpa;
        }

        $bangla_gpa = GPA(($request->bangla1 + $request->bangla2) / 2);
        $english_gpa = GPA(($request->english1 + $request->english2) / 2);
        $ict_gpa = GPA($request->ict);
        $physics_gpa = GPA(($request->physics1 + $request->physics2) / 2);
        $chemistry_gpa = GPA(($request->chemistry1 + $request->chemistry2) / 2);
        $biology_gpa = GPA(($request->biology1 + $request->biology2) / 2);
        $h_math_gpa = GPA(($request->h_math1 + $request->h_math2) / 2);
        $accounting_gpa = GPA(($request->accounting1 + $request->accounting2) / 2);
        $management_gpa = GPA(($request->management1 + $request->management2) / 2);
        $fbi_gpa = GPA(($request->fbi1 + $request->fbi2) / 2);
        $civics_gpa = GPA(($request->civics1 + $request->civics2) / 2);
        $logic_gpa = GPA(($request->logic1 + $request->logic2) / 2);
        $history_gpa = GPA(($request->history1 + $request->history2) / 2);
        $economics_gpa = GPA(($request->economics1 + $request->economics2) / 2);

        $sum_main = $bangla_gpa + $english_gpa + $ict_gpa + $physics_gpa + $chemistry_gpa + $biology_gpa + $accounting_gpa + $management_gpa + $fbi_gpa + $civics_gpa + $logic_gpa + $history_gpa;
        $avg_gpa = $sum_main / 6;

        $sum_4th = $h_math_gpa + $economics_gpa;

        if      ($sum_4th == 5)     $dt_gpa = (3/6) + $avg_gpa;
        else if ($sum_4th >= 4)     $dt_gpa = (2/6) + $avg_gpa;
        else if ($sum_4th >= 3.50)  $dt_gpa = (1.50/6) + $avg_gpa;
        else if ($sum_4th >= 3)     $dt_gpa = (1/6) + $avg_gpa;
        else                        $dt_gpa = $avg_gpa;

        if($dt_gpa > 5) $dt_gpa = 5.00;

        if      ($dt_gpa == 5)   { $grade = 'A+'; }
        else if ($dt_gpa >= 4)   { $grade = 'A'; }
        else if ($dt_gpa >= 3.5) { $grade = 'A-'; }
        else if ($dt_gpa >= 3)   { $grade = 'B'; }
        else if ($dt_gpa >= 2)   { $grade = 'C'; }
        else if ($dt_gpa >= 1)   { $grade = 'D'; }
        else if ($dt_gpa < 1)    { $grade = 'F'; }

        $data['gpa'] = round($dt_gpa, 2);
        $data['grade'] = $grade;

        // dd($data);

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


        function GPA($subject) {
            if($subject >= 80) $gpa = 5.00;
            else if($subject >= 70) $gpa = 4.00;
            else if($subject >= 60) $gpa = 3.50;
            else if($subject >= 50) $gpa = 3.00;
            else if($subject >= 40) $gpa = 2.00;
            else if($subject >= 33) $gpa = 1.00;
            else $gpa = 0.00;

            return $gpa;
        }

        $bangla_gpa = GPA(($request->bangla1 + $request->bangla2) / 2);
        $english_gpa = GPA(($request->english1 + $request->english2) / 2);
        $ict_gpa = GPA($request->ict);
        $physics_gpa = GPA(($request->physics1 + $request->physics2) / 2);
        $chemistry_gpa = GPA(($request->chemistry1 + $request->chemistry2) / 2);
        $biology_gpa = GPA(($request->biology1 + $request->biology2) / 2);
        $h_math_gpa = GPA(($request->h_math1 + $request->h_math2) / 2);
        $accounting_gpa = GPA(($request->accounting1 + $request->accounting2) / 2);
        $management_gpa = GPA(($request->management1 + $request->management2) / 2);
        $fbi_gpa = GPA(($request->fbi1 + $request->fbi2) / 2);
        $civics_gpa = GPA(($request->civics1 + $request->civics2) / 2);
        $logic_gpa = GPA(($request->logic1 + $request->logic2) / 2);
        $history_gpa = GPA(($request->history1 + $request->history2) / 2);
        $economics_gpa = GPA(($request->economics1 + $request->economics2) / 2);

        $sum_main = $bangla_gpa + $english_gpa + $ict_gpa + $physics_gpa + $chemistry_gpa + $biology_gpa + $accounting_gpa + $management_gpa + $fbi_gpa + $civics_gpa + $logic_gpa + $history_gpa;
        $avg_gpa = $sum_main / 6;

        $sum_4th = $h_math_gpa + $economics_gpa;

        if      ($sum_4th == 5)     $dt_gpa = (3/6) + $avg_gpa;
        else if ($sum_4th >= 4)     $dt_gpa = (2/6) + $avg_gpa;
        else if ($sum_4th >= 3.50)  $dt_gpa = (1.50/6) + $avg_gpa;
        else if ($sum_4th >= 3)     $dt_gpa = (1/6) + $avg_gpa;
        else                        $dt_gpa = $avg_gpa;

        if($dt_gpa > 5) $dt_gpa = 5.00;

        if      ($dt_gpa == 5)   { $grade = 'A+'; }
        else if ($dt_gpa >= 4)   { $grade = 'A'; }
        else if ($dt_gpa >= 3.5) { $grade = 'A-'; }
        else if ($dt_gpa >= 3)   { $grade = 'B'; }
        else if ($dt_gpa >= 2)   { $grade = 'C'; }
        else if ($dt_gpa >= 1)   { $grade = 'D'; }
        else if ($dt_gpa < 1)    { $grade = 'F'; }

        $data['gpa'] = round($dt_gpa, 2);
        $data['grade'] = $grade;


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


        function GPA($subject) {
            if($subject >= 80) $gpa = 5.00;
            else if($subject >= 70) $gpa = 4.00;
            else if($subject >= 60) $gpa = 3.50;
            else if($subject >= 50) $gpa = 3.00;
            else if($subject >= 40) $gpa = 2.00;
            else if($subject >= 33) $gpa = 1.00;
            else $gpa = 0.00;

            return $gpa;
        }

        $bangla_gpa = GPA(($request->bangla1 + $request->bangla2) / 2);
        $english_gpa = GPA(($request->english1 + $request->english2) / 2);
        $ict_gpa = GPA($request->ict);
        $physics_gpa = GPA(($request->physics1 + $request->physics2) / 2);
        $chemistry_gpa = GPA(($request->chemistry1 + $request->chemistry2) / 2);
        $biology_gpa = GPA(($request->biology1 + $request->biology2) / 2);
        $h_math_gpa = GPA(($request->h_math1 + $request->h_math2) / 2);
        $accounting_gpa = GPA(($request->accounting1 + $request->accounting2) / 2);
        $management_gpa = GPA(($request->management1 + $request->management2) / 2);
        $fbi_gpa = GPA(($request->fbi1 + $request->fbi2) / 2);
        $civics_gpa = GPA(($request->civics1 + $request->civics2) / 2);
        $logic_gpa = GPA(($request->logic1 + $request->logic2) / 2);
        $history_gpa = GPA(($request->history1 + $request->history2) / 2);
        $economics_gpa = GPA(($request->economics1 + $request->economics2) / 2);

        $sum_main = $bangla_gpa + $english_gpa + $ict_gpa + $physics_gpa + $chemistry_gpa + $biology_gpa + $accounting_gpa + $management_gpa + $fbi_gpa + $civics_gpa + $logic_gpa + $history_gpa;
        $avg_gpa = $sum_main / 6;

        $sum_4th = $h_math_gpa + $economics_gpa;

        if      ($sum_4th == 5)     $dt_gpa = (3/6) + $avg_gpa;
        else if ($sum_4th >= 4)     $dt_gpa = (2/6) + $avg_gpa;
        else if ($sum_4th >= 3.50)  $dt_gpa = (1.50/6) + $avg_gpa;
        else if ($sum_4th >= 3)     $dt_gpa = (1/6) + $avg_gpa;
        else                        $dt_gpa = $avg_gpa;

        if($dt_gpa > 5) $dt_gpa = 5.00;

        if      ($dt_gpa == 5)   { $grade = 'A+'; }
        else if ($dt_gpa >= 4)   { $grade = 'A'; }
        else if ($dt_gpa >= 3.5) { $grade = 'A-'; }
        else if ($dt_gpa >= 3)   { $grade = 'B'; }
        else if ($dt_gpa >= 2)   { $grade = 'C'; }
        else if ($dt_gpa >= 1)   { $grade = 'D'; }
        else if ($dt_gpa < 1)    { $grade = 'F'; }

        $data['gpa'] = round($dt_gpa, 2);
        $data['grade'] = $grade;


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
