<?php

namespace App\Http\Controllers;

use App\Models\CompanyAddressModel;
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
        $data['list'] = PurchaseOrderModel::where('flag', '!=', '2')->where('data_submitted', '!=', '0')->get();
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
        $latest_price = PriceUpdateLog::where('product_id', $product_data->id)->where('in_stock', 'yes')->orderBy('id', 'desc')->first();
        return response()->json(['uom' => $product_data->product_size, 'today_price' => $latest_price->price,]);
    }

    public function submit_n_preview($view_type, $purchase_order_id)
    {
        $data['page_type'] = $view_type;
        $data['order_data'] = PurchaseOrderModel::where('purchase_order_id', $purchase_order_id)->first();
        // billing address
        return view('admin/bulk_management/submit_n_preview_order', $data);
    }

    public function get_detailed_data(Request $request)
    {
        $id = $request->id;
        $coloumn_name = $data['coloumn_name'] = $request->coloumn_name;
        $data['get_data'] = PurchaseOrderModel::select($coloumn_name)->where('id', $id)->first();
        // print_r($data['get_data']);exit;
        return view('admin/bulk_management/details_data', $data);
    }

    public function get_company_address(Request $request)
    {
        $company_id = $request->val;
        $data['company_address'] = CompanyAddressModel::where('company_id', $company_id)->get();
        return view('admin/bulk_management/company_address', $data);
    }

    public function create_purchase_order(Request $request)
    {
        $shipping_address = $request->shippingAddress;
        $shipping_method = $request->shippingMethod;
        $selectedPaymentMethod = $request->selectedPaymentMethod;
        $selectedShippingMethod = $request->selectedShippingMethod;
        $selectedShippingAddress = $request->selectedShippingAddress;

        $get_shipping_address = CompanyAddressModel::where('id',$selectedShippingAddress)->first();

        $shippingMethod = $request->shippingMethod;

        if ($selectedPaymentMethod == 'paymentMethod01') 
        {
            $payment_method = 'Razorpe';
            $data['payment_docs'] = $request->razorpe_amount_reciept;
            $data['paid_amount'] = $total_price = $request->razorpe_submitted_amount;
        }elseif($selectedPaymentMethod == 'paymentMethod02')
        {
            $payment_method = 'Bank Transfer';
            $data['payment_docs'] = $request->bank_amount_reciept;
            $data['paid_amount'] = $total_price = $request->submitted_amount;
        }else{
            $payment_method = 'COD';
            $data['payment_docs'] = '';
            $data['paid_amount'] = $request->submitted_amount;
        }

        if($selectedShippingMethod == 'shippingMethod01')
        {
            $shipping_method = 'Self';
        }else{
            $shipping_method = 'By Aggzon';
        }

        $data['purchase_order_id'] = $purchase_order_id = $request->purchase_order_id ?? 'BULKORDER' . rand(1111, 9999);
        $data['company_id'] = $request->company;
        $data['order_date'] = $request->order_date;
        $data['delivery_date'] = $request->delivery_date;
        $data['order_by_person'] = $request->order_by_person_name;
        $data['order_by_contact'] = $request->order_by_person_contact;
        $data['order_status'] = 'Pending';
        $data['payment_statue'] = 'Completed';
        $data['payment_mode'] = $payment_method;
        $data['delivery_mode'] = $shipping_method;
        $data['payment_type'] = $payment_method;
        $data['total_price'] = $total_price ?? $request->total_price;
        $data['shipping_details'] = $get_shipping_address->address;
        $productNames = $request->input('product_name');
        $crusherNames = $request->crusher_name;
        $productUOMs = $request->product_uom;
        $productPrices = $request->product_today_price;
        $quantities  = $request->quantity;
        $rowcount = $request->rowcount;
        $productData = array();

        // print_r($productNames);exit;

        foreach ($productNames as $index => $productName) {
            $productData = [
                'name' => $productName,
                'crusher_name' => $crusherNames[$index],
                'uom' => $productUOMs[$index],
                'price' => $productPrices[$index],
                'quantity' => $quantities[$index],
            ];
        }
        $data['product_details'] = json_encode($productData);
        //print_r($data);exit;
        $insert = PurchaseOrderModel::insert($data);
        if ($insert) {
            return response()->json(['code' => 200, 'message' => 'Go for the preview section', 'data' => $purchase_order_id]);
        } else {
            return response()->json(['code' => 400, 'message' => 'Check Internet connection']);
        }
    }
}
