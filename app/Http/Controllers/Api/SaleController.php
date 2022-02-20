<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\User;
use App\Models\SalesHandover;
use App\Models\Vehicle;
use App\Models\Zone;
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

        $data = Sale::with(['customer','rate','gateway','zone','user'])
            ->where('zone_id',auth()->guard('sanctum')->user()->zone->id)
            ->latest()->get();

        return new SaleResource($data);
    }
    public function show(Sale $sale)
    {
        $sale = $sale->with('customer','rate', 'gateway', 'zone', 'user')
            ->where('id', $sale->id)->first();
        $sale['current_rate'] =  $sale->status === 'PAID' ? null : $sale->getParkingFee(Carbon::now('Africa/Nairobi'));
        return new SaleResource($sale);

    }
     public function cashierSales(Request $request): SaleResource
     {
        $data = Sale::query()
            ->with(['customer','rate','gateway','zone','user'])
            ->where('user_id',auth()->guard('sanctum')->id())
            ->when($request->days, function($query, $days){
                    $query->where('created_at','>',Carbon::today()->subDays($days) )->where('created_at','<',Carbon::today());
                })
            ->latest()->get();

        return new SaleResource($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHandovers(Request $request)
    {
        return $request->user()->sales_handovers;
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
            'customer_id' => 'exists:App\Models\Customer,id',
            'customer' => 'string',
            'rate_id' => 'required|exists:App\Models\Rate,id',
            'gateway_id' => 'exists:App\Models\Gateway,id',
            'payed_at' => 'date_format:Y-m-d H:i:s',
        ]);

        //check vihicle
        $customer = null;
        if(!$request->customer_id){
            if ($request->customer){
               $customer = Customer::firstOrCreate([
                   'name'=>$request->customer,
               ]);
            }else{
                abort(422, 'New or existing numberplate is required');
            }
        }

        // abort if trying to re-register
        $check_id = $request->customer_id ?? $customer->id;
        $pending_sales = Sale::where('status', 'PENDING')->pluck('customer_id')->toArray();
        if(in_array($check_id, $pending_sales)){
            abort(422, 'This customer has a pending sales status! Finish one sale first');
        }

        // abort if customer is in another zone
        $pending_zonal_sales = Sale::where('status', 'PENDING')
            ->whereIn('zone_id', Zone::all()->except(auth()->user()->zone->id)->pluck('id')->toArray())
            ->pluck('customer_id')->toArray();
         if(in_array($check_id, $pending_zonal_sales)){
            abort(422, 'Customer cannot be parking in two zones at the same time. Finish one sale first.');
        }


        $sale = Sale::create([
            'customer_id'=> $request->customer_id ?? $customer->id,
            'user_id' => auth()->id(),
            'rate_id'=> $request->rate_id,
            'zone_id'=> auth()->user()->zone_id,
            'gateway_id'=> $request->gateway_id,
            'qr' => $request->qr,
        ]);

        $sale = $sale->with('customer','zone','rate')->find($sale->id);

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
        $this->authorize('update', $sale, auth('sanctum')->user());

        //validate:
        $request->validate([
            'gateway_id' => 'required|exists:App\Models\Gateway,id',
        ]);



        //get total = time(hrs) * rate

//        $totals = round(((Carbon::parse($sale->created_at)->diffInMinutes(Carbon::now('Africa/Nairobi'))) / 60) * $sale->rate->amount);
        $totals = $sale->getParkingFee(Carbon::now('Africa/Nairobi'))->fee;


        //if already closed, abort
        if ($sale->status === 'PAID'){
            abort(422, 'Sorry, this transaction was already closed!');
        }

           //if LTC, record time, check subscription calculate cost & close transaction
        // if short term, calculate cost & close transaction
        if ($sale->customer->type === 'LTC'){

            //check active plan
            if($sale->customer->hasActiveSubscription()){
//                dd('Customer has active', $sale->customer->hasActiveSubscription());
                /*if active plan
                    - check expiry
                    - if expiry is in future, return paid = true, cost = 0, plan status, and days remaining
                - close sale
                */
                $remaining = $sale->customer->subscriptionDays($sale->customer->hasActiveSubscription());
                if($remaining < 0){
                    //expired
                     $final_sale = $this->directPay($request, $sale,$totals);
                    return response()->json($final_sale,200);
                }else{
                    $final_sale = $this->directPay($request, $sale,0);
                    return response()->json($final_sale->toArray()+[
                        'paid'=>true,
                        'cost'=>0,
                        'plan_status'=> 'Active',
                        'days_remaining' => $remaining
                    ],200);
                }
            }else{
                //close sale
                $final_sale = $this->directPay($request, $sale,$totals);
                return response()->json($final_sale,200);
            }
        }else{
            //dd('Customer has no active', $sale->customer->hasActiveSubscription());
            //close sale
            $final_sale = $this->directPay($request, $sale,$totals);
            return response()->json($final_sale,200);
        }




    }
    public function directPay(Request $request, Sale $sale, $totals)
    {
        $sale->gateway_id = $request->gateway_id ?? null;
        $sale->leave_time = Carbon::now('Africa/Nairobi');
        $sale->totals = $totals;
        $sale->status = 'PAID';
        $sale->payed_at = Carbon::now('Africa/Nairobi');

        $sale->save();

        return $sale;

    }



    public function createHandover(Request $request)
    {
        //validate
        $request->validate([
            'handover_to' => 'required|numeric|exists:users,id',//user id
           'amount_transferred' => 'required|numeric',
           'cash_at_hand' => 'required|numeric',
        ]);
        //shift id
        $shift = $request->user()->currentShift();
        if(!$shift){
            abort(404, 'Sorry, we couldn\'t find a shift attached to this request!');
        }

        //create new unapproved salehandover
        $handover = SalesHandover::create([
            'shift_id' => $shift->id,
            'to'=>$request->handover_to,
            'from'=>$request->user()->id,
            'amount_transferred'=>$request->amount_transferred,
            'cash_at_hand'=>$request->cash_at_hand,
        ]);
        return response()->json(['status'=>true, 'message'=>'Handover created successfully','details'=>$handover]);
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
