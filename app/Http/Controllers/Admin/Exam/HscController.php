<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('hsc_info')
                ->leftjoin('students', 'hsc_info.st_id', 'students.id')
                ->select('hsc_info.*', 'students.name', 'students.st_id')
                ->where('hsc_info.year', '=', date('Y'))
                ->get();

        return view('admin.hsc_info.current_year', compact('students'));
    }

    public function index_prev()
    {
        $students = DB::table('hsc_info')
                ->leftjoin('students', 'hsc_info.st_id', 'students.id')
                ->select('hsc_info.*', 'students.name', 'students.st_id')
                ->where('hsc_info.year', '!=', date('Y'))
                ->get();

        return view('admin.hsc_info.previous_records', compact('students'));
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
        $data = [
            'st_id' => $request->st_id,
            'year' => $request->year,
            'hsc_roll' => $request->hsc_roll,
            'hsc_reg' => $request->hsc_reg
        ];

        DB::table('hsc_info')->insert($data);

        $notify = ['message'=>'Information successfully added', 'alert-type'=>'success'];
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
        $data = [
            'result' => $request->result,
            'year' => $request->year,
            'hsc_roll' => $request->hsc_roll,
            'hsc_reg' => $request->hsc_reg
        ];

        DB::table('hsc_info')->where('id', $id)->update($data);

        $notify = ['message'=>'Information successfully Updated', 'alert-type'=>'success'];
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
        //
    }
}
