<?php

namespace App\Http\Controllers;

use App\Models\AddedContact;
use App\Models\CustomerModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $data['list'] = CustomerModel::where('flag', '!=', '2')->get();
        return view('admin/vendor/customer_list', $data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|min:12|numeric',
            'email' => 'required|email',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'address' => 'required',
            'image' => 'required',

        ]);


        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            $check_existance = CustomerModel::where('email', $request->email)->where('mobile', $request->mobile)->where('flag', '!=', '2')->first();

            if (!$check_existance) {
                $images = $request->file('image');
                if (!empty($images)) {
                    $file = $images;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/customer'), $filename);
                    $data['image'] = $filename;
                }
                $data['customer_id'] = $customer_id = 'UDC' . rand(1000, 9999);
                $data['vendor_id'] = $request->vendor;
                $data['name'] = $request->name;
                $data['email'] = $request->email;
                $data['mobile'] = $request->mobile;
                $data['pin'] = $request->pin;
                $data['city'] = $request->city;
                $data['state'] = $request->state;
                $data['address'] = $request->address;
                $data['flag'] = $request->status;
                $insert_data = CustomerModel::insert($data);

                if ($insert_data) {

                    $check_data = AddedContact::where('added_from', 'vendor')->where('added_to', 'customer')->where('added_from_id', $request->vendor)->where('added_to_id', $customer_id)->first();
                    if (!$check_data) {
                        $added_data['added_from'] = 'vendor';
                        $added_data['added_to'] = 'customer';
                        $added_data['added_from_id'] = $request->vendor;
                        $added_data['added_to_id'] = $customer_id;
                        $insert_data = AddedContact::insert($added_data);
                    }else{
                        return response()->json(['code' => 400, 'message' => 'Data Already Exist']);
                    }

                    return response()->json(['code' => 200, 'message' => 'Customer Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Vendor Already Exist,Enter Another Vendor']);
            }
        }
    }
}
