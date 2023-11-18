<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Tour;
use app\Models\Wisata;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $primaryKey = 'id';
    protected $fillable = ['wisata_id', 'tour_id', 'jadwal', 'waktu_start', 'waktu_end', 'fasilitas', 'biaya', 'kuota', 'pesanan'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }

    // Define the relationship with Tour model
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

}
