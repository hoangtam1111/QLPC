<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function login(){
        dd(123);
        return view('auth.login');
    }
    public function checkLogin(Request $request) {
        dd($request->all());
        $credentials = [
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        if (Auth::attempt($credentials)) {

            return view('index');
        } else {
            dd($credentials);
            return view('auth.login');
        }
    }
}
