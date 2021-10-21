<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class UserRequest extends Request
{
    public function commonRules() : array
    {
        return [
            'name' => ['string|max:255'],
            'email' => ['email|unique:users'],
            'username' => ['string|max:255|min:3|unique:users'],
            'phone' => ['unique:users'],
            'nat_id' => ['numeric|unique:users'],
            'password' => ['password']
        ];
    }


    public function storeRules() : array
    {
        return [
             'name' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'phone' => ['required'],
            'nat_id' => ['required'],
        ];
    }
}
