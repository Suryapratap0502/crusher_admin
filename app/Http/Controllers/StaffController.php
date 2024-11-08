<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\StaffModel;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $data['list'] = StaffModel::where('flag', '!=', '2')->get();
        $data['role_list'] = RoleModel::where('flag', '!=', '2')->where('flag','1')->where('id','!=','1')->get();
        return view('admin/staff/list', $data);
    }
}
