<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisata = Wisata::all();
        return view('wisata.datawisata', compact('wisata'));
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
            'tempat_wisata' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'sumber_data' => 'required',
            'gambar' => 'required'
        ]);

        $wisata = new Wisata;

        $wisata->tempat_wisata = $request->input('tempat_wisata');
        $wisata->lokasi = $request->input('lokasi');
        $wisata->deskripsi = $request->input('deskripsi');
        $wisata->sumber_data = $request->input('sumber_data');
        
        // Untuk mengunggah gambar, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('public/foto_destinasi');
            $wisata->gambar = $imagePath;
        }        

        $wisata->save();

        return redirect('/wisata')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $wisata = Wisata::find($id);

        // Pastikan wisata ditemukan
        if (!$wisata) {
            abort(404);
        }

        return response()->json($wisata);
        // $wisata = Wisata::find($id);
        // return response()->json($wisata);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisatum)
    {
        // return response()->json($wisatum);
        // $destinasi = Wisata::find($id);
        // return view('wisata', compact('destinasi', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wisata $wisatum)
    {
        $Validate = $request->validate([
            'tempat_wisata' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'sumber_data' => 'required'
        ]);

        if($request->file('gambar')) {
            $Validate['gambar'] = $request->file('gambar')->store('public/foto_destinasi');
        }
        
        Wisata::where('id', $wisatum->id)->update($Validate);

        return redirect('/wisata')->with('success', 'Data telah diupdate');
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
    public function destroy(Wisata $wisatum)
    {
        // Lakukan operasi penghapusan data sesuai dengan ID
        Wisata::destroy($wisatum->id);
        return redirect('/wisata')->with('success', 'Data Telah Dihapus');
    }
}
