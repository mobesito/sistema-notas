<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('get')){
            return view('auth.login');
        }
        elseif($request->isMethod('post')){
            if(Auth::attempt($request->only('email','password'))){
                return redirect()->intended('index');
            }
            return back()->with('error','credenciales incorrectas');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
