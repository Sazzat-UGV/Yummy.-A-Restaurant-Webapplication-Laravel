<?php

namespace App\Http\Controllers\backend\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function loginPage(){
        return view('backend.pages.auth.login');
    }

    public function login(Request $request){

        $validated=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($credentials,$request->filled('remember'))){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email'=>'Wrong Credentials found!'
        ])->onlyInput('email');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.loginPage');
    }
}
