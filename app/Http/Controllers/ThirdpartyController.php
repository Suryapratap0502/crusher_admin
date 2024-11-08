<?php

namespace App\Http\Controllers;

use App\Models\ThirdpartyModel;
use Illuminate\Http\Request;

class ThirdpartyController extends Controller
{
    public function index()
    {
        $data['list'] = ThirdpartyModel::where('flag', '!=', '2')->get();
        return view('admin/thirdparty/all_setup', $data);
    }
}
