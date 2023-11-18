<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    function index(){
        return view("login");
    }

    function auth( Request $request ){
        try {
            $credential = $request->validate([
                'name' => ['required'],
                'password' => ['required']
            ]);
            if (Auth::attempt($credential)) {
                return redirect()->intended("dashboard");
            }else {
                $credential = [
                    "email" => $request->name,
                    "password" => $request->password
                ];
                if ( Auth::attempt($credential) ) {
                    return redirect()->intended("dashboard");
                }
            }
            return back()->with("danger", "The provided credentials do not match our records.");
        }catch(Exception $e) {
            return "Gagal Login: ". $e->getMessage();
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
