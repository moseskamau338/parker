<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, Customer $customer)
    {
        //get plan ID
        $request->validate([
            'plan' => 'required|numeric|exists:plans,id'
        ]);

        try {
            $customer->subscribe($request->plan);
            return (object)['status' => true];
        }catch (\Throwable $e){
            return (object)['status' => false, 'message'=>$e->getMessage()];
        }
    }
    public function unSubscribe(Request $request, Customer $customer)
    {
        //only one subscription
        $customer->type = 'STC';
        $customer->save();

        try {
            $customer->subscription->delete();
            return (object)['status' => true];
        }catch (\Throwable $e){
            return (object)['status' => false, 'message'=>$e->getMessage()];
        }

    }
}
