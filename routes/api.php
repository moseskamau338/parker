<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\ShiftController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\ZoneController;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\SubscriptionController;

Route::post('login', [ApiAuthController::class, 'login']);
Route::group(['middleware'=>"auth:sanctum"], function(){
    //account management
    Orion::resource('users', UserController::class);
    Route::get('managers', [UserController::class, 'managers']);
    //customers
    Orion::resource('customers', CustomerController::class);
    Route::post('enroll/customer/{customer}', [SubscriptionController::class, 'subscribe']);
    Route::post('unsubscribe/customer/{customer}', [SubscriptionController::class, 'unSubscribe']);
    //Resources
    Orion::resource('gateways', \App\Http\Controllers\Api\GatewayController::class);
    Orion::resource('rates', \App\Http\Controllers\Api\RateController::class);

    //zones
    Route::resource('zones', ZoneController::class );
    //sales:
    Route::get('sales/cashier', [SaleController::class, 'cashierSales']);
    Route::resource('sales', SaleController::class);
    Route::post('sales/{sale}/close', [SaleController::class, 'closeSale']);
    //sales handover
    Route::post('sales/handover', [SaleController::class, 'createHandover']);
    Route::get('sales/view/handovers', [SaleController::class, 'getHandovers']);

    //shifts
    Route::post('shifts', [ShiftController::class,'store']);
    Route::get('shifts', [ShiftController::class,'index']);
    Route::post('shifts/close/', [ShiftController::class, 'closeShift']);

    //logout
    Route::patch('logout', [ApiAuthController::class, 'logout']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
