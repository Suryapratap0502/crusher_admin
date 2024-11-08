<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $data['list'] = ProductCategoryModel::where('flag', '!=', '2')->get();
        return view('admin/product/category_list', $data);
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);


        if ($validate->fails()) {
            return response()->json(['code' => 401, 'message' => $validate->errors()->toArray()]);
        } else {

            $check_existance = ProductCategoryModel::where('name', $request->category_name)->where('flag', '!=', '2')->first();

            if (!$check_existance) {
                $data['name'] = $request->category_name;
                $data['flag'] = $request->status;
                $insert_data = ProductCategoryModel::insert($data);

                if ($insert_data) {
                    return response()->json(['code' => 200, 'message' => 'Category Added']);
                } else {
                    return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
                }
            } else {
                return response()->json(['code' => 400, 'message' => 'Category Already Exist,Enter Another Category']);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['category_data'] = ProductCategoryModel::where('id', $id)->first();
        return view('admin/product/category_edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $data['name'] = $request->category_name;
        $update_data = ProductCategoryModel::where('id', $id)->update($data);
        if ($update_data) {
            return response()->json(['code' => 200, 'message' => 'Category Updated']);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Server Connection']);
        }
    }
}
