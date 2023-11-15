<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translator;

class TranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $translator = Translator::all();
        return view('translator.datatranslator', compact('translator'));
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
            'name' => 'required',
            'age' => 'required',
            'native_language' => 'required',
            'language_skill' => 'required',
            'experience' => 'required',
            'contact' => 'required',
            'picture' => 'required'
        ]);

        $trans = new Translator;

        $trans->name = $request->input('name');
        $trans->age = $request->input('age');
        $trans->native_language = $request->input('native_language');
        $trans->language_skill = $request->input('language_skill');
        $trans->experience = $request->input('experience');
        $trans->contact = $request->input('contact');
        
        // Untuk mengunggah gambar, Anda perlu menyimpannya di direktori yang sesuai.
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('public/foto_translator');
            $trans->picture = $imagePath;
        }        

        $trans->save();

        return redirect('/translator')->with('success', 'Data Berhasil Disimpan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Translator $translator)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'native_language' => 'required',
            'language_skill' => 'required',
            'experience' => 'required',
            'contact' => 'required',
        ]);
        
        // Proses gambar jika ada
        if($request->file('picture')) {
            $validateData['picture'] = $request->file('picture')->store('public/foto_translator');
        }
        
        Translator::where('id', $translator->id)->update($validateData);
        
        return redirect('/translator')->with('success', 'Data telah diupdate');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Translator $translator)
    {
        Translator::destroy($translator->id);
        return redirect('/translator')->with('success', 'Data Telah Dihapus');
    }
}
