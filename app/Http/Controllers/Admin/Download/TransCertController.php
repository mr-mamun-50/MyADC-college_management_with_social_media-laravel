<?php

namespace App\Http\Controllers\Admin\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransCertController extends Controller
{
    public function index()
    {
        return view('admin.download.transfer_certificate.index');
    }

    public function generate(Request $data) {
        $type = 'TC';

        $notify = ['message' => 'Transfer certificate successfully generated!', 'alert-type' => 'success'];
        return view('admin.download.transfer_certificate.trans_cert', compact('data', 'type'))->with($notify);
    }
}
