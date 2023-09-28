<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function dashboard(){
        $transaksi = Transaksi::all();
        return view('home.dashboard', compact(
            'transaksi'
        ));
    }
}
