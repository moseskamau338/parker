<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ZoneController;
use App\Http\Livewire\Users;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/sales',[SaleController::class,'index'])->name('sales');
    Route::get('/zones',[ZoneController::class,'index'])->name('zones');
    Route::get('/zones/{zone}',[ZoneController::class,'show'])->name('zones.web.show');
    Route::get('/users', Users::class)->name('users');

    //handovers
    Route::get('sales/handovers', [SaleController::class, 'handovers'])->name('sales.handovers');
    Route::get('shifts/handovers', [ShiftController::class, 'handovers'])->name('shifts.handovers');
    //reports
    Route::get('manage/receipts', [ReceiptController::class, 'index'])->name('receipts');
    Route::post('manage/receipts', [ReceiptController::class, 'store'])->name('receipts.store');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
});
