<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request){

        try {
            //code...
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());
        }

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return response()->json(['message' => 'Login success','user' => Auth::user()]);
        } else {
            return response()->json(['message' => 'Login failed'],401);
        }

    }

    public function logout( Request $request ){
        Auth::logout($request->user());
    }

}
