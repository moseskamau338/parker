<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
         return view('users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('add-users');

//        dd($request->all());

         $user = User::create([
             "name" => $request->name,
              "username" => $request->username,
              "email" => $request->email,
              "zone_id" => $request->zone,
              "phone" => $request->phone,
              "nat_id" => $request->nat_id,
              "password" => $request->password,
              ]);

         //assign roles
         $user->assignRole($request->roles);

         session('notification', [
            'color' => 'green',
            'message' => 'User successfully added!'
         ]);
         return redirect('/users');

    }

    public function roles()
    {
        return view('users.roles');
    }
}
