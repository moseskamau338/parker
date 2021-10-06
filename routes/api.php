<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [ApiAuthController::class, 'login']);
Route::group(['middleware'=>"auth:sanctum"], function(){
    //account management
    Orion::resource('users', UserController::class);
    //customers
    Orion::resource('customers', CustomerController::class);

    //sales:
    Route::resource('sales', SaleController::class);
    Route::post('sales/{sale}/close', [SaleController::class, 'closeSale']);
    // Route::post('sales/add', [SaleController::class, 'create']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
