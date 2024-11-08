<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\PriceUpdateLog;
use App\Models\ProductModel;
use App\Models\PurchaseOrderModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BulkController extends Controller
{
    public function company(Request $request)
    {
        $data['list'] = CompanyModel::where('flag', '!=', '2')->get();
        return view('admin/bulk_management/company_list', $data);
    }

    public function company_add_from(Request $request)
    {
        return view('admin/bulk_management/company_add_form');
    }

    public function purchase_order_list(Request $request)
    {
        $data['list'] = PurchaseOrderModel::where('flag', '!=', '2')->get();
        return view('admin/bulk_management/purchase_order_list', $data);
    }

    public function purchase_order_form(Request $request)
    {
        $data['order_id'] = 'BULKORDER' . rand(1111, 9999);
        $data['order_date'] = Carbon::now()->format('d/m/Y H:i A');
        $data['product_data'] = ProductModel::where('flag', '!=', '2')->get();
        return view('admin/bulk_management/purchase_order_form', $data);
    }

    public function get_product_data(Request $request)
    {
        $product_id = $request->val;
        $product_data = ProductModel::where('product_name', $product_id)->first();
        $latest_price = PriceUpdateLog::where('product_id',$product_data->id)->where('in_stock','yes')->orderBy('id','desc')->first();
        return response()->json(['uom' => $product_data->product_size,'today_price' => $latest_price->price,]);
    }

    public function submit_n_preview()
    {
        return view('admin/bulk_management/submit_n_preview_order');
    }

    public function get_detailed_data(Request $request)
    {
        $id = $request->id;
        $coloumn_name = $data['coloumn_name'] = $request->coloumn_name;
        $data['get_data'] = PurchaseOrderModel::select($coloumn_name)->where('id',$id)->first();
        // print_r($data['get_data']);exit;
        return view('admin/bulk_management/details_data',$data);
    }
}
