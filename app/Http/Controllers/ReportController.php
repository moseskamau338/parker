<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\Zone;
use App\Models\Sale;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function dashboard()
    {
        $custmer_current = Customer::count();
        $custmer_prev = Customer::whereDate('created_at','<', Carbon::now()->subDays(30))->count();
        $customer_percentage = call_user_func(function($custmer_current, $custmer_prev){
            if($custmer_prev == 0){
                return 100;
            }else{
                return (($custmer_current - $custmer_prev)/$custmer_prev)*100;
            }
        }, $custmer_current, $custmer_prev);
        //sales
//        $sale_current = Customer::count();
//        $custmer_prev = Customer::whereDate('created_at','<', Carbon::now()->subDays(30))->count();
//        $customer_percentage = (($custmer_current - $custmer_prev)/$custmer_prev)*100;

        $stats = (object)[
            'customers' => (object)[
                'count' => $custmer_current,
                'prev' => $custmer_prev,
                'percentage' => $customer_percentage
            ],
            'sales' => (object)[
                'total' => 0,
                'prev' => 0,
                'percentage' => 0
            ],
            'top_cashier' => (object)[
                'name' => 'John Doe',
                'total_sales' => 0,
                'zone' => 'Jacaranda'
            ],
            'top_zones' => [
                (object)['name'=>'akdjsk', 'current_shift'=>'John Doe','sales'=>(object)['complete'=>0,'incomplete'=>0]]
            ]

        ];
        return view('dashboard', compact('stats'));
    }
}
