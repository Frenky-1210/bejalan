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

    public function pesan()
    {
        return $this->hasMany(Pesan::class, 'wisata_id');
    }

    public function getTempatWisataAttribute()
    {
        return $this->attributes['tempat_wisata']; // Replace with the actual attribute name in your database
    }
}
