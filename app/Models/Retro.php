<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retro extends Model
{
    use HasFactory;
    protected $table = 'retros';
    protected $fillable = [
        'nama',
        'jenis',
        'tahun',
        'harga',
    ];
}
