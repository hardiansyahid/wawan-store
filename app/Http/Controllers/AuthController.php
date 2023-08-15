<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function doLogin(Request $request){
        return redirect('/dashboard');
    }

    public function logout(){
        return redirect('/auth/login');
    }
}
