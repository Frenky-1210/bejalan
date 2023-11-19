<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TerjualController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all();
        $user = Auth::user(); 
        return view('checkout', compact('pesanan', 'user'));
    }
}
