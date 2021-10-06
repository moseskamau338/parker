<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use Orion\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Fully-qualified model class name
     */
    protected $model = User::class;
    protected $request = UserRequest::class;
}
