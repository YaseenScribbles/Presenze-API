<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return response()->json(['message' => 'Login success', Auth::user()]);
        } else {
            return response()->json(['message' => 'Login failed'],401);
        }

    }

    public function logout( Request $request ){
        Auth::logout($request->user());
    }

}
