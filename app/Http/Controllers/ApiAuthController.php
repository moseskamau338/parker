<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
   public function login(Request $request){
       //authenticate with Sanctum:
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'sitename' => 'required',
        ]);

        //authenticate with both email/username
        $user = User::where('email', $request->username)
            ->orWhere('username', $request->username)->first();

         if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (
            $user &&
            Hash::check($request->password, $user->password)
        ) {
            $user['token'] = $user->createToken($request->sitename)->plainTextToken;
            return $user;
        }

   }
}
