<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BulkController;
use App\Http\Controllers\BusinessTypeController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CrusherController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ThirdpartyController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ZoneProductController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forgot-password', [AuthController::class, 'validate_page']);
Route::get('/change-password', [AuthController::class, 'changepassword_page']);
Route::post('/change_password_action', [AuthController::class, 'change_password_action']);
Route::post('/validate_and_sendMail', [AuthController::class, 'validate_n_sendMail']);
Route::post('/validate_key', [AuthController::class, 'validate_key']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [Dashboard::class, 'index']);

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/dashboard', [Dashboard::class, 'index']);

// role

Route::prefix('common_action/')->group(function () {
    Route::post('change_status', [CommonController::class, 'change_status']);
    Route::post('change_status_2', [CommonController::class, 'change_status_2']);
    Route::post('get_city', [CommonController::class, 'get_city']);
    Route::post('get_city_2', [CommonController::class, 'get_city_2']);
    Route::post('get_zone', [CommonController::class, 'get_zone']);
});

Route::prefix('role/')->group(function () {
    Route::get('', [RoleController::class, 'index']);
    Route::post('add', [RoleController::class, 'add']);
    Route::post('edit', [RoleController::class, 'edit']);
    Route::post('update', [RoleController::class, 'update']);
});

Route::prefix('crusher_zones/')->group(function () {
    Route::get('', [CrusherController::class, 'index']);
    Route::get('add_from', [CrusherController::class, 'add_from']);
    Route::post('add', [CrusherController::class, 'add']);
    Route::post('edit', [CrusherController::class, 'edit']);
    Route::post('update', [CrusherController::class, 'update']);
    Route::get('view/{id}', [CrusherController::class, 'view']);
    Route::get('track_crusher', [CrusherController::class, 'track_crusher']);
    Route::post('get_crusher_location', [CrusherController::class, 'get_crusher_location']);
    Route::get('delivery_charges', [CrusherController::class, 'delivery_charges_layout']);
    Route::post('update_delivery_price', [CrusherController::class, 'update_delivery_price']);
});

Route::prefix('product/')->group(function () {
    Route::get('product_category', [ProductCategoryController::class, 'index']);
    Route::post('add_category', [ProductCategoryController::class, 'add']);
    Route::post('edit_category', [ProductCategoryController::class, 'edit']);
    Route::post('update_category', [ProductCategoryController::class, 'update']);
});

Route::prefix('product/')->group(function () {
    Route::get('zone_products', [ZoneProductController::class, 'index']);
    Route::post('add', [ZoneProductController::class, 'add']);
    Route::post('edit', [ZoneProductController::class, 'edit']);
    Route::post('update', [ZoneProductController::class, 'update']);
    Route::get('update_product_price_layout', [ZoneProductController::class, 'update_product_price_layout']);
    Route::post('get_products_data', [ZoneProductController::class, 'get_products_data']);
    Route::post('update_pro_price', [ZoneProductController::class, 'update_pro_price']);
    Route::post('get_latest_log', [ZoneProductController::class, 'get_latest_log']);
});

Route::prefix('customers/')->group(function () {
    Route::get('', [CustomerController::class, 'index']);
    Route::post('add', [CustomerController::class, 'add']);
    Route::post('edit', [CustomerController::class, 'edit']);
    Route::post('update', [CustomerController::class, 'update']);
    Route::get('view_vendor', [CustomerController::class, 'view_vendor']);
});

Route::prefix('bulk_management/')->group(function () {
    Route::get('company', [BulkController::class, 'company']);
    Route::get('company_add_from', [BulkController::class, 'company_add_from']);
    Route::get('purchase_order', [BulkController::class, 'purchase_order_list']);
    Route::get('purchase_order_form', [BulkController::class, 'purchase_order_form']);
    Route::post('get_product_data', [BulkController::class, 'get_product_data']);
    Route::get('submit_n_preview', [BulkController::class, 'submit_n_preview']);
    Route::post('get_detailed_data', [BulkController::class, 'get_detailed_data']);
});

Route::prefix('vehicle_management/')->group(function () {
    Route::get('', [VehicleController::class, 'index']);
    Route::get('add_from', [VehicleController::class, 'add_from']);
    Route::post('add', [VehicleController::class, 'add']);
    Route::post('edit', [VehicleController::class, 'edit']);
    Route::post('update', [VehicleController::class, 'update']);
    Route::get('vehicle_type', [VehicleController::class, 'vehicle_type']);
    Route::post('vehicle_type_add', [VehicleController::class, 'vehicle_type_add']);
    Route::post('vehicle_type_edit', [VehicleController::class, 'vehicle_type_edit']);
    Route::post('vehicle_type_update', [VehicleController::class, 'vehicle_type_update']);
    Route::get('view/{id}', [VehicleController::class, 'view']);
});

Route::prefix('notification/')->group(function () {
    Route::get('automatic', [NotificationController::class, 'automatic']);
    Route::get('manual', [NotificationController::class, 'manual']);
    Route::post('send_auto', [NotificationController::class, 'send_auto']);
    Route::post('send_manual', [NotificationController::class, 'send_manual']);
});

Route::prefix('thirdparty_managament/')->group(function () {
    Route::get('', [ThirdpartyController::class, 'index']);
});

Route::prefix('settings/')->group(function () {
    Route::get('', [SettingController::class, 'index']);
});

// });

Route::get('/logout', function () {
    Cookie::queue('login_username', '', time() + 60 * 60 * 24 * 100);
    Cookie::queue('login_pass', '', time() + 60 * 60 * 24 * 100);
    session()->flush();
    return redirect('/');
});
