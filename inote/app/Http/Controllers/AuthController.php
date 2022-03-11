<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showFormRegister()
    {
        return view("frontend.auth.register");
    }

    public function createRegister(Request $request)
    {
        $data = $request->only("name", "email", "password");
        $data["password"]=Hash::make($data["password"]);
        DB::table("users")->insert($data);
        return redirect()->route('login');
    }

    public function showFormLogin()
    {
        if(Auth::check()){
            return redirect()->route('backend.note.index');
        }
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->only("email", "password");
        if(Auth::attempt($data)){
            return redirect()->route('backend.note.index');
        }else{
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
