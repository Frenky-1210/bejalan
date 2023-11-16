<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisatas';
    protected $primaryKey = 'id';
    protected $fillable = ['tempat_wisata', 'lokasi', 'deskripsi', 'gambar'];
}
