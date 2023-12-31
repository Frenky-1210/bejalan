<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\Terjual;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TerjualController extends Controller
{
    public function index(){
        $terjual = Terjual::all();
        $pesanan = Pesanan::all();
        $user = Auth::user(); 
        return view('checkout.checkout', compact('pesanan', 'user', 'terjual'));
    }

    public function checkout(Request $request){
        // Dapatkan pesanan terkait pengguna yang sedang masuk
        $pesanan = auth()->user()->pesanan;
        // Setelah menyimpan pesanan, Anda dapat menggunakan $pesanan->id
        $request->request->add([
            'user_id' => auth()->user()->id,
            'pesanan_id' => $request->input('pesanan'),
            'total_harga' => $request->jumlah_tiket * 200000,
            'status' => 'Paid'
        ]);

        $check = Terjual::create($request->all());
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $check->id,
                'user_id' => $check->user_id,
                'pesanan_id' => $check->pesanan_id,
                'jumlah_tiket' => $check->jumlah_tiket,
                'gross_amount' => $check->total_harga
            ),
            'customer_details' => array(
                'name' => auth()->user()->id,
                'email' => auth()->user()->email,
            ),
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        return view('checkout.check', compact('snapToken', 'check', 'pesanan'));
    }
    
    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
    
        if($hashed == $request->signature_key) {
            if($request->transaction_status == 'capture') {
                $check = Terjual::where('id', $request->order_id)->first();
                $check->update(['status' => 'Paid']);
            }
        }
    }
    
    
    public function invoice($id){
        $check = Terjual::find($id);
        return view('checkout.invoice', compact('check'));
    }
}
