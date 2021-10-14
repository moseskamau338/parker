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
    }
}
