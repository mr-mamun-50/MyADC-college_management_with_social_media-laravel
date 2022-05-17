<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = DB::table('notices')
                ->orderBy('id', 'DESC')
                ->get();

        return view('admin.notices.index', compact('notice'));
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
            'subject' => 'required',
            'author' => 'required',
            'author_designation' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'subject' => $request->subject,
            'author' => $request->author,
            'author_designation' => $request->author_designation,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'description' => $request->description,
            'post_date' => now('6.0').date('')
        ];

        DB::table('notices')->insert($data);

        $notify = ['message'=>'Notice successfully added!', 'alert-type'=>'success'];
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
        $notice = DB::table('notices')
                ->where('id', $id)
                ->first();

        return view('admin.notices.print', compact('notice'));
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
            'subject' => 'required',
            'author' => 'required',
            'author_designation' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'subject' => $request->subject,
            'author' => $request->author,
            'author_designation' => $request->author_designation,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'description' => $request->description,
            'update_date' => now('6.0').date(''),
        ];

        DB::table('notices')->where('id', $id)->update($data);

        $notify = ['message'=>'Notice successfully updated!', 'alert-type'=>'success'];
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
        DB::table('notices')->where('id', $id)->delete();

        $notify = ['message'=>'Notice deleted successfully!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
