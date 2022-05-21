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
        $student = DB::table('students')->where('id', $id)->first();

        return view('admin.students.profile', compact('student'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
