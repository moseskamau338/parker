<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {

        $data = (object)[
            'paid'=>(object)[
                'count'=>0,
                'sum'=>0,
            ],
            'pending'=>(object)[
                'count'=>0,
                'sum'=>0,
            ],
            'lost'=>(object)[
                'count'=>0,
                'sum'=>0,
            ],
        ];
//        ['PAID','LOSS','PENDING']
        foreach (['PAID','LOSS','PENDING'] as $status) {
            $q = Sale::query()->where('status', $status);
            if ($status === 'PAID'){
                $data->paid->count = $q->count();
                $data->paid->sum = $q->sum('totals');
            }
            if ($status === 'PENDING'){
                $data->pending->count = $q->count();
                $total_sum = 0;
                foreach ($q->get() as $pending){
                    $total_sum += $pending->getParkingFee(Carbon::now('Africa/Nairobi'))->fee;
                }
                $data->pending->sum = $total_sum;
            }
            if ($status === 'LOSS'){
                $data->lost->count = $q->count();
                $data->lost->sum = $q->sum('totals');
            }
        }
        return view('sales.index', compact('data'));
    }

    public function handovers(Request $request)
    {
        return view('sales.handovers');
    }
}
