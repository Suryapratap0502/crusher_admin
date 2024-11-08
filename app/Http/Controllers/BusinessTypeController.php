<?php

namespace App\Http\Controllers;

use App\Models\BusinessTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessTypeController extends Controller
{
    public function index()
    {
        $data['list'] = BusinessTypeModel::where('flag', '!=', '2')->get();
        return view('admin/business_type/list', $data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'bt_name' => 'required',
        ]);


        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            $check_existance = BusinessTypeModel::where('name', $request->bt_name)->where('flag','!=','2')->first();

            if (!$check_existance) {
                $data['name'] = $request->bt_name;
                $data['flag'] = $request->status;
                $insert_data = BusinessTypeModel::insert($data);

                if ($insert_data) {
                    return response()->json(['code' => 200, 'message' => 'Business Type Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            }else{
                return response()->json(['code' => 400, 'message' => 'Business Type Exist,Enter Another Business Type']);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['bt_data'] = BusinessTypeModel::where('id', $id)->first();
        return view('admin/business_type/edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $data['name'] = $request->bt_name;
        $update_data = BusinessTypeModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Business Type Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }
}
