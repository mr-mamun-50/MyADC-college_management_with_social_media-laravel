<?php

namespace App\Http\Controllers\User\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'user_id' => Auth::user()->id,
            'post_text' => $request->post_text,
            'post_date' => now('6.0').date(''),
            'visibility' => $request->visibility
        ];

        if ($request->file('image')) {
            $file = $request->file('image');
            $input['image'] = time() .'_post_image.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/posts/image');
            $file->move($destinationPath, $input['image']);
            $data['image'] = $input['image'];
        }
        else if ($request->file('video')) {
            $file = $request->file('video');
            $input['video'] = time() .'_post_video.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/posts/video');
            $file->move($destinationPath, $input['video']);
            $data['video'] = $input['video'];
        }

        DB::table('posts')->insert($data);

        $notify = ['message'=>'Post successfully created!', 'alert-type'=>'success'];
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
