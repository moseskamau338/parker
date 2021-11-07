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
        ]);

        //authenticate with both email/username
        $user = User::where('email', $request->username)
            ->orWhere('username', $request->username)
            ->with('roles','permissions')
            ->first();

         if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (
            $user &&
            Hash::check($request->password, $user->password)
        ) {
            //if cashier... start shift
            $shift = $user->startShift();
            $user->shift = $shift;
            //login and send back user
            $user['token'] = $user->createToken($user->zone->name)->plainTextToken;
            return $user;
        }

   }
   public function logout(Request $request)
   {
       //is cashier?
       if($request->user()->hasRole('cashier')){
           // is shift closed?
           if($request->user()->currentShift()){
                // redirect back with must close shift
               abort(403, 'Sorry, you cannot logout before you close your shift!');
           }
       }
      $request->user()->tokens()->delete();
      return response()->json(['message' => 'Logout successful.']);
   }
}
