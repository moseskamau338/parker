<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class CustomerRequest extends Request
{
    public function commonRules() : array
    {
        return [
            'name' => ['string|max:255'],
            'phone' => ['numeric|unique:customers'],
        ];
    }


    public function storeRules() : array
    {
        return [
             'name' => ['required'],
            'phone' => ['required'],
        ];
    }
}
