<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SaleResource(Sale::all());
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
        $this->authorize('create', Sale::class);
        //validate:
        $request->validate([
            'customer_id' => 'required|exists:App\Models\Customer,id',
            'vehicle_id' => 'required|exists:App\Models\Vehicle,id',
            'rate_id' => 'required|exists:App\Models\Rate,id',
            'zone_id' => 'required|exists:App\Models\Zone,id',
            'gateway_id' => 'exists:App\Models\Gateway,id',
            'payed_at' => 'date_format:Y-m-d H:i:s',
        ]);
        
        $sale = Sale::create([
            'customer_id'=> $request->customer_id,
            'user_id' => auth()->id(),
            'vehicle_id'=> $request->vehicle_id,
            'rate_id'=> $request->rate_id,
            'zone_id'=> $request->zone_id,
            'gateway_id'=> $request->gateway_id,
            'entry_time' => $request->entry_time,
            'qr' => $request->qr,
        ]);

        return response()->json($sale,200);
    }

    /**
     * Close a existing sale in in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function closeSale(Request $request, Sale $sale)
    {
        $this->authorize('update', $sale, auth()->user());

        // dd($request->all());
        //validate:
        $request->validate([
            'gateway_id' => 'required|exists:App\Models\Gateway,id',
        ]);
        //get total = time(hrs) * rate
        
        $totals = Carbon::parse($sale->entry_time)->diffInDays(Carbon::now()) * $sale->rate->amount;
        
        
        $sale->gateway_id = $request->gateway_id;
        $sale->leave_time = now();
        $sale->totals = $totals;
        $sale->status = 'PAID';
        $sale->payed_at = now();

        $sale->save();


        return response()->json($sale,200);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
