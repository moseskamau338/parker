<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ZoneController;
use \App\Http\Controllers\ShiftController;
use \App\Http\Controllers\ReceiptController;

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
    Route::get('/dashboard', [ReportController::class, 'dashboard'])->name('dashboard');
    Route::get('/sales',[SaleController::class,'index'])->name('sales');
    Route::get('/zones',[ZoneController::class,'index'])->name('zones');
    Route::get('/zones/{zone}',[ZoneController::class,'show'])->name('zones.web.show');

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [\App\Http\Controllers\UserController::class, 'store'])->name('create.user');

    //Manage roles
    Route::get('/users/roles', [\App\Http\Controllers\UserController::class, 'roles'])->name('roles');
    Route::post('/update/roles', [\App\Http\Controllers\UserController::class, 'updateRoles'])->name('update.roles');

    //handovers
    Route::get('sales/handovers', [SaleController::class, 'handovers'])->name('sales.handovers');
    Route::get('shifts/handovers', [ShiftController::class, 'handovers'])->name('shifts.handovers');

    //shifts
    Route::get('shifts', [ShiftController::class, 'shifts'])->name('shifts.view');


    //reports
    Route::get('manage/receipts', [ReceiptController::class, 'index'])->name('receipts');
    Route::post('manage/receipts', [ReceiptController::class, 'store'])->name('receipts.store');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
});
