<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Terjual;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payment = Terjual::all();
        return view('payment.datapayment', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        // $wisata = Wisata::find($id);
        // return response()->json($wisata);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terjual $payment)
    {
        // return response()->json($wisatum);
        // $destinasi = Wisata::find($id);
        // return view('wisata', compact('destinasi', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terjual $payment)
    {
        
        // Proses pembaruan data, misalnya:
        // $wisata = Wisata::find($id);

        // $wisata->tempat_wisata = $request->input('tempat_wisata');
        // $wisata->lokasi = $request->input('lokasi');
        // $wisata->deskripsi = $request->input('deskripsi');
        // Proses penyimpanan gambar jika perlu

        // $wisata->save();
        // return redirect('/wisata')->with('success', 'Data berhasil diperbaharui');
        // return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terjual $payment)
    {
        // Lakukan operasi penghapusan data sesuai dengan ID
        Terjual::destroy($payment->id);
        return redirect('/payment')->with('success', 'Data Telah Dihapus');
    }
}
