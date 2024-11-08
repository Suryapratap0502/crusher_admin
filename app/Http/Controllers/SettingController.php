<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin/settings');
    }

    public function store(Request $request)
    {

        try {
            //dd($request->all());
            $this->validate($request, [
                //"type" => "required",
                // 'latLong.type' => 'required|string|in:Point',
                // 'latLong.coordinates' => 'required|array|size:2',
                // 'latLong.coordinates.*' => 'required|numeric',
                "facilities" => "required",
                "services" => "required",
                "consumablesRecordId" => "required",
                "displayName" => "required",
                "managedBy" => "required",
                "machineId" => "required",
                "image" => "required"

            ], [
                //"type.required"=>"Please fill Lat Long Type field",
                //  "coordinates.required"=>"Please fill Coordinates field",
                "facilities.required" => "Please fill facilities field",
                "services.required" => "Please fill services field",
                "consumablesRecordId.required" => "Please fill consumablesRecordId field",
                "displayName.required" => "Please fill displayName field",
                "managedBy.required" => "Please fill managed by field",
                "machineId.required" => "Please fill machineId field",
                "image.required" => "Please select image field",


            ]);

            $input = $request->all();
            // dd($input);
            unset($input['_token']);
            $input['__v'] = 0;
            $input['status'] = "active";
            if ($request->hasFile('image')) {
                //$file = $request->file('image')->store('htm_files','public');
                $input['image'] = $file ?? 'na';
            }
            $insert = HtmModel::create($input);

            if ($insert) {
                $htmdetails = HtmModel::where('_id', $insert->_id)->first();

                if ($htmdetails !== null && !empty($htmdetails->staff)) {
                    $emp = [];
                    foreach ($htmdetails->staff as $val) {
                        $emp[] = [
                            '_id' => $htmdetails->_id,
                            'id' => $val['employeeId'],  // Correct array access
                            'designation' => $val['designation']  // Correct array access
                        ];
                    }

                    // Prepare the data array with values from $htmdetails
                    $data = [
                        'machineId' => $htmdetails->machineId,
                        'employees' => $emp,
                        'activity' => $act,  // Ensure $act is defined somewhere
                        'validationCode' => "64270458",
                        'websocketConnection' => [
                            'machine' => "RN-xzdTlBcwCFMQ=",
                            'app' => "RN80PdKVBcwCHyw="
                        ]
                    ];

                    print_r($data);
                    exit;

                    $in = HTMStaffMapping::create($data);  // Removed json_encode as it's unnecessary

                    return response()->json([
                        'message' => 'Insert successful'
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'No staff details found'
                    ], 404);
                }
            } else {
                return response()->json([
                    'message' => 'Internal Server Error'
                ], 500);
            }
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
