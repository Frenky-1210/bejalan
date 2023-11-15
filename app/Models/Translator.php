<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
    use HasFactory;
    protected $table = 'translator';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'age', 'native_language', 'language_skill', 'experience', 'contact','picture'];
}
