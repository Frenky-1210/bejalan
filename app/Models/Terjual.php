<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Terjual extends Model
{
    use HasFactory;
    protected $table = 'terjuals';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'pesanan_id', 'jumlah_tiket', 'total_harga', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
