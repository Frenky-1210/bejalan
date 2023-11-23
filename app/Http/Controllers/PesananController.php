<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Wisata;
use App\Models\Tour;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisatas = Wisata::all();
        $tours = Tour::all();
        $pesanan = Pesanan::all();
        return view('pesanan.tiket', compact('wisatas', 'tours', 'pesanan'));
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
        $this->validate($request, [
            'wisata_id' => 'required',
            'tour_id' => 'required',
            'jadwal' => 'required',
            'waktu_start' => 'required',
            'waktu_end' => 'required',
            'fasilitas' => 'required',
            'biaya' => 'required',
            'kuota' => 'required'   
        ]);
        
        $pesanan = new Pesanan([
            'wisata_id' => $request->input('wisata_id'),
            'tour_id' => $request->input('tour_id'),
            'jadwal' => $request->input('jadwal'),
            'waktu_start' => $request->input('waktu_start'),
            'waktu_end' => $request->input('waktu_end'),
            'fasilitas' => $request->input('fasilitas'),
            'biaya' => $request->input('biaya'),
            'kuota' => $request->input('kuota'),
            'pesanan' => $request->input('pesanan')
        ]);
        
        // Save the relationship data
        $wisata = Wisata::find($request->input('wisata_id'));
        $tour = Tour::find($request->input('tour_id'));
        
        $pesanan->wisata()->associate($wisata);
        $pesanan->tour()->associate($tour);
        
        $pesanan->save();
        
        return redirect('/pesanan')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $validateData = $request->validate([
            'wisata_id' => 'required',
            'tour_id' => 'required',
            'jadwal' => 'required',
            'waktu_start' => 'required',
            'waktu_end' => 'required',
            'fasilitas' => 'required',
            'biaya' => 'required',
            'kuota' => 'required'
        ]);
        
        Pesanan::where('id', $pesanan->id)->update($validateData);
        
        return redirect('/pesanan')->with('success', 'Data telah diupdate');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        Pesanan::destroy($pesanan->id);
        return redirect('/pesanan')->with('success', 'Data Telah Dihapus');
    }
}
