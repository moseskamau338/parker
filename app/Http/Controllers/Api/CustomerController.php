<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;
use Orion\Specs\Builders\Builder;

class CustomerController extends Controller
{
    /**
     * Fully-qualified model class name
     */
    protected $model = Customer::class;
    // protected $request = CustomerRequest::class;
//    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
//    {
//        $query = parent::buildIndexFetchQuery($request, $requestedRelations);
//
//        $query->where('zone_id');
//
//        return $query;
//    }
}
