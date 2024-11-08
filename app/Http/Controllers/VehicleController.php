<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;
use App\Models\VehicleTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function index()
    {
        $data['list'] = VehicleModel::where('flag', '!=', '2')->get();
        return view('admin/vehicle/list', $data);
    }

    public function add_from(Request $request)
    {
        return view('admin/vehicle/add_form');
    }

    public function vehicle_type()
    {
        $data['list'] = VehicleTypeModel::where('flag', '!=', '2')->get();
        return view('admin/vehicle/type_list', $data);
    }

    public function vehicle_type_add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'vehicle_name' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            $check_existance = VehicleTypeModel::where('vehicle_type', $request->vehicle_name)->where('flag','!=','2')->first();

            if (!$check_existance) {
                $data['vehicle_type'] = $request->vehicle_name;
                $data['flag'] = $request->status;
                $insert_data = VehicleTypeModel::insert($data);

                if ($insert_data) {
                    return response()->json(['code' => 200, 'message' => 'Vehicle Type Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            }else{
                return response()->json(['code' => 400, 'message' => 'Vehicle Type Already Exist,Enter Another Role']);
            }
        }
    }

    public function vehicle_type_edit(Request $request)
    {
        $id = $request->id;
        $data['vehicle_type_data'] = VehicleTypeModel::where('id', $id)->first();
        return view('admin/vehicle/type_edit', $data);
    }

    public function vehicle_type_update(Request $request)
    {
        $id = $request->id;
        $data['vehicle_type'] = $request->vehicle_name;
        $update_data = VehicleTypeModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Vehicle Type Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }
}
