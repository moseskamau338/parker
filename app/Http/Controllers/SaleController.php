<?php

namespace App\Http\Controllers;

use App\Models\Sale;
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
//            dd($status);
            if ($status === 'PAID'){
                $data->paid->count = $q->count();
                $data->paid->sum = $q->sum('totals');
            }
            if ($status === 'PENDING'){
                $data->pending->count = $q->count();
                $data->pending->sum = $q->sum('totals');
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
