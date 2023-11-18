<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_tourguide', 'umur', 'jenis_kelamin', 'pengalaman', 'no_telp', 'foto'];

    public function pesan()
    {
        return $this->hasMany(Pesan::class, 'tour_id');
    }

    public function getTourGuideAttribute()
    {
        return $this->attributes['nama_tourguide']; // Replace with the actual attribute name in your database
    }
}
