<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Tour;

class BlogController extends Controller
{
    public function index()
    {
        $wisata = Wisata::paginate(6); // Adjust the number to specify how many records to display per page.
        return view('blog', compact('wisata'));
    }

    public function post($id)
    {
        $wisata = Wisata::where('id', $id)->first();
        return view('post', compact('wisata'));
    }
}
