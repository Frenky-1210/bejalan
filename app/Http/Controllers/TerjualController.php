<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\Terjual;
use Illuminate\Http\Request;

class TerjualController extends Controller
{
    public function index(){
        $terjual = Terjual::all();
        $pesanan = Pesanan::all();
        $user = Auth::user(); 
        return view('checkout.checkout', compact('pesanan', 'user', 'terjual'));
    }

    public function checkout(Request $request){
        $pesanan = Pesanan::find($request->input('pesanan_id'));

        $request->request->add([
            'user_id' => auth()->user()->id,
            'pesanan_id' => $pesanan->id,
            'total_harga' => $request->jumlah_tiket * 100000,
            'status' => 'Unpaid'
        ]);
        
        $check = Terjual::create($request->all());
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $check->id,
                'gross_amount' => $check->total_harga,
            ),
            'customer_details' => array(
                'name' => auth()->user()->id,
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout.checkout', compact('snapToken', 'check', 'pesanan'));
    }    
}
