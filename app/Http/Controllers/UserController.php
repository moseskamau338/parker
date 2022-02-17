<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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

        try{
             $user = User::create([
                 "name" => $request->name,
                  "username" => $request->username,
                  "email" => $request->email,
                  "zone_id" => $request->zone,
                  "phone" => $request->phone,
                  "nat_id" => $request->nat_id,
                  "password" => Hash::make($request->password),
                  ]);
             //assign roles
             $user->assignRole($request->roles);

//             session()->flash('notifier',['text'=>__('User successfully added!')]);

             return back();
        }catch (\Throwable $e){

//            session()->flash('notifier',['text'=>__('Error: '.$e->getMessage()), 'type'=>'error']);

             return redirect('/users');
        }
    }

    public function roles()
    {
        return view('users.roles');
    }

    public function updateRoles(Request $request)
    {
//        session()->flash('notifier',['text'=>__('Feature coming soon!'), 'type'=>'error']);

        return back();

    }

    public function logout()
    {

        return back();
    }
}
