<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Handover;
use App\Models\Sale;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index(): Collection
    {
        $this->authorize('viewAny', Shift::class);

        return Shift::with('user','zone','handover')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Shift::class);
        // if (!auth()->guard('sanctum')->user()->hasPermissionTo('add-shifts')) {
        //     return abort(403,'Sorry, your are not allowed to create shifts');
        // }

        $request->validate([
            'zone_id' => 'required|exists:zones,id',
        ]);

        $shift = new Shift();
        $shift->zone_id = $request->zone_id;
        $shift->user_id = auth()->guard('sanctum')->user()->id;

        try {
            $shift->save();
            return response()->json(['message'=>'Shift started successfully'], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message'=>'Error creating shift'.$e->getMessage()], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function closeShift(Request $request)
    {
        // dd($request->all());
        // require all cash at hand
        // require to know cash at bank
        $request->validate([
            'cash_at_hand' => 'required|numeric',
        ]);

        $shift = $request->user()->currentShift();
        if (!$shift){
            abort(404, 'No shift open for this user.');
        }

        // if handover exists for this shift, cancel
        if($shift->handover){
            abort(422,'Sorry, this shift was already closed!');
        }
        //shift close
        $shift->end = null;
        $shift->save();

        $handover = new Handover();
        $handover->shift_id = $shift->id;
         $handover->cash_at_hand = $request->cash_at_hand;

        // calculate totals from good sales
        // dd(Carbon::parse($shift->start)->diffInMinutes(Carbon::now()));
        $shift_start = date('Y-m-d H:i:s', strtotime($shift->start));
        $shift_end = date('Y-m-d H:i:s', strtotime(Carbon::now('Africa/Nairobi')));

        $total_sales = 0;
        $paid_sales = Sale::where('created_at', '<=',$shift_end)
        ->where('status', 'PAID')
        ->get(['totals','created_at']);

        $paid_sales = $paid_sales->map(function($sale) use ($shift_start){
            if ($sale->created_at->gte($shift_start)) {
                return $sale;
            }
        })->toArray();

        $paid_sales = array_values(array_filter($paid_sales, function($value){ return !is_null($value) && $value !== '';}));

        if (count($paid_sales) > 0) {
            $totals = [];
           //loop through and calculate
            foreach($paid_sales as $sale){
               array_push($totals, $sale['totals']);
           };
          $total_sales = array_sum($totals);
        }

        $handover->total_sales = $total_sales;
        $handover->completed_sales_count = count($paid_sales);
        $handover->incomplete_sales_count = Sale::whereBetween('created_at', [Shift::first()->start, Carbon::now('Africa/Nairobi')])
        ->where('status', 'PENDING')->orWhere('status', 'CANCELED')->count();

        $shift->end = Carbon::now('Africa/Nairobi');

        try {
            $handover->save();
            $shift->save();
            return response()->json(['message'=>'Shift closed successfully','handover_details'=>$handover]);
        } catch (\Throwable $e) {
            return response()->json(['message'=>'Error closing shift'.$e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
