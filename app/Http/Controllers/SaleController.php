<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        //fetch sales:
//        $sales = Sale::with('zone:id,name','vehicle:id,plate_no,name', 'customer:id,name','user:id,name','rate:id,amount','gateway:id,name')
//        ->paginate(5);

        //massage
        return view('sales.index');
    }

    public function handovers(Request $request)
    {
        return view('sales.handovers');
    }
}
