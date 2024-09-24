<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function signup(RegisterRequest $request){
       User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' =>Hash:: make($request->password)
       ]);
       return redirect()->route('auth.login')->with('success','Registered Successfully');
    }

    public function login(LoginRequest $request){
        if(Auth::intended($request)){
            $request->session()->regenerate();
        }
    }
}
