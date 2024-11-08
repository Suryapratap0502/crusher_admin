<?php

namespace App\Http\Controllers;

use App\Models\AddedContact;
use App\Models\BusinessTypeModel;
use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        $data['list'] = VendorModel::where('flag', '!=', '2')->get();
        $data['business_type'] = BusinessTypeModel::where('flag', '!=', '2')->where('flag','1')->get();
        return view('admin/vendor/list', $data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'company_name' => 'required',
            'business_name' => 'required',
            'business_type' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'mobile' => 'required|min:12|numeric',
            'aadhar' => 'required|numeric|digits:12|regex:/^\d{12}$/',
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

            $check_existance = VendorModel::where('email', $request->email)->where('mobile', $request->mobile)->where('flag', '!=', '2')->first();

            if (!$check_existance) {
                $images = $request->file('image');
                if (!empty($images)) {
                    $file = $images;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/vendor'), $filename);
                    $data['image'] = $filename;
                }
                $data['vendor_id'] = 'UDV'.rand(1000,9999);
                $data['f_name'] = $request->f_name;
                $data['l_name'] = $request->l_name;
                $data['mobile'] = $request->mobile;
                $data['email'] = $request->email;
                $data['business_name'] = $request->business_name;
                $data['aadhar_no'] = $request->aadhar;
                $data['gstin'] = $request->gstin;
                $data['pin'] = $request->pin;
                $data['city'] = $request->city;
                $data['state'] = $request->state;
                $data['company_name'] = $request->company_name;
                $data['business_type'] = $request->business_type;
                $data['address'] = $request->address;
                $data['flag'] = $request->status;
                $data['is_verify'] = $request->is_verify;
                $insert_data = VendorModel::insert($data);

                if ($insert_data) {
                    return response()->json(['code' => 200, 'message' => 'Vendor Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Vendor Already Exist,Enter Another Vendor']);
            }
        }
    }

    public function view_customer($vendor_id)
    {
        $data['vendor_id'] = $vendor_id;
        if(!empty($vendor_id))
        {
            $data['customer_data'] = AddedContact::with('get_customer_data')->where('added_from','vendor')->where('added_from_id',$vendor_id)->get();
            $data['vendor_data'] = VendorModel::where('vendor_id',$vendor_id)->first();
        }
        return view('admin/vendor/vendor_customer_list', $data);
    }
}
