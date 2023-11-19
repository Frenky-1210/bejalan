<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Tour;

class BlogController extends Controller
{
    public function index()
    {
        $wisata = Wisata::paginate(9); // Adjust the number to specify how many records to display per page.
        return view('blog', compact('wisata'));
    }

    public function post()
    {; // Adjust the number to specify how many records to display per page.
        return view('post');
    }
}
