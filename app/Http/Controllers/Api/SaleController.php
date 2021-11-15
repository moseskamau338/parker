<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\User;
use App\Models\SalesHandover;
use App\Models\Vehicle;
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
        $data = auth()->guard('sanctum')->user()->sales;
        foreach($data as $sale){
            $sale['customer'] = $sale->customer;
            $sale['rate'] = $sale->rate;
            $sale['gateway'] = $sale->gateway;
            $sale['zone'] = $sale->zone;
            $sale['user'] = $sale->user;
        }
        return new SaleResource($data);
    }
    public function show(Sale $sale)
    {
        $sale = $sale->with('customer','rate', 'gateway', 'zone', 'user')
            ->where('id', $sale->id)->first();
        return new SaleResource($sale);
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
        $totals = $this->getParkingFee($sale->created_at,Carbon::now('Africa/Nairobi'));

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
    public function getParkingFee($entryTime,$exitTime)
    {
        $fee=0;
        $exT=date("Y-m-d H:i:s", strtotime($exitTime));
        $enT=date("Y-m-d H:i:s", strtotime($entryTime));

        $totalSecondsDiff = (strtotime($exT)-strtotime($enT));
        $totalMinutesDiff = $totalSecondsDiff/60;

        $duration=$totalMinutesDiff;
        if($duration>=0){
            if(($duration>=0)&&($duration<16)){$fee=0;}
            elseif(($duration>=16)&&($duration<=60)){$fee=50;}
            elseif(($duration>=61)&&($duration<=120)){$fee=150;}
            elseif(($duration>=121)&&($duration<=180)){$fee=250;}
            elseif(($duration>=181)&&($duration<=240)){$fee=350;}
            elseif($duration>240){
                $init=350;
                $diff=(int)(($duration-240)/60);//7.9round up get full and modulus
                if(($diff%60)>0){
                    $fee=($init+(100*$diff))+100;
                }else{$fee=($init+(100*$diff));}
            }
        }else{$fee=-99;}
        //return floor($duration)." Min  at  Ksh".$fee;
        return $fee;
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
