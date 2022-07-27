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


        return view('admin.students.profile', compact('item', 'xi_marks_mt', 'xi_marks_hy', 'xi_marks_fnl', 'xii_marks_mt', 'xii_marks_hy', 'xii_marks_fnl'));
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
