<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class AllStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::table('students')->get();

        return view('admin.students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'st_id' => 'required',
            'name' => 'required',
            'session' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'birth_reg_nid' => 'required',
            'ssc_res' => 'required',
            'ssc_year' => 'required'
        ]);
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'st_id' => $request->st_id,
            'name' => $request->name,
            'session' => $request->session,
            'department' => $request->department,
            'c_class' => $request->c_class,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'birth_reg_nid' => $request->birth_reg_nid,
            'ssc_res' => $request->ssc_res,
            'ssc_board' => $request->ssc_board,
            'ssc_dept' => $request->ssc_dept,
            'ssc_school' => $request->ssc_school,
            'ssc_year' => $request->ssc_year,
        ];

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $input['photo'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/students');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(591, 709)->save($destinationPath . '/' . $input['photo']);

            $data['photo'] = $input['photo'];
        }

        if ($request->file('ssc_testimonial')) {
            $image = $request->file('ssc_testimonial');
            $input['ssc_testimonial'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/testimonials/ssc');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1650, 1275)->save($destinationPath . '/' . $input['ssc_testimonial']);

            $data['ssc_testimonial'] = $input['ssc_testimonial'];
        }

        if ($request->file('ssc_marksheet')) {
            $image = $request->file('ssc_marksheet');
            $input['ssc_marksheet'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/marksheets');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1275, 1650)->save($destinationPath . '/' . $input['ssc_marksheet']);

            $data['ssc_marksheet'] = $input['ssc_marksheet'];
        }
        // dd($data);
        DB::table('students')->insert($data);

        $notify = ['message' => 'New student successfully added!', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::table('students')->where('id', $id)->first();

        $xi_marks_mt = DB::table('model_test_exam')->where('st_id', $id)->where('c_class', 'XI')->first();
        $xi_marks_hy = DB::table('half_yearly_exam')->where('st_id', $id)->where('c_class', 'XI')->first();
        $xi_marks_fnl = DB::table('final_exam')->where('st_id', $id)->where('c_class', 'XI')->first();

        $xii_marks_mt = DB::table('model_test_exam')->where('st_id', $id)->where('c_class', 'XII')->first();
        $xii_marks_hy = DB::table('half_yearly_exam')->where('st_id', $id)->where('c_class', 'XII')->first();
        $xii_marks_fnl = DB::table('final_exam')->where('st_id', $id)->where('c_class', 'XII')->first();



        // First year result analysis

        $sum_xi_mt = $sum_xi_hy = $sum_xi_fnl = $avg_xi_mt = $avg_xi_hy = $avg_xi_fnl = $gpa_xi_mt = $gpa_xi_hy = $gpa_xi_fnl = 0;
        $grade_xi_mt =  $grade_xi_hy =  $grade_xi_fnl = 0;

        if($xi_marks_mt)
        {
            $sum_xi_mt = $xi_marks_mt->bangla1 + $xi_marks_mt->bangla2 + $xi_marks_mt->english1 + $xi_marks_mt->english2 + $xi_marks_mt->ict
                        + $xi_marks_mt->physics1 + $xi_marks_mt->physics2 + $xi_marks_mt->chemistry1 + $xi_marks_mt->chemistry2 + $xi_marks_mt->biology1
                        + $xi_marks_mt->biology2 + $xi_marks_mt->h_math1 + $xi_marks_mt->h_math2 + $xi_marks_mt->accounting1 + $xi_marks_mt->accounting2
                        + $xi_marks_mt->management1 + $xi_marks_mt->management2 + $xi_marks_mt->fbi1 + $xi_marks_mt->fbi2 + $xi_marks_mt->economics1
                        + $xi_marks_mt->economics2 + $xi_marks_mt->civics1 + $xi_marks_mt->civics2 + $xi_marks_mt->logic1 + $xi_marks_mt->logic2
                        + $xi_marks_mt->history1 + $xi_marks_mt->history2;

            $avg_xi_mt = $sum_xi_mt / 13;
            $gpa_xi_mt = round(($avg_xi_mt * 5) / 100, 2);

            if      ($gpa_xi_mt == 5)   { $grade_xi_mt = 'A+'; }
            else if ($gpa_xi_mt >= 4)   { $grade_xi_mt = 'A'; }
            else if ($gpa_xi_mt >= 3.5) { $grade_xi_mt = 'A-'; }
            else if ($gpa_xi_mt >= 3)   { $grade_xi_mt = 'B'; }
            else if ($gpa_xi_mt >= 2)   { $grade_xi_mt = 'C'; }
            else if ($gpa_xi_mt >= 1)   { $grade_xi_mt = 'D'; }
            else if ($gpa_xi_mt < 1)    { $grade_xi_mt = 'F'; }
        }

        if($xi_marks_hy)
        {
            $sum_xi_hy = $xi_marks_hy->bangla1 + $xi_marks_hy->bangla2 + $xi_marks_hy->english1 + $xi_marks_hy->english2 + $xi_marks_hy->ict
                        + $xi_marks_hy->physics1 + $xi_marks_hy->physics2 + $xi_marks_hy->chemistry1 + $xi_marks_hy->chemistry2 + $xi_marks_hy->biology1
                        + $xi_marks_hy->biology2 + $xi_marks_hy->h_math1 + $xi_marks_hy->h_math2 + $xi_marks_hy->accounting1 + $xi_marks_hy->accounting2
                        + $xi_marks_hy->management1 + $xi_marks_hy->management2 + $xi_marks_hy->fbi1 + $xi_marks_hy->fbi2 + $xi_marks_hy->economics1
                        + $xi_marks_hy->economics2 + $xi_marks_hy->civics1 + $xi_marks_hy->civics2 + $xi_marks_hy->logic1 + $xi_marks_hy->logic2
                        + $xi_marks_hy->history1 + $xi_marks_hy->history2;

            $avg_xi_hy = $sum_xi_hy / 13;
            $gpa_xi_hy = round(($avg_xi_hy * 5) / 100, 2);

            if      ($gpa_xi_hy == 5)   { $grade_xi_hy = 'A+'; }
            else if ($gpa_xi_hy >= 4)   { $grade_xi_hy = 'A'; }
            else if ($gpa_xi_hy >= 3.5) { $grade_xi_hy = 'A-'; }
            else if ($gpa_xi_hy >= 3)   { $grade_xi_hy = 'B'; }
            else if ($gpa_xi_hy >= 2)   { $grade_xi_hy = 'C'; }
            else if ($gpa_xi_hy >= 1)   { $grade_xi_hy = 'D'; }
            else if ($gpa_xi_hy < 1)    { $grade_xi_hy = 'F'; }
        }

        if($xi_marks_fnl)
        {
            $sum_xi_fnl = $xi_marks_fnl->bangla1 + $xi_marks_fnl->bangla2 + $xi_marks_fnl->english1 + $xi_marks_fnl->english2 + $xi_marks_fnl->ict
                        + $xi_marks_fnl->pfnlsics1 + $xi_marks_fnl->pfnlsics2 + $xi_marks_fnl->chemistry1 + $xi_marks_fnl->chemistry2 + $xi_marks_fnl->biology1
                        + $xi_marks_fnl->biology2 + $xi_marks_fnl->h_math1 + $xi_marks_fnl->h_math2 + $xi_marks_fnl->accounting1 + $xi_marks_fnl->accounting2
                        + $xi_marks_fnl->management1 + $xi_marks_fnl->management2 + $xi_marks_fnl->fbi1 + $xi_marks_fnl->fbi2 + $xi_marks_fnl->economics1
                        + $xi_marks_fnl->economics2 + $xi_marks_fnl->civics1 + $xi_marks_fnl->civics2 + $xi_marks_fnl->logic1 + $xi_marks_fnl->logic2
                        + $xi_marks_fnl->history1 + $xi_marks_fnl->history2;

            $avg_xi_fnl = $sum_xi_fnl / 13;
            $gpa_xi_fnl = round(($avg_xi_fnl * 5) / 100, 2);

            if      ($gpa_xi_fnl == 5)   { $grade_xi_fnl = 'A+'; }
            else if ($gpa_xi_fnl >= 4)   { $grade_xi_fnl = 'A'; }
            else if ($gpa_xi_fnl >= 3.5) { $grade_xi_fnl = 'A-'; }
            else if ($gpa_xi_fnl >= 3)   { $grade_xi_fnl = 'B'; }
            else if ($gpa_xi_fnl >= 2)   { $grade_xi_fnl = 'C'; }
            else if ($gpa_xi_fnl >= 1)   { $grade_xi_fnl = 'D'; }
            else if ($gpa_xi_fnl < 1)    { $grade_xi_fnl = 'F'; }
        }



        // Second year result analysis

        $sum_xii_mt = $sum_xii_hy = $sum_xii_fnl = $avg_xii_mt = $avg_xii_hy = $avg_xii_fnl = $gpa_xii_mt = $gpa_xii_hy = $gpa_xii_fnl = 0;
        $grade_xii_mt =  $grade_xii_hy =  $grade_xii_fnl = 0;

        if($xii_marks_mt)
        {
            $sum_xii_mt = $xii_marks_mt->bangla1 + $xii_marks_mt->bangla2 + $xii_marks_mt->english1 + $xii_marks_mt->english2 + $xii_marks_mt->ict
                        + $xii_marks_mt->physics1 + $xii_marks_mt->physics2 + $xii_marks_mt->chemistry1 + $xii_marks_mt->chemistry2 + $xii_marks_mt->biology1
                        + $xii_marks_mt->biology2 + $xii_marks_mt->h_math1 + $xii_marks_mt->h_math2 + $xii_marks_mt->accounting1 + $xii_marks_mt->accounting2
                        + $xii_marks_mt->management1 + $xii_marks_mt->management2 + $xii_marks_mt->fbi1 + $xii_marks_mt->fbi2 + $xii_marks_mt->economics1
                        + $xii_marks_mt->economics2 + $xii_marks_mt->civics1 + $xii_marks_mt->civics2 + $xii_marks_mt->logic1 + $xii_marks_mt->logic2
                        + $xii_marks_mt->history1 + $xii_marks_mt->history2;

            $avg_xii_mt = $sum_xii_mt / 13;
            $gpa_xii_mt = round(($avg_xii_mt * 5) / 100, 2);

            if      ($gpa_xii_mt == 5)   { $grade_xii_mt = 'A+'; }
            else if ($gpa_xii_mt >= 4)   { $grade_xii_mt = 'A'; }
            else if ($gpa_xii_mt >= 3.5) { $grade_xii_mt = 'A-'; }
            else if ($gpa_xii_mt >= 3)   { $grade_xii_mt = 'B'; }
            else if ($gpa_xii_mt >= 2)   { $grade_xii_mt = 'C'; }
            else if ($gpa_xii_mt >= 1)   { $grade_xii_mt = 'D'; }
            else if ($gpa_xii_mt < 1)    { $grade_xii_mt = 'F'; }
        }

        if($xii_marks_hy)
        {
            $sum_xii_hy = $xii_marks_hy->bangla1 + $xii_marks_hy->bangla2 + $xii_marks_hy->english1 + $xii_marks_hy->english2 + $xii_marks_hy->ict
                        + $xii_marks_hy->physics1 + $xii_marks_hy->physics2 + $xii_marks_hy->chemistry1 + $xii_marks_hy->chemistry2 + $xii_marks_hy->biology1
                        + $xii_marks_hy->biology2 + $xii_marks_hy->h_math1 + $xii_marks_hy->h_math2 + $xii_marks_hy->accounting1 + $xii_marks_hy->accounting2
                        + $xii_marks_hy->management1 + $xii_marks_hy->management2 + $xii_marks_hy->fbi1 + $xii_marks_hy->fbi2 + $xii_marks_hy->economics1
                        + $xii_marks_hy->economics2 + $xii_marks_hy->civics1 + $xii_marks_hy->civics2 + $xii_marks_hy->logic1 + $xii_marks_hy->logic2
                        + $xii_marks_hy->history1 + $xii_marks_hy->history2;

            $avg_xii_hy = $sum_xii_hy / 13;
            $gpa_xii_hy = round(($avg_xii_hy * 5) / 100, 2);

            if      ($gpa_xii_hy == 5)   { $grade_xii_hy = 'A+'; }
            else if ($gpa_xii_hy >= 4)   { $grade_xii_hy = 'A'; }
            else if ($gpa_xii_hy >= 3.5) { $grade_xii_hy = 'A-'; }
            else if ($gpa_xii_hy >= 3)   { $grade_xii_hy = 'B'; }
            else if ($gpa_xii_hy >= 2)   { $grade_xii_hy = 'C'; }
            else if ($gpa_xii_hy >= 1)   { $grade_xii_hy = 'D'; }
            else if ($gpa_xii_hy < 1)    { $grade_xii_hy = 'F'; }
        }

        if($xii_marks_fnl)
        {
            $sum_xii_fnl = $xii_marks_fnl->bangla1 + $xii_marks_fnl->bangla2 + $xii_marks_fnl->english1 + $xii_marks_fnl->english2 + $xii_marks_fnl->ict
                        + $xii_marks_fnl->pfnlsics1 + $xii_marks_fnl->pfnlsics2 + $xii_marks_fnl->chemistry1 + $xii_marks_fnl->chemistry2 + $xii_marks_fnl->biology1
                        + $xii_marks_fnl->biology2 + $xii_marks_fnl->h_math1 + $xii_marks_fnl->h_math2 + $xii_marks_fnl->accounting1 + $xii_marks_fnl->accounting2
                        + $xii_marks_fnl->management1 + $xii_marks_fnl->management2 + $xii_marks_fnl->fbi1 + $xii_marks_fnl->fbi2 + $xii_marks_fnl->economics1
                        + $xii_marks_fnl->economics2 + $xii_marks_fnl->civics1 + $xii_marks_fnl->civics2 + $xii_marks_fnl->logic1 + $xii_marks_fnl->logic2
                        + $xii_marks_fnl->history1 + $xii_marks_fnl->history2;

            $avg_xii_fnl = $sum_xii_fnl / 13;
            $gpa_xii_fnl = round(($avg_xii_fnl * 5) / 100, 2);

            if      ($gpa_xii_fnl == 5)   { $grade_xii_fnl = 'A+'; }
            else if ($gpa_xii_fnl >= 4)   { $grade_xii_fnl = 'A'; }
            else if ($gpa_xii_fnl >= 3.5) { $grade_xii_fnl = 'A-'; }
            else if ($gpa_xii_fnl >= 3)   { $grade_xii_fnl = 'B'; }
            else if ($gpa_xii_fnl >= 2)   { $grade_xii_fnl = 'C'; }
            else if ($gpa_xii_fnl >= 1)   { $grade_xii_fnl = 'D'; }
            else if ($gpa_xii_fnl < 1)    { $grade_xii_fnl = 'F'; }
        }


        // dd($grade_xii_mt);

        return view('admin.students.profile', compact('item', 'xi_marks_mt', 'xi_marks_hy', 'xi_marks_fnl', 'xii_marks_mt', 'xii_marks_hy', 'xii_marks_fnl',
                                                        'grade_xi_mt', 'grade_xi_hy', 'grade_xi_fnl', 'gpa_xi_mt', 'gpa_xi_hy', 'gpa_xi_fnl',
                                                        'grade_xii_mt', 'grade_xii_hy', 'grade_xii_fnl', 'gpa_xii_mt', 'gpa_xii_hy', 'gpa_xii_fnl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'st_id' => 'required',
            'name' => 'required',
            'session' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'birth_reg_nid' => 'required',
            'ssc_res' => 'required',
            'ssc_year' => 'required'
        ]);
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'st_id' => $request->st_id,
            'name' => $request->name,
            'session' => $request->session,
            'department' => $request->department,
            'c_class' => $request->c_class,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'birth_reg_nid' => $request->birth_reg_nid,
            'ssc_res' => $request->ssc_res,
            'ssc_board' => $request->ssc_board,
            'ssc_dept' => $request->ssc_dept,
            'ssc_school' => $request->ssc_school,
            'ssc_year' => $request->ssc_year,
        ];

        if ($request->photo) {

            if(File::exists(public_path('images/students/'). $request->old_photo)) {
                File::delete(public_path('images/students/'). $request->old_photo);
            }

            $image = $request->file('photo');
            $input['photo'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/students');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(591, 709)->save($destinationPath . '/' . $input['photo']);

            $data['photo'] = $input['photo'];
        }
        else {
            $data['photo'] = $request->old_photo;
        }

        if ($request->ssc_testimonial) {

            if(File::exists(public_path('images/testimonials/ssc/'). $request->old_ssc_testimonial)) {
                File::delete(public_path('images/testimonials/ssc/'). $request->old_ssc_testimonial);
            }

            $image = $request->file('ssc_testimonial');
            $input['ssc_testimonial'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/testimonials/ssc');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1650, 1275)->save($destinationPath . '/' . $input['ssc_testimonial']);

            $data['ssc_testimonial'] = $input['ssc_testimonial'];
        }
        else {
            $data['ssc_testimonial'] = $request->old_ssc_testimonial;
        }

        if ($request->ssc_marksheet) {

            if(File::exists(public_path('images/marksheets/'). $request->old_ssc_marksheet)) {
                File::delete(public_path('images/marksheets/'). $request->old_ssc_marksheet);
            }

            $image = $request->file('ssc_marksheet');
            $input['ssc_marksheet'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/marksheets');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1275, 1650)->save($destinationPath . '/' . $input['ssc_marksheet']);

            $data['ssc_marksheet'] = $input['ssc_marksheet'];
        }
        else {
            $data['ssc_marksheet'] = $request->old_ssc_marksheet;
        }
        // dd($data);
        DB::table('students')->where('id', $id)->update($data);

        $notify = ['message' => 'Student information successfully updated!', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        if(File::exists(public_path('images/students/'). $student->photo)) {
            File::delete(public_path('images/students/'). $student->photo);
        }
        if(File::exists(public_path('images/testimonials/ssc/'). $student->ssc_testimonial)) {
            File::delete(public_path('images/testimonials/ssc/'). $student->ssc_testimonial);
        }
        if(File::exists(public_path('images/marksheets/'). $student->ssc_marksheet)) {
            File::delete(public_path('images/marksheets/'). $student->ssc_marksheet);
        }
        DB::table('students')->where('id',$id)->delete();

        $notify = ['message'=>'Student successfully removed!', 'alert-type'=>'success'];
        return redirect()->route('students.index')->with($notify);
    }

    //__Class transfer
    public function transfer_class($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        $notify = ['message'=>'Student successfully transferred!', 'alert-type'=>'success'];

        if($student->c_class == 'XI') {
            $data['c_class'] = 'XII';
            DB::table('students')->where('id', $id)->update($data);
            return redirect()->route('students_xi.index')->with($notify);
        }
        else if($student->c_class == 'XII') {
            $data['c_class'] = 'HSC_Examinee';
            DB::table('students')->where('id', $id)->update($data);
            return redirect()->route('students_xii.index')->with($notify);
        }
        else if($student->c_class == 'HSC_Examinee') {
            $data['c_class'] = 'Old_Student';
            DB::table('students')->where('id', $id)->update($data);
            return redirect()->route('hsc_examinee.index')->with($notify);
        }
    }
}
