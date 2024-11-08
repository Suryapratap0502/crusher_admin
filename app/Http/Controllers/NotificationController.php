<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function automatic()
    {
        $data['list'] = NotificationModel::where('flag', '!=', '2')->where('type','auto')->get();
        return view('admin/notification/auto_list', $data);
    }

    public function manual()
    {
        $data['list'] = NotificationModel::where('flag', '!=', '2')->where('type','manual')->get();
        return view('admin/notification/manual_list', $data);
    }

    public function send_auto(Request $request)
    {
        echo "i";
    }

    public function send_manual(Request $request)
    {
        echo "i";
    }
}
