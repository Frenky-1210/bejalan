<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use Intervention\Image\Facades\Image;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tour = Tour::all();
        return view("tour.datatour", compact("tour"));
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
            'nama_tourguide' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'pengalaman' => 'required',
            'no_telp' => 'required',
            'foto' => 'required'
        ]);

        $tour = new Tour;

        $tour->nama_tourguide = $request->input('nama_tourguide');
        $tour->umur = $request->input('umur');
        $tour->jenis_kelamin = $request->input('jenis_kelamin');
        $tour->pengalaman = $request->input('pengalaman');
        $tour->no_telp = $request->input('no_telp');
        
        // Untuk mengunggah gambar, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('public/foto_tourguide');
            $tour->foto = $imagePath;
        }

        $tour->save();

        return redirect('/tour')->with('success', 'Data Berhasil Disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $tour = Tour::where('id', $id)->first();
        // return view('tour-edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $validateData = $request->validate([
            'nama_tourguide' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'pengalaman' => 'required',
            'no_telp' => 'required',
        ]);
        
        // Proses gambar jika ada
        if($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('public/foto_tourguide');
        }
        
        Tour::where('id', $tour->id)->update($validateData);
        
        return redirect('/tour')->with('success', 'Data telah diupdate');        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        Tour::destroy($tour->id);
        return redirect('/tour')->with('success', 'Data Telah Dihapus');
    }

    public function tourguide(){
        return view('tourguide');
    }
}
