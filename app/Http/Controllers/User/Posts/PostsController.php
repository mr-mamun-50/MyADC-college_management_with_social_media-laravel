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
        $data = [
            'user_id' => Auth::user()->id,
            'post_text' => $request->post_text,
            'update_date' => now('6.0').date(''),
            'visibility' => $request->visibility
        ];

        if($request->file('image')) {

            $image_path = public_path('images/posts/image/'.$request->old_image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $video_path = public_path('images/posts/video/'.$request->old_video);
            if (File::exists($video_path)) {
                File::delete($video_path);
            }

            $file = $request->file('image');
            $input['image'] = time() .'_post_image.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/posts/image');
            $file->move($destinationPath, $input['image']);
            $data['image'] = $input['image'];
            $data['video'] = null;
        }

        if($request->file('video')) {

            $video_path = public_path('images/posts/video/'.$request->old_video);
            if (File::exists($video_path)) {
                File::delete($video_path);
            }
            $image_path = public_path('images/posts/image/'.$request->old_image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('video');
            $input['video'] = time() .'_post_video.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/posts/video');
            $file->move($destinationPath, $input['video']);
            $data['video'] = $input['video'];
            $data['image'] = null;
        }

        DB::table('posts')->where('id', $id)->update($data);

        $notify = ['message'=>'Post successfully updated!', 'alert-type'=>'success'];
        return redirect(url()->previous().'#post'.$id)->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = DB::table('posts')->where('id', '=', $id)->first();
        if($post->image) {
            $image_path = public_path('images/posts/image/'.$post->image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        if($post->video) {
            $video_path = public_path('images/posts/video/'.$post->video);
            if (File::exists($video_path)) {
                File::delete($video_path);
            }
        }
        DB::table('posts')->where('id', '=', $id)->delete();

        $notify = ['message'=>'Post successfully deleted!', 'alert-type'=>'success'];
        return redirect()->back()->with($notify);
    }
}
