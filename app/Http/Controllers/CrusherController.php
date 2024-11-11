<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '1024M');

use App\Models\AuthModel;
use App\Models\CrusherZoneModel;
use App\Models\DeliveyChargesModel;
use App\Models\RoleModel;
use App\Models\StateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrusherController extends Controller
{
    public function index()
    {
        $data['list'] = CrusherZoneModel::where('flag', '!=', '2')->get();
        return view('admin/crusher/list', $data);
    }

    public function add_from(Request $request)
    {
        $data['state'] = StateModel::all();
        $data['role'] = RoleModel::where('name','Zone Admin')->orWhere('name','Zone')->orWhere('id','2')->first();
        return view('admin/crusher/add_form', $data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'owner_name' => 'required',
            'owner_email' => 'required|email',
            'login_username' => 'required',
            'login_password' => 'required',
            'owner_contact' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/',
            'pan' => 'required',
            'aadhar_no' => 'required',
            'clerk_name' => 'required',
            'clerk_contact' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/',
            'weight_person_name' => 'required',
            'weight_person_contact' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/',
            'accountant_name' => 'required',
            'accountant_contact' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/',
            'crusher_name' => 'required',
            'license_issue_date' => 'required',
            'license_exp_date' => 'required',
            'gstin' => 'required',
            'crusher_address' => 'required',
            'crusher_search_cordinates' => 'required',
            'crusher_lat' => 'required',
            'crusher_long' => 'required',
            'crusher_type' => 'required',
            'city' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'bank_holder_name' => 'required',
            'ac_no' => 'required',
            'ifsc' => 'required',
            'cancel_cheque' => 'required|image:jpeg,png,jpg',

        ]);
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $check_existance = CrusherZoneModel::where('name', $request->crusher_name)->where('flag', '!=', '2')->first();
            if (!$check_existance) {
                $data['crusher_id'] = 'AGGCRUSHER' . rand(11111, 99999);
                $data['name'] = $request->crusher_name;
                $data['license_no'] = $request->license_no ?? '';
                $data['license_issue_date'] = $request->license_issue_date ?? '';
                $data['license_exp_date'] = $request->license_exp_date ?? '';
                $data['gst_in'] = $request->gstin ?? '';
                $data['address'] = $request->crusher_address;
                $data['search_location'] = $request->crusher_search_cordinates;
                $data['crusher_lat'] = $request->crusher_lat;
                $data['crusher_long'] = $request->crusher_long;
                $data['crusher_type'] = $request->crusher_type;
                $data['owner_name'] = $request->owner_name;
                $data['owner_email'] = $request->owner_email;
                $data['owner_contact'] = $request->owner_contact;
                $data['owner_pan'] = $request->pan;
                $data['owner_aadhar_no'] = $request->aadhar_no;
                $data['munshi_name'] = $request->clerk_name;
                $data['munshi_contact'] = $request->clerk_contact;
                $data['weight_bridge_person_name'] = $request->weight_person_name;
                $data['weight_bridge_person_contact'] = $request->weight_person_contact;
                $data['accountant_name'] = $request->accountant_name;
                $data['accountant_contact'] = $request->accountant_contact;
                $data['state'] = $request->state;
                $data['city'] = $request->city;
                $data['bank_name'] = $request->bank_name;
                $data['branch_name'] = $request->branch_name;
                $data['acc_holder_name'] = $request->bank_holder_name;
                $data['account_no'] = $request->ac_no;
                $data['ifsc'] = $request->ifsc;
                $data['upi_id'] = $request->upi_id;

                // updated fields on 10/08
                $data['crusher_pan'] = $request->crusher_pan_no ?? '';
                $data['crusher_msme_no'] = $request->crusher_msme_ssi_no ?? '';
                $data['crusher_cin_no'] = $request->crusher_cin_no ?? '';
                $data['crusher_tan_no'] = $request->crusher_tan_no ?? '';
                $data['crusher_udyog_aadhar_no'] = $request->crusher_udyog_adhar_no ?? '';


                $images = $request->file('cancel_cheque');
                if (!empty($images)) {
                    $file = $images;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/cancel_cheque'), $filename);
                    $data['cancel_cheque'] = $filename;
                }

                $owner_pan = $request->file('owner_pan');
                if (!empty($owner_pan)) {
                    $file = $owner_pan;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['owner_upload_pan'] = $filename;
                }

                $owner_aadhar = $request->file('owner_aadhar');
                if (!empty($owner_aadhar)) {
                    $file = $owner_aadhar;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['owner_upload_aadhar'] = $filename;
                }


                $crusher_gst = $request->file('crusher_gst');
                if (!empty($crusher_gst)) {
                    $file = $crusher_gst;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['upload_gst'] = $filename;
                }

                $crusher_pan = $request->file('crusher_pan');
                if (!empty($crusher_pan)) {
                    $file = $crusher_pan;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['crusher_upload_pan'] = $filename;
                }

                $crusher_msme_ssi = $request->file('crusher_msme_ssi');
                if (!empty($crusher_msme_ssi)) {
                    $file = $crusher_msme_ssi;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['crusher_upload_msme'] = $filename;
                }

                $crusher_cin = $request->file('crusher_cin');
                if (!empty($crusher_cin)) {
                    $file = $crusher_cin;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['crusher_upload_cin'] = $filename;
                }

                $crusher_tan = $request->file('crusher_tan');
                if (!empty($crusher_tan)) {
                    $file = $crusher_tan;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['crusher_upload_tan'] = $filename;
                }

                $crusher_udyog_aadhar = $request->file('crusher_udyog_aadhar');
                if (!empty($crusher_udyog_aadhar)) {
                    $file = $crusher_udyog_aadhar;
                    date_default_timezone_set('Asia/Kolkata');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/crusher/docs'), $filename);
                    $data['crusher_upload_udyog_aadhar'] = $filename;
                }

                $insert_data = CrusherZoneModel::insert($data);

                if ($insert_data) {

                    $login_data['name'] = $request->crusher_name;
                    $login_data['username'] = $request->login_username;
                    $login_data['email'] = $request->owner_email;
                    $login_data['password'] = $request->login_password;
                    $login_data['role'] = $request->login_role;
                    AuthModel::insert($login_data);

                    return response()->json(['code' => 200, 'message' => 'Crusher Zone Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Crusher Zone Exist,Enter Another Crusher Zone']);
            }
        }
    }

    public function view($crusher_id)
    {
        $data['get_crusher_data'] = CrusherZoneModel::where('id', $crusher_id)->first();
        return view('admin/crusher/view_details', $data);
    }

    public function track_crusher()
    {
        $data['list'] = CrusherZoneModel::where('flag', '!=', '2')->get();
        return view('admin/crusher/track_crusher_layout', $data);
    }

    public function get_crusher_location(Request $request)
    {
        $crusher_id = $request->val;
        $data = CrusherZoneModel::where('id', $crusher_id)->first();
        $response = array('status' => true, 'lat' => $data->crusher_lat, 'long' => $data->crusher_long);
        echo json_encode($response);
    }

    public function delivery_charges_layout(Request $request)
    {
        $data['delivery_data'] = DeliveyChargesModel::first();
        return view('admin/crusher/delivery_charges_layout',$data);
    }

    public function update_delivery_price(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'delivery_charges' => 'required|min:1',
        ]);
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $data['price'] = $request->delivery_charges;
            if(!empty($request->id))
            {
                $insert_data = DeliveyChargesModel::where('id', $request->id)->update($data);
                $resp = 'Delivery Price Updated';
            }else{
                $insert_data = DeliveyChargesModel::insert($data);
                $resp = 'Delivery Price Inserted';
            }
            
            if ($insert_data) {
                return response()->json(['code' => 200, 'message' => $resp]);
            } else {
                return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
            }
        }
    }
}
