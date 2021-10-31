<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use Orion\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Fully-qualified model class name
     */
    protected $model = User::class;
    protected $request = UserRequest::class;

    public function managers()
    {
        $users = Role::where('name','manager')->first()->users;
        return response()->json($users, 200);
    }
}
