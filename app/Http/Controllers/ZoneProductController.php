<?php

namespace App\Http\Controllers;

use App\Models\CrusherZoneModel;
use App\Models\PriceUpdateLog;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZoneProductController extends Controller
{
    public function index(Request $request)
    {
        $data['zone_list'] = CrusherZoneModel::where('flag', '!=', '2')->get();
        $data['category_list'] = ProductCategoryModel::where('flag', '!=', '2')->get();
        $data['list'] = ProductModel::where('flag', '!=', '2')->get();
        return view('admin/product/list', $data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_category' => 'required',
            'product_name' => 'required',
            'product_size' => 'required',
            'product_price' => 'required',
            'status' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {
            $check_existance = ProductModel::where('product_name', $request->product_name)->where('product_cat', $request->product_category)->where('flag', '!=', '2')->first();

            if (!$check_existance) {
                if (getuserdetail('id') == 1) {
                    $data['added_by'] = 1;
                    $data['crusher_zone'] = $request->cursher_zone;
                } else {
                    $data['added_by'] = getuserdetail('id');
                    $data['crusher_zone'] = getuserdetail('id');
                }
                $data['product_id'] = 'CRUSHPRO' . rand(1111, 9999);
                $data['product_cat'] = $request->product_category;
                $data['product_name'] = $request->product_name;
                $data['product_unit'] = $request->product_size;
                $data['product_price'] = $request->product_price;
                $data['flag'] = $request->status;
                $insert_data = ProductModel::insert($data);

                if ($insert_data) {
                    return response()->json(['code' => 200, 'message' => 'Product Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Product Already Exist,Enter Another Product']);
            }
        }
    }

    public function update_product_price_layout(Request $request)
    {
        if (getuserdetail('id') == 1) {
            $data['zone_list'] = CrusherZoneModel::where('flag', '!=', '2')->get();
        } else {
            $data['product_list'] = ProductModel::where('crusher_zone', getuserdetail('id'))->get();
        }

        $data['log'] = PriceUpdateLog::get();

        return view('admin/product/update_price_layout', $data);
    }

    public function get_products_data(Request $request)
    {
        $crusher_zone_id = $request->val;
        $data['data_for_update'] = ProductModel::where('crusher_zone', $crusher_zone_id)->get();
        return view('admin/product/product_price_data', $data);
    }

    public function update_pro_price(Request $request)
    {
        $id = $request->id;
        $data['product_price'] = $request->price;
        // $data['in_stock'] = $request->inStock;
        $get_zone_id = ProductModel::where('id', $id)->first();
        $log['zone_id'] = $get_zone_id->crusher_zone;
        $log['product_id'] = $id;
        $log['in_stock'] = $request->inStock;
        $log['price'] = $request->price;
        $log['updated_by'] = getuserdetail('id');

        PriceUpdateLog::insert($log);
        $update_data = ProductModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Price Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }

    public function get_latest_log()
    {
        $data['log'] = PriceUpdateLog::get();
        return view('admin/product/updated_log_list', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['product_data'] = ProductModel::where('id', $id)->first();
        $data['category_list'] = ProductCategoryModel::where('flag', '!=', '2')->get();
        return view('admin/product/edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        if (getuserdetail('id') == 1) {
            $data['added_by'] = 1;
            $data['crusher_zone'] = $request->cursher_zone;
        } else {
            $data['added_by'] = getuserdetail('id');
            $data['crusher_zone'] = getuserdetail('id');
        }
        $data['product_cat'] = $request->product_category;
        $data['product_name'] = $request->product_name;
        $data['product_size'] = $request->product_size;
        $data['product_price'] = $request->product_price;
        $data['flag'] = $request->status;
        $update_data = ProductModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Product Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }
}
