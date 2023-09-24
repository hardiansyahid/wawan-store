<?php

namespace App\Http\Controllers;

use App\Helper\Constant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function doLogin(Request $request){

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::with('ref_role')->where('username', $request->username)->first();
            session(['user' => $user]);

            if ($user->ref_role->nama == Constant::ROLE_KASIR) return redirect()->intended('/penjualan');
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'username atau password salah');
        }
    }

    public function logout(){
        Auth::logout();
        session()->forget('user');
        session()->flush();
        return redirect('/auth/login');
    }
}
