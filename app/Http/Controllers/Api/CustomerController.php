<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Orion\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Fully-qualified model class name
     */
    protected $model = Customer::class;
    // protected $request = CustomerRequest::class;

}
