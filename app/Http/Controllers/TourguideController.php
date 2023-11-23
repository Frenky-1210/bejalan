<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Wisata;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TourguideController extends Controller
{
    public function index(){
        $tour = Tour::all();
        $pesanan = Pesanan::paginate(9);
        $wisatas = Wisata::all();
        return view('tourguide', compact('tour', 'pesanan', 'wisatas'));
    }
}
