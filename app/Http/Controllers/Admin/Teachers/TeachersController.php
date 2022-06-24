<?php

namespace App\Http\Controllers\Admin\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = DB::table('teachers')->get();

        return view('admin.teachers.index', compact('teacher'));
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
            'name' => 'required',
            'index' => 'required',
            'position' => 'required',
            'department' => 'required',
            'subject' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'nid' => 'required',
            'edu_qualification' => 'required',
            'salary' => 'required',
        ]);
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'name' => $request->name,
            'index' => $request->index,
            'position' => $request->position,
            'department' => $request->department,
            'subject' => $request->subject,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'nid' => $request->nid,
            'phone' => $request->phone,
            'email' => $request->email,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'edu_qualification' => $request->edu_qualification,
            'salary' => $request->salary
        ];

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $input['photo'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/teachers');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(591, 709)->save($destinationPath . '/' . $input['photo']);

            $data['photo'] = $input['photo'];
        }

        if ($request->file('edu_certificate')) {
            $image = $request->file('edu_certificate');
            $input['edu_certificate'] = $name_slug . '-' . time() .'_certificate.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/teachers/certificate');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1650, 1275)->save($destinationPath . '/' . $input['edu_certificate']);

            $data['edu_certificate'] = $input['edu_certificate'];
        }

        if ($request->file('cv')) {
            $file = $request->file('cv');
            $input['cv'] = $name_slug . '-' . time() .'_cv.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/teachers/cv');
            $file->move($destinationPath, $input['cv']);
            $data['cv'] = $input['cv'];
        }

        DB::table('teachers')->insert($data);

        $notify = ['message' => 'New teacher successfully added!', 'alert-type' => 'success'];
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
        $teacher = DB::table('teachers')->where('id', $id)->first();

        return view('admin.teachers.profile', compact('teacher'));
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
        $name_slug = Str::of($request->name)->slug('-');
        $data = [
            'name' => $request->name,
            'index' => $request->index,
            'position' => $request->position,
            'department' => $request->department,
            'subject' => $request->subject,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'nid' => $request->nid,
            'phone' => $request->phone,
            'email' => $request->email,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'edu_qualification' => $request->edu_qualification,
            'salary' => $request->salary
        ];

        if ($request->photo) {

            if(File::exists(public_path('images/teachers/'). $request->old_photo)) {
                File::delete(public_path('images/teachers/'). $request->old_photo);
            }
            $image = $request->file('photo');
            $input['photo'] = $name_slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/teachers');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(591, 709)->save($destinationPath . '/' . $input['photo']);
            $data['photo'] = $input['photo'];
        }
        else {
            $data['photo'] = $request->old_photo;
        }

        if ($request->edu_certificate) {

            if(File::exists(public_path('images/teachers/certificate/'). $request->old_edu_certificate)) {
                File::delete(public_path('images/teachers/certificate/'). $request->old_edu_certificate);
            }
            $image = $request->file('edu_certificate');
            $input['edu_certificate'] = $name_slug . '-' . time() .'_certificate.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/teachers/certificate');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1650, 1275)->save($destinationPath . '/' . $input['edu_certificate']);
            $data['edu_certificate'] = $input['edu_certificate'];
        }
        else {
            $data['edu_certificate'] = $request->old_edu_certificate;
        }

        if ($request->cv) {

            if(File::exists(public_path('images/teachers/cv/'). $request->old_cv)) {
                File::delete(public_path('images/teachers/cv/'). $request->old_cv);
            }
            $file = $request->file('cv');
            $input['cv'] = $name_slug . '-' . time() .'_cv.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/teachers/cv');
            $file->move($destinationPath, $input['cv']);
            $data['cv'] = $input['cv'];
        }
        else {
            $data['cv'] = $request->old_cv;
        }

        DB::table('teachers')->where('id', $id)->update($data);

        $notify = ['message' => 'Teacher information successfully updated!', 'alert-type' => 'success'];
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
        $teacher = DB::table('teachers')->where('id', $id)->first();

        if(File::exists(public_path('images/teachers/'). $teacher->photo)) {
            File::delete(public_path('images/teachers/'). $teacher->photo);
        }
        if(File::exists(public_path('images/teachers/certificate/'). $teacher->edu_certificate)) {
            File::delete(public_path('images/teachers/certificate/'). $teacher->edu_certificate);
        }
        if(File::exists(public_path('images/teachers/cv/'). $teacher->cv)) {
            File::delete(public_path('images/teachers/cv/'). $teacher->cv);
        }

        DB::table('teachers')->where('id', $id)->delete();

        $notify = ['message'=>'Teacher successfully removed!', 'alert-type'=>'success'];
        return redirect()->route('teachers.index')->with($notify);
    }
}
