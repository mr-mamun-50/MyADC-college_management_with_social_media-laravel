<?php

namespace App\Http\Controllers\Admin\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.download.testimonial.index');
    }

    public function generate(Request $data) {
        $type = 'Testimonial';

        $notify = ['message' => 'Testimonial successfully generated!', 'alert-type' => 'success'];
        return view('admin.download.testimonial.testimonial', compact('data', 'type'))->with($notify);
    }
}
