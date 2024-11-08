<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\CrusherZoneModel;
use App\Models\RoleModel;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function change_status(Request $request)
    {
        $id = $request->id;
        $table = $request->table;
        $keys = $request->keys;
        if ($keys == 'Deleted') {
            $data['flag'] = '2';
        } else if ($keys == 'Deactivate') {
            $data['flag'] = '0';
        } else if ($keys == 'Activate') {
            $data['flag'] = '1';
        }
        $delete_data = RoleModel::action_data($table, $id, $data);
        if ($delete_data) {
            return response()->json(['code' => 200, 'message' => 'Data ' . $keys]);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }

    public function change_status_2(Request $request)
    {
        $id = $request->id;
        $table = $request->table;
        $keys = $request->keys;
        if ($keys == 'Clean Device ID') {
            $data['device_id'] = '';
        } else if ($keys == 'Verify') {
            $data['is_verify'] = '1';
        } else if ($keys == 'Unverify') {
            $data['is_verify'] = '0';
        }
        $delete_data = RoleModel::action_data($table, $id, $data);
        if ($delete_data) {
            return response()->json(['code' => 200, 'message' => 'Data ' . $keys]);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }

    public function get_city(Request $request)
    {
        $id = $request->id;
        $city_data = CityModel::where('state_id', $id)->get();
        $output = '<option value="" selected>Select City </option>';
        foreach ($city_data as $value) {
            $output .= '<option value="' . $value['id'] . '">' . $value['city'] . '</option>';
        }
        $response = array('status' => true, 'output' => $output);
        echo json_encode($response);
    }

    public function get_city_2(Request $request)
    {
        $id = $request->id;
        $city_data = CrusherZoneModel::where('state', $id)->get();
        
        $output = '<option value="" selected>Select City</option>';
        foreach ($city_data as $value) {
            $get_city_name = CityModel::where('id',$value->city)->first();
            $output .= '<option value="' . $get_city_name->id . '">' . $get_city_name->city . '</option>';
        }
        $response = array('status' => true, 'output' => $output);
        echo json_encode($response);
    }

    public function get_zone(Request $request)
    {
        $city_id = $request->city_id;
        $state_id = $request->state_id;
        $zone_data = CrusherZoneModel::where('state', $state_id)->where('city',$city_id)->get();
        
        $output = '<option value="" selected>Select Crusher</option>';
        foreach ($zone_data as $value) {
            $output .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        $response = array('status' => true, 'output' => $output);
        echo json_encode($response);
    }
}
