<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RoutineXIIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('class_routine_xii')->get();

        return view('admin.routines.routine_xii', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dept)
    {
        $data = DB::table('class_routine_xii')->get();
        $class = 'XII';

        return view('admin.routines.print', compact('data', 'dept', 'class'));
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
        if($request->dept == 'science') {
            $data = [
                'sc10_30' => $request->sc10_30,
                'sc11_15' => $request->sc11_15,
                'sc12_00' => $request->sc12_00,
                'sc12_45' => $request->sc12_45,
                'sc1_30' => $request->sc1_30
            ];
        }
        else if($request->dept == 'humanities') {
            $data = [
                'hum10_30' => $request->hum10_30,
                'hum11_15' => $request->hum11_15,
                'hum12_00' => $request->hum12_00,
                'hum12_45' => $request->hum12_45,
                'hum1_30' => $request->hum1_30
            ];
        }
        else if($request->dept == 'business') {
            $data = [
                'bus10_30' => $request->bus10_30,
                'bus11_15' => $request->bus11_15,
                'bus12_00' => $request->bus12_00,
                'bus12_45' => $request->bus12_45,
                'bus1_30' => $request->bus1_30
            ];
        }

        DB::table('class_routine_xii')->where('id', $id)->update($data);

        $notify = ['message'=>'Routine successfully updated!', 'alert-type'=>'success'];
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
