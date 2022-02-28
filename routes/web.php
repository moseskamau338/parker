<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ZoneController;
use \App\Http\Controllers\ShiftController;
use \App\Http\Controllers\ReceiptController;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>['auth:sanctum', 'verified', 'role:admin|manager|partner']], function(){
    Route::controller(ReportController::class)->group(function(){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/reports', 'index')->name('reports');
    });

    Route::controller(SaleController::class)->group(function(){
//        Route::get('/sales/component',\App\Http\Livewire\SalesTable::class);
        Route::get('/sales','index')->name('sales');
        //handovers
        Route::get('sales/handovers',  'handovers')->name('sales.handovers');
    });

     Route::controller(ZoneController::class)->group(function(){
        Route::get('/zones','index')->name('zones');
        Route::get('/zones/{zone}','show')->name('zones.web.show');
        Route::post('/create/zone','store')->name('zones.web.store');
     });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/create', 'store')->name('create.user');

        Route::delete('/users/logout', 'logout')->name('users.logout');

        //Manage roles
        Route::get('/users/roles', 'roles')->name('roles');
        Route::post('/update/roles', 'updateRoles')->name('update.roles');
    });

    //shifts
    Route::controller(ShiftController::class)->group(function(){
        Route::get('shifts', 'shifts')->name('shifts.view');
        Route::get('shifts/handovers', 'handovers')->name('shifts.handovers');
    });

    //reports
    Route::controller(ReceiptController::class)->group(function(){
        Route::get('manage/receipts', 'index')->name('receipts');
        Route::post('manage/receipts', 'store')->name('receipts.store');
    });

});
