<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $data['list'] = RoleModel::where('id', '!=', '1')->where('flag', '!=', '2')->get();
        return view('admin/role/list', $data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'role_name' => 'required',
        ]);


        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            $check_existance = RoleModel::where('name', $request->role_name)->where('flag','!=','2')->first();

            if (!$check_existance) {
                $data['name'] = $request->role_name;
                $data['flag'] = $request->status;
                $insert_data = RoleModel::insert($data);

                if ($insert_data) {
                    return response()->json(['code' => 200, 'message' => 'Role Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            }else{
                return response()->json(['code' => 400, 'message' => 'Role Already Exist,Enter Another Role']);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['role_data'] = RoleModel::where('id', $id)->first();
        return view('admin/role/edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $data['name'] = $request->role_name;
        $update_data = RoleModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Role Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }
}
