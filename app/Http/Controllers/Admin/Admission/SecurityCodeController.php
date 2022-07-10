<?php

namespace App\Http\Controllers\Admin\Admission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SecurityCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('admission_security_code')->get();

        return view('admin.admission.security_code', compact('data'));
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
            'ssc_roll' => 'required|max:6|unique:admission_security_code',
            'ssc_reg' => 'required|max:10|unique:admission_security_code',
            'security_code' => 'required|max:6|unique:admission_security_code'
        ]);

        $data = [
            'name' => $request->name,
            'ssc_roll' => $request->ssc_roll,
            'ssc_reg' => $request->ssc_reg,
            'security_code' => $request->security_code,
        ];

        DB::table('admission_security_code')->insert($data);

        $notify = ['message'=>'Security information successfully added!', 'alert-type'=>'success'];
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
        //
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
            'payment_transection' => 'required'
        ]);

        $data = [
            'payment_transection' => $request->payment_transection
        ];

        DB::table('admission_security_code')->where('id', $id)->update($data);

        $notify = ['message'=>'Rocket transaction successfully updated!', 'alert-type'=>'success'];
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
        DB::table('admission_security_code')->where('id', $id)->delete();

        $notify = ['message'=>'Security information successfully deleted!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
